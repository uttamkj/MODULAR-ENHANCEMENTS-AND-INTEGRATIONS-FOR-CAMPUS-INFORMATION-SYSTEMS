<?php

// Edited by Neha
$name = $_POST['name'];
$sic = $_POST['sic']; 
$course = $_POST['course'];
$password = $_POST['password'];

// Database Connection
$conn = new mysqli("127.0.0.1", "root", "", "erp", 8888);
if ($conn->connect_error) {
    die(json_encode(["message" => $conn->connect_error, "status" => "error"]));
}

// Check if SIC exists in student_data
$cgpaQuery = "SELECT cgpa, course, name FROM student_data WHERE sic=?";
$stmt = $conn->prepare($cgpaQuery);
$stmt->bind_param("s", $sic);
$stmt->execute();
$stmt->bind_result($cgpa, $user_course, $dbName);
$stmt->fetch();
$stmt->close();

if ($cgpa === null) {
    echo json_encode(["message" => "Error: Student not found in records!", "status" => "error"]);
    exit;
} elseif (strcasecmp($user_course, $course) !== 0) {
    echo json_encode(["message" => "Error: Student is not from the required course!", "status" => "error"]);
    exit;
} elseif (strcasecmp($name, $dbName) !== 0) {
    echo json_encode(["message" => "Error: Name does not match the records!", "status" => "error"]);
    exit;
}

// Check if SIC already exists in login_data
$qry = "SELECT * FROM login_data WHERE sic=?";
$stmt = $conn->prepare($qry);
$stmt->bind_param("s", $sic);
$stmt->execute();
$result = $stmt->get_result();
$data = [];

if ($result->num_rows > 0) {
    $data["message"] = "SIC already exists";
    $data["status"] = "error";
} else {
    // Insert voter into the database
    $qry2 = "INSERT INTO login_data (name, sic, course, password) VALUES (?, ?, ?, ?)";
    $stmt2 = $conn->prepare($qry2);
    $stmt2->bind_param("ssss", $name, $sic, $course, $password);

    if ($stmt2->execute()) {
        $data["message"] = "Registration Successful";
        $data["status"] = "success";
        $data["redirect"] = "login.php"; // Add redirect URL to the response
    } else {
        $data["message"] = "Database error: " . $stmt2->error;
        $data["status"] = "error";
    }
}

// Return JSON response
echo json_encode($data);
$conn->close();
?>