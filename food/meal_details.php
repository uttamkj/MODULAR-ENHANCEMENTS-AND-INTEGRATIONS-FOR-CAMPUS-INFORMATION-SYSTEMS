<?php
session_start();

if (!isset($_SESSION['sic'])) {
    // Redirect to login page if the user is not logged in
    header('Location: food_login.php');
    exit;
}

$sic_no = $_SESSION['sic']; // Retrieve the logged-in user's SIC number
require_once "food_functions.php";

// Retrieve meal type from the URL
$meal_type = $_GET['meal_type'] ?? null;

if (!$meal_type) {
    die("Meal type is required.");
}

// Retrieve the selected week start date and day_of_week from the URL
// Retrieve the selected week start date and day_of_week from the URL
$week_date = $_GET['week_date'] ?? date('Y-m-d');
$day_of_week = $_GET['day_of_week'] ?? null;

$days_of_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

if (!$day_of_week || !in_array($day_of_week, $days_of_week)) {
    echo "<div class='alert alert-danger'>Invalid or missing day of week: " . htmlspecialchars($day_of_week) . "</div>";
    // Redirect to a default page or stop execution
    header('Location: meal_schedule.php?error=invalid_day_of_week');
    exit;
}
$day_index = array_search($day_of_week, $days_of_week);

// Create a DateTime object for the week_date
$week_start = new DateTime($week_date);
$week_start->modify('monday this week');

// Calculate the scheduled_date by adding the day_index to the week_start
$scheduled_date = clone $week_start;
$scheduled_date->modify("+$day_index days");
$scheduled_date = $scheduled_date->format('Y-m-d');

// Fetch meal details from the meal_schedule table
$res = getMealDetails($sic_no, $meal_type, $scheduled_date);
$meal_details = ($res && $res->num_rows > 0) ? $res->fetch_assoc() : null;


// Determine the status of the meal
if (!$meal_details || $meal_details['status'] === 'Pending') {
    // If no data is found or the status is "Pending," fallback to weekly_menu
    $menus = getWeeklyMenu($meal_type, $day_of_week);
    $meal_details = [
        'meal_id' => null,
        'meal_type' => $meal_type,
        'day_of_week' => $day_of_week,
        'status' => 'Pending',
        'access_time' => null,
        'menu_veg' => !empty($menus['veg']) ? implode(', ', $menus['veg']) : '—',
        'menu_nonveg' => !empty($menus['nonveg']) ? implode(', ', $menus['nonveg']) : '—'
    ];
}
date_default_timezone_set('Asia/Kolkata');

$meal_times = [
    'Breakfast' => '08:00:00',
    'Lunch' => '13:00:00',
    'Dinner' => '19:00:00'
];

// --- Determine meal time based on meal type ---
$meal_time_of_day = $meal_times[$meal_type] ?? '13:00:00'; // Default to 1 PM if not found

// --- Combine scheduled date and meal time ---
$scheduled_datetime_for_meal = new DateTime("$scheduled_date $meal_time_of_day");
$current_datetime = new DateTime();

// --- Calculate time difference ---
$interval = $current_datetime->diff($scheduled_datetime_for_meal);
$hours_difference = ($interval->days * 24) + $interval->h + ($interval->i / 60);

// --- Determine if Save Preference button should be disabled ---
$disable_save_preference = ($scheduled_datetime_for_meal < $current_datetime) || ($hours_difference < 24);

date_default_timezone_set('Asia/Kolkata');

// Meal times for access
$meal_access_times = [
    'Breakfast' => ['start' => '08:00', 'end' => '11:00'],
    'Lunch' => ['start' => '12:35', 'end' => '14:00'],
    'Dinner' => ['start' => '20:30', 'end' => '23:00']
];

// Get the current meal type
$current_meal_type = htmlspecialchars($meal_details['meal_type']);

// Convert the start and end times of the current meal type into DateTime objects
$meal_start_time = new DateTime($meal_access_times[$current_meal_type]['start']);
$meal_end_time = new DateTime($meal_access_times[$current_meal_type]['end']);
$current_time_now = new DateTime();

// Check if the current time is within the meal time range
$disable_access_meal_button = ($current_time_now < $meal_start_time || $current_time_now > $meal_end_time);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($meal_details['meal_type'] . ' on ' . $meal_details['day_of_week']) ?></title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <?php if (isset($_GET['feedback'])): ?>
        <div class="container mt-4">
            <?php if ($_GET['feedback'] == 1): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    🎉 <strong>Thank you!</strong> Your feedback has been recorded.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php else: ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ⚠️ <strong>Note:</strong> You already submitted feedback for this meal.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="container py-5">
        <a href="meal_schedule.php" class="btn btn-outline-secondary mb-4">&larr; Back</a>
        <div class="card">
            <div class="card-header">
                <strong><?= htmlspecialchars($meal_details['meal_type']) ?></strong>
                &mdash; <?= htmlspecialchars($meal_details['day_of_week']) ?>
            </div>
            <div class="card-body">

                <?php if ($meal_details['status'] === 'Pending'): ?>
                    <!-- Pending: show weekly menu and preference options -->
                    <p><strong>Menu (Veg):</strong> <?= htmlspecialchars($meal_details['menu_veg']) ?></p>
                    <p><strong>Menu (Non-Veg):</strong> <?= htmlspecialchars($meal_details['menu_nonveg']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($meal_details['status']) ?></p>

                    <form action="modify_preference.php" method="POST" class="mb-3">
                        <input type="hidden" name="meal_type" value="<?= htmlspecialchars($meal_details['meal_type']) ?>">
                        <input type="hidden" name="scheduled_date" value="<?= htmlspecialchars($scheduled_date) ?>">
                        <input type="hidden" name="day_of_week"
                            value="<?= htmlspecialchars($meal_details['day_of_week']) ?>">
                        <div class="mb-3">
                            <label for="preference" class="form-label">Select Preference</label>
                            <select name="preference" id="preference" class="form-select" required>
                                <option value="Veg">Veg</option>
                                <option value="Non-Veg">Non-Veg</option>
                                <option value="Both">Both</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" <?= $disable_save_preference ? 'disabled' : '' ?>>
                            Save Preference
                        </button>
                    </form>
                    <form action="access_meal_update.php" method="POST">
                        <input type="hidden" name="meal_type"
                            value="<?= htmlspecialchars($meal_details_data['meal_type']) ?>">
                        <input type="hidden" name="scheduled_date"
                            value="<?= htmlspecialchars($meal_scheduled_date_formatted) ?>">
                        <input type="hidden" name="day_of_week"
                            value="<?= htmlspecialchars($meal_details_data['day_of_week']) ?>">
                        <button type="submit" class="btn btn-primary" <?= $disable_access_meal_button ? 'disabled' : '' ?>>
                            Access Meal
                        </button>
                    </form><br>

                    <?php if (isset($_GET['preference'])): ?>
                        <!-- Display success or error message based on the preference parameter -->
                        <div class="alert alert-<?= $_GET['preference'] == 1 ? 'success' : 'danger' ?> alert-dismissible fade show"
                            role="alert">
                            <?= htmlspecialchars($_GET['message'] ?? ($_GET['preference'] == 1 ? 'Preference saved successfully.' : 'Error saving preference.')) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif ($disable_save_preference): ?>
                        <!-- Display warning message only if the form has not been submitted -->
                        <div class="alert alert-warning mt-2 alert-dismissible fade show" role="alert">
                            <?php
                            if ($scheduled_datetime_for_meal < $current_datetime) {
                                echo "⚠️ <strong>Warning:</strong> Cannot save preference for past meals.";
                            } elseif ($hours_difference < 24) {
                                echo "⚠️ <strong>Warning:</strong> Preference must be saved at least 24 hours in advance.";
                            }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>


                <?php elseif ($meal_details['status'] === 'Accessed'): ?>
                    <!-- Accessed: show actual schedule data and feedback form -->
                    <p><strong>Menu:</strong> <?= htmlspecialchars($meal_details['menu']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($meal_details['status']) ?></p>
                    <p><strong>Time:</strong> <?= htmlspecialchars($meal_details['access_time']) ?></p>

                    <form action="submit_feedback.php" method="POST">
                        <input type="hidden" name="meal_id" value="<?= htmlspecialchars($meal_details['meal_id']) ?>">
                        <input type="hidden" name="meal_type" value="<?= htmlspecialchars($meal_details['meal_type']) ?>">
                        <input type="hidden" name="day_of_week"
                            value="<?= htmlspecialchars($meal_details['day_of_week']) ?>">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rate your meal</label>
                            <select name="rating" id="rating" class="form-select" required>
                                <option value="">Choose</option>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comments" class="form-label">Comments</label>
                            <textarea name="comments" id="comments" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </form>

                <?php else: ?>
                    <!-- Not Accessed -->
                    <p><strong>Menu:</strong> <?= htmlspecialchars($meal_details['menu']) ?></p>
                    <p><strong>Time:</strong> <?= htmlspecialchars($meal_details['access_time']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($meal_details['status']) ?></p>
                    <p class="text-muted">You did not access this meal.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>

</html>