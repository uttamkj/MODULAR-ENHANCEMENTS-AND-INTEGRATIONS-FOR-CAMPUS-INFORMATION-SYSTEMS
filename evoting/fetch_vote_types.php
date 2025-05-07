<?php
session_start();
require_once "dbconnect.php";

header("Content-Type: application/json"); // Ensure correct JSON response
error_reporting(0); // Hide PHP warnings that could break JSON
ob_clean(); // Clear any unexpected output before sending JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = isset($_POST['course']) ? trim($_POST['course']) : null;

    if (!$course) {
        echo json_encode(["status" => "error", "message" => "Course is required"]);
        exit;
    }
    error_log("Received course: " . $course);

    // Fetch vote types with registration_status "on" for the given course or "All"
    $sql = "SELECT vote_type FROM voting_status WHERE registration_status = 'on' AND (course = ? OR course = 'All')";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "Database query preparation failed"]);
        exit;
    }

    $stmt->bind_param("s", $course);
    $stmt->execute();
    $result = $stmt->get_result();

    $voteTypes = [];
    while ($row = $result->fetch_assoc()) {
        $voteTypes[] = $row['vote_type'];
    }

    if (!empty($voteTypes)) {
        echo json_encode(["status" => "success", "voteTypes" => $voteTypes]);
    } else {
        echo json_encode(["status" => "error", "message" => "No vote types found"]);
    }
    exit;
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}
?>
