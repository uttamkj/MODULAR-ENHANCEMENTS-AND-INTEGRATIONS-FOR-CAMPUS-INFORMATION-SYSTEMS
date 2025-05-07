<?php
session_start();
require_once "food_functions.php"; // Contains addMealFeedback(), hasSubmittedFeedback()

// 1) Authentication check
if (!isset($_SESSION['sic_no'])) {
    header('Location: food_login.php');
    exit;
}

// 2) Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: meal_schedule.php');
    exit;
}

// 3) Retrieve user_id using sic_no
$sic_no = $_SESSION['sic_no'];
$query = "SELECT user_id FROM food_users WHERE sic_no = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $sic_no);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found. Please log in again.");
}

$user_id = $user['user_id'];

// 4) Gather and sanitize input
$meal_id     = isset($_POST['meal_id']) ? (int)$_POST['meal_id'] : null;
$meal_type   = $_POST['meal_type'] ?? '';
$day_of_week = $_POST['day_of_week'] ?? '';
$rating      = isset($_POST['rating']) ? (int)$_POST['rating'] : null;
$comments    = trim($_POST['comments'] ?? '');

// 5) Validate required fields
if (!$meal_id || !$rating) {
    die("Missing required feedback information.");
}

// 6) Check if feedback already submitted
if (hasSubmittedFeedback($meal_id, $user_id)) {
    header(sprintf(
        "Location: meal_details.php?meal_type=%s&day_of_week=%s&feedback=0",
        urlencode($meal_type),
        urlencode($day_of_week)
    ));
    exit;
}

// 7) Call helper function to add feedback
$success = addMealFeedback($meal_id, $user_id, $rating, $comments);
if (!$success) {
    die("Failed to save feedback. Please try again.");
}

// 8) Redirect back to meal details with a success flag
header(sprintf(
    "Location: meal_details.php?meal_type=%s&day_of_week=%s&feedback=1",
    urlencode($meal_type),
    urlencode($day_of_week)
));
exit;