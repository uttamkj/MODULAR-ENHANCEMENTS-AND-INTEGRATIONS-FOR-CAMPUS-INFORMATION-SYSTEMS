<?php

require_once "dbconnect.php";
session_start();

// Ensure voter is logged in
if (!isset($_SESSION['sic'])) {
    echo json_encode(["status" => "error", "message" => "Session expired. Please log in again."]);
    exit;
}

$voter_sic = $_SESSION['sic'];

if (!isset($_POST['sic'], $_POST['course'], $_POST['voteType'])) {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
    exit;
}

$candidate_sic = trim($_POST['sic']);
$course = trim($_POST['course']);
$voteType = trim($_POST['voteType']);

// Check if the voter has already voted for this vote type
$checkVote = "SELECT 1 FROM votes2 WHERE voter_sic = ? AND vote_type = ?";
$stmt = $conn->prepare($checkVote);
$stmt->bind_param("ss", $voter_sic, $voteType);
$stmt->execute();
$voteResult = $stmt->get_result();

if ($voteResult->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "You have already voted!"]);
    exit;
}

// Insert vote into the `votes2` table
$insertVote = "INSERT INTO votes2 (voter_sic, candidate_sic, vote_type, course) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insertVote);
$stmt->bind_param("ssss", $voter_sic, $candidate_sic, $voteType, $course);

if ($stmt->execute()) {
    // Update the candidate's vote count
    $updateVoteCount = "UPDATE candidates2 SET vote_count = vote_count + 1 WHERE sic = ?";
    $stmt = $conn->prepare($updateVoteCount);
    $stmt->bind_param("s", $candidate_sic);
    $stmt->execute();

    echo json_encode(["status" => "success", "message" => "Vote submitted successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error submitting vote."]);
}

$stmt->close();
$conn->close();
?>