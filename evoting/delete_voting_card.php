<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $course = isset($_POST['course']) ? trim($_POST['course']) : '';
    $voteType = isset($_POST['voteType']) ? trim($_POST['voteType']) : '';

    if (empty($course) || empty($voteType)) {
        echo json_encode(["status" => "error", "message" => "Invalid course or vote type."]);
        exit;
    }
    // Delete the card from the database
    $stmt = $conn->prepare("DELETE FROM voting_status WHERE course = ? AND vote_type = ?");
    $stmt->bind_param("ss", $course, $voteType);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Card deleted successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to delete the card."]);
    }

    $stmt->close();
    $conn->close();
}
?>