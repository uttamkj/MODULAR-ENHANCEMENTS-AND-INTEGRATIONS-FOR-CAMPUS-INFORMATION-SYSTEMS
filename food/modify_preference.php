<?php
session_start();
require_once "food_functions.php"; // Contains saveMealPreference()

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
$meal_type = $_POST['meal_type'] ?? '';
$scheduled_date = $_POST['scheduled_date'] ?? '';
$preference = $_POST['preference'] ?? 'Veg';
$day_of_week = $_POST['day_of_week'] ?? '';

// 5) Validate required fields
if (empty($meal_type) || empty($scheduled_date)) {
    header(sprintf(
        "Location: meal_details.php?meal_type=%s&day_of_week=%s&preference=0&message=%s",
        urlencode($meal_type),
        urlencode($day_of_week),
        urlencode("Meal type and scheduled date are required.")
    ));
    exit;
}

date_default_timezone_set('Asia/Kolkata');

// Define meal times
$meal_times = [
    'Breakfast' => '08:00:00',
    'Lunch' => '13:00:00',
    'Dinner' => '19:00:00'
];

// Determine meal time based on meal type
$meal_time = $meal_times[$meal_type] ?? '13:00:00';

// Combine scheduled_date with meal_time
$scheduled_datetime = new DateTime("$scheduled_date $meal_time");
$current_datetime = new DateTime();

// Calculate the difference in hours
$interval = $current_datetime->diff($scheduled_datetime);
$hours_difference = ($interval->days * 24) + $interval->h + ($interval->i / 60);

// 6) Check time constraints
if ($scheduled_datetime < $current_datetime) {
    header(sprintf(
        "Location: meal_details.php?meal_type=%s&day_of_week=%s&preference=0&message=%s",
        urlencode($meal_type),
        urlencode($day_of_week),
        urlencode("⚠️ Cannot save preference for past meals.")
    ));
    exit;
} elseif ($hours_difference < 24) {
    header(sprintf(
        "Location: meal_details.php?meal_type=%s&day_of_week=%s&preference=0&message=%s",
        urlencode($meal_type),
        urlencode($day_of_week),
        urlencode("⚠️ Preference must be saved at least 24 hours in advance.")
    ));
    exit;
}

// 7) Save the meal preference
$success = saveMealPreference($user_id, $meal_type, $scheduled_date, $preference);
if (!$success) {
    header(sprintf(
        "Location: meal_details.php?meal_type=%s&day_of_week=%s&preference=0&message=%s",
        urlencode($meal_type),
        urlencode($day_of_week),
        urlencode("Error saving preference. Please try again.")
    ));
    exit;
}

// 8) Redirect back to meal details with a success flag
header(sprintf(
    "Location: meal_details.php?meal_type=%s&day_of_week=%s&preference=1&message=%s",
    urlencode($meal_type),
    urlencode($day_of_week),
    urlencode("Preference saved successfully.")
));
exit;
?>
