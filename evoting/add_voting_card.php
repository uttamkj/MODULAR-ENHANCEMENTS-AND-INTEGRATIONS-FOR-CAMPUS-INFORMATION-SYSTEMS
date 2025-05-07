<?php
require_once "dbconnect.php";

header("Content-Type: application/json");

$course = isset($_POST['course']) ? trim($_POST['course']) : null;
$voteType = isset($_POST['voteType']) ? trim($_POST['voteType']) : null;
$status = 'on';

$response = [];

// Validate input
if (empty($course) || empty($voteType)) {
    $response['status'] = 'error';
    $response['message'] = 'Course and Vote Type are required.';
    echo json_encode($response);
    exit;
}

// Check for duplicate entry
if ($course === "All") {
    // For "All" course, the vote_type must be unique across all entries
    $checkSQL = "SELECT 1 FROM voting_status WHERE vote_type = ?";
    $checkStmt = $conn->prepare($checkSQL);
    $checkStmt->bind_param("s", $voteType);
} else {
    // For specific courses:
    $checkSQL = "SELECT 1 FROM voting_status WHERE 
    (course = ? AND vote_type = ?) OR 
    (course = 'All' AND vote_type = ?)";
    $checkStmt = $conn->prepare($checkSQL);
    $checkStmt->bind_param("sss", $course, $voteType, $voteType);
}

$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    $response['status'] = 'error';
    $response['message'] = 'This voting card already exists.';
    echo json_encode($response);
    $checkStmt->close();
    exit;
}
$checkStmt->close();

// Insert new voting card
$sql = "INSERT INTO voting_status (course, vote_type, status) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $course, $voteType, $status);

if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Voting card added successfully.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Database error: ' . $stmt->error;
}

echo json_encode($response);
$conn->close();

?>