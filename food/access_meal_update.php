<?php
require_once "../includes/navbar.php";
error_log("Submitted Meal Type: " . $_POST['meal_type']);
error_log("Submitted Scheduled Date: " . $_POST['scheduled_date']);
error_log("Submitted Day of Week: " . $_POST['day_of_week']);
require_once "food_functions.php"; // Ensure this includes necessary functions

// Check if user is logged in
if (!isset($_SESSION['sic'])) {
    header('Location: food_login.php');
    exit;
}

// Ensure the request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: meal_schedule.php');
    exit;
}

// Retrieve user_id using sic_no (from session)
$sic_no = $_SESSION['sic'];
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

// Gather form data
$meal_type = $_POST['meal_type'] ?? '';
$scheduled_date = $_POST['scheduled_date'] ?? '';
if (empty($scheduled_date) || !strtotime($scheduled_date)) {
    die("Error: Invalid or missing scheduled date.");
}
error_log("Submitted Scheduled Date: " . $_POST['scheduled_date']);
// Check if required data exists
if (empty($meal_type) || empty($scheduled_date)) {
    die("Required data missing!");
}

// Get the current date and time
date_default_timezone_set('Asia/Kolkata');
$current_datetime = new DateTime();

// Define meal access times for comparison
$meal_access_times = [
    'Breakfast' => ['start' => '08:00', 'end' => '10:00'],
    'Lunch' => ['start' => '12:35', 'end' => '14:00'],
    'Dinner' => ['start' => '20:30', 'end' => '23:00']
];

// Validate meal type
if (!isset($meal_access_times[$meal_type])) {
    die("Error: Invalid meal type '$meal_type'.");
}

// Now safe to fetch
$start_time = $meal_access_times[$meal_type]['start'];
$end_time = $meal_access_times[$meal_type]['end'];

// Validate scheduled_date
if (empty($scheduled_date) || !strtotime($scheduled_date)) {
    die("Error: Invalid or missing scheduled date.");
}

// Combine scheduled date with meal access times
$meal_start_datetime = new DateTime("$scheduled_date $start_time");
$meal_end_datetime = new DateTime("$scheduled_date $end_time");
// Calculate day of the week from scheduled date (1 = Monday, 7 = Sunday)
$day_of_week = (new DateTime($scheduled_date))->format('l'); // 'l' returns full textual representation (e.g., Monday)

// Check if the current time is within the access window
$access_allowed = ($current_datetime >= $meal_start_datetime && $current_datetime <= $meal_end_datetime);

$status = $access_allowed ? 'Accessed' : 'Not Accessed';
$access_time = $access_allowed ? $current_datetime->format('Y-m-d H:i:s') : NULL;

// Fetch the user's meal preference (Veg, Non-Veg, or Both) for the specified meal type and date
$preference_query = "SELECT preference FROM meal_preferences WHERE user_id = ? AND meal_type = ? AND scheduled_date = ?";
$stmt = $conn->prepare($preference_query);
$stmt->bind_param("iss", $user_id, $meal_type, $scheduled_date);
$stmt->execute();
$result = $stmt->get_result();

// Check if preference exists
if ($result->num_rows > 0) {
    $preference = $result->fetch_assoc()['preference'];
} else {
    // Default to 'Veg' if no preference is found
    $preference = 'Veg';
}

// Fetch the menu based on the user's preference (Veg or Non-Veg or Both)
$menu_query = "SELECT menu FROM weekly_menu WHERE day_of_week = ? AND meal_type = ? AND is_veg = ?";
$is_veg = ($preference == 'Veg') ? 1 : ($preference == 'Non-Veg' ? 0 : NULL);
$stmt = $conn->prepare($menu_query);
$stmt->bind_param("sss", $day_of_week, $meal_type, $is_veg);
$stmt->execute();
$result = $stmt->get_result();

// Check if the menu is available for the given day, meal, and preference
if ($result->num_rows > 0) {
    $menu = $result->fetch_assoc()['menu'];
} else {
    $menu = "No menu available for this meal.";
}

// Prepare the SQL query to insert or update the meal_schedule table
$update_query = "INSERT INTO meal_schedule (user_id, scheduled_date, meal_type, menu, status, access_time, day_of_week) 
                 VALUES (?, ?, ?, ?, ?, ?, ?)
                 ON DUPLICATE KEY UPDATE status = ?, access_time = ?, menu = ?";

// Check if the user accessed the meal
if ($disable_access_meal_button) {
    // User did not access the meal
    $status = "Not Accessed";
    $access_time = NULL; // Set access_time to NULL
} else {
    // User accessed the meal
    $status = "Accessed";
    $access_time = date('Y-m-d H:i:s'); // Current timestamp
}

// Prepare and execute the query
$stmt = $conn->prepare($update_query);
$stmt->bind_param(
    "isssssssss", // 10 placeholders
    $user_id, 
    $scheduled_date, 
    $meal_type, 
    $menu, 
    $status, 
    $access_time, 
    $day_of_week, 
    $status, // For ON DUPLICATE KEY UPDATE
    $access_time, // For ON DUPLICATE KEY UPDATE
    $menu // For ON DUPLICATE KEY UPDATE
);

if ($stmt->execute()) {
    // Successfully inserted or updated the record
    header('Location: meal_schedule.php?message=Meal access updated successfully.');
} else {
    // Error handling
    header('Location: meal_schedule.php?message=Error updating meal access.');
}
exit;
?>
