<?php
// Edited by Neha
require_once "dbconnect.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

$response = ["status" => "error", "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values and trim them
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $sic = isset($_POST['sic']) ? trim($_POST['sic']) : "";
    $course = isset($_POST['course']) ? trim($_POST['course']) : "";
    $voteType = isset($_POST['voteType']) ? trim($_POST['voteType']) : "";

    // Validate fields (Server-side)
    if (empty($name) || empty($sic) || empty($course) || empty($voteType)) {
        $response["message"] = "All fields are required!";
        echo json_encode($response);
        exit;
    }

    // Validate SIC format (2 digits, 4 letters, 2 digits)
    if (!preg_match('/^\d{2}[A-Za-z]{4}\d{2}$/', $sic)) {
        $response["message"] = "Invalid SIC format. Expected: 12ABCD34.";
        echo json_encode($response);
        exit;
    }

    // Check CGPA eligibility, course, and name
    $cgpaQuery = $conn->prepare("SELECT cgpa, course, name FROM student_data WHERE sic = ?");
    $cgpaQuery->bind_param("s", $sic);
    $cgpaQuery->execute();
    $cgpaQuery->bind_result($cgpa, $user_course, $dbName);
    $cgpaQuery->fetch();
    $cgpaQuery->close();

    if ($cgpa === null) {
        $response["message"] = "Error: Student not found in records!";
        echo json_encode($response);
        exit;
    } elseif ($cgpa < 8.00) {
        $response["message"] = "Error: Student must have a CGPA of 8.00 or higher.";
        echo json_encode($response);
        exit;
    }

    // Check if the vote type is for "All" courses
    $voteTypeQuery = $conn->prepare("SELECT course FROM voting_status WHERE vote_type = ?");
    $voteTypeQuery->bind_param("s", $voteType);
    $voteTypeQuery->execute();
    $voteTypeQuery->bind_result($voteTypeCourse);
    $voteTypeQuery->fetch();
    $voteTypeQuery->close();

    if ($voteTypeCourse === null) {
        $response["message"] = "Error: Invalid vote type!";
        echo json_encode($response);
        exit;
    }

    // If the vote type is for "All" courses, override the course to "All"
    if ($voteTypeCourse === "All") {
        $course = "All";
    } elseif (strcasecmp($user_course, $course) !== 0) {
        $response["message"] = "Error: Student is not from the required course!";
        echo json_encode($response);
        exit;
    }

    if (strcasecmp($name, $dbName) !== 0) {
        $response["message"] = "Error: Name does not match the records!";
        echo json_encode($response);
        exit;
    }

    // Check if the student is already a candidate for the selected vote type
    $checkQuery = $conn->prepare("SELECT 1 FROM candidates2 WHERE sic = ? AND vote_type = ?");
    $checkQuery->bind_param("ss", $sic, $voteType);
    $checkQuery->execute();
    $result = $checkQuery->get_result();
    $checkQuery->close();

    if ($result->num_rows > 0) {
        $response["message"] = "Error: Student is already a candidate!";
        echo json_encode($response);
        exit;
    }

    // Insert new candidate
    $stmt = $conn->prepare("INSERT INTO candidates2 (name, sic, course, vote_type) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        $response["message"] = "SQL Error: " . $conn->error;
        echo json_encode($response);
        exit;
    }

    $stmt->bind_param("ssss", $name, $sic, $course, $voteType);

    if ($stmt->execute()) {
        $response["status"] = "success";
        $response["message"] = "Successfully registered!";
    } else {
        $response["message"] = "Database Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Return JSON response
echo json_encode($response);
?>