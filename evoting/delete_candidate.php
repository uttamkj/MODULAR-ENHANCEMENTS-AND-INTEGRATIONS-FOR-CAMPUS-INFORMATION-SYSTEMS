<?php
require_once "dbconnect.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_sic'], $_POST['voteType'])) {
    $deleteSic = $_POST['delete_sic'];
    $voteType = $_POST['voteType'];

    if (empty($deleteSic) || empty($voteType)) {
        echo json_encode(["status" => "error", "message" => "Missing required parameters."]);
        exit;
    }
    $deleteQuery = "DELETE FROM candidates2 WHERE sic = ? AND vote_type = ?";
    $stmt = $conn->prepare($deleteQuery);

    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "Database prepare error: " . $conn->error]);
        exit;
    }
    $stmt->bind_param("ss", $deleteSic, $voteType);
    
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Candidate removed successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to remove candidate: " . $stmt->error]);
    }
    $stmt->close();

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
$conn->close();
exit;
?>
