<?php
session_start();
require_once "dbconnect.php";

header("Content-Type: application/json"); // Ensure correct JSON response
error_reporting(0); // Hide PHP warnings that could break JSON
ob_clean(); // Clear any unexpected output before sending JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = isset($_POST['course']) ? trim($_POST['course']) : null;
    $voteType = isset($_POST['voteType']) ? trim($_POST['voteType']) : null;

    if (!$voteType) {
        echo json_encode(["status" => "error", "message" => "Missing vote type"]);
        exit;
    }

    // Handle "All" courses for common vote types
    if ($course === "All") {
        $sql = "SELECT registration_status FROM voting_status WHERE vote_type = ? AND course = 'All'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $voteType);
    } else {
        // Handle branch-specific and common vote types
        $sql = "SELECT registration_status FROM voting_status WHERE vote_type = ? AND (course = ? OR course = 'All')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $voteType, $course);
    }

    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "Database query failed"]);
        exit;
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $newStatus = ($row['registration_status'] === 'on') ? 'off' : 'on';

        // Update the registration status
        if ($course === "All") {
            $updateSQL = "UPDATE voting_status SET registration_status = ? WHERE vote_type = ? AND course = 'All'";
            $updateStmt = $conn->prepare($updateSQL);
            $updateStmt->bind_param("ss", $newStatus, $voteType);
        } else {
            $updateSQL = "UPDATE voting_status SET registration_status = ? WHERE vote_type = ? AND (course = ? OR course = 'All')";
            $updateStmt = $conn->prepare($updateSQL);
            $updateStmt->bind_param("sss", $newStatus, $voteType, $course);
        }

        if (!$updateStmt) {
            echo json_encode(["status" => "error", "message" => "Failed to prepare update query"]);
            exit;
        }

        if ($updateStmt->execute()) {
            echo json_encode(["status" => "success", "newStatus" => $newStatus]);
            exit;
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update registration status"]);
            exit;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No matching records found"]);
        exit;
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}
?>