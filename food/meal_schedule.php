<?php
// session_start();
include_once "../includes/navbar.php";
require_once "food_functions.php";

// 1) If the user isn’t logged in, bail out
// if (!isset($_SESSION['sic_no'])) {
//     header('Location: food_login.php');
//     exit;
// }
if (!isset($_SESSION['sic']) || !isset($_SESSION['course'])) {
    header("location: login.php");
    exit;
}

// 2) Grab or default the “picked” date
$sel = $_GET['week_date'] ?? date('Y-m-d');

// 3) Compute Monday/Sunday of that selected week
$selTs     = strtotime($sel);
$startDate = date('Y-m-d', strtotime('monday this week',  $selTs));
$endDate   = date('Y-m-d', strtotime('sunday this week',  $selTs));

// 4) Fetch only that week’s meals
$sic_no = $_SESSION['sic'];
$result = getMealsBySIC($sic_no, $startDate, $endDate);

// 5) Prepare your lookup arrays
$days       = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
$meal_types = ['Breakfast','Lunch','Dinner'];
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['meal_type']][$row['day_of_week']] = $row['status'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Weekly Meal Schedule</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-2">
        <h2 class="text-center mb-4">WEEKLY MEAL SCHEDULE</h2>
        <?php
        // pick a date (YYYY-MM-DD); default to today if none chosen
        $sel = $_GET['week_date'] ?? date('Y-m-d');
        ?>
        <form method="get" class="mb-4 d-flex justify-content-center align-items-center">
            <input type="date" id="week_date" name="week_date" value="<?= htmlspecialchars($sel) ?>"
                class="form-control w-auto me-2">
            <button type="submit" class="btn btn-primary">Show</button>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Meal Type | Day</th>
                        <?php foreach ($days as $day): ?>
                            <th><?= htmlspecialchars($day) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($meal_types as $meal): ?>
                        <tr>
                            <th class="table-light"><?= htmlspecialchars($meal) ?></th>
                            <?php foreach ($days as $day):
                                $status = $data[$meal][$day] ?? 'Pending';
                                $icon = ($status === 'Accessed') ? '✅' : (($status === 'Not Accessed') ? '❌' : '⏳');
                                ?>
                                <td>
                                    <a href="meal_details.php?meal_type=<?= urlencode($meal) ?>&day_of_week=<?= urlencode($day) ?>&week_date=<?= urlencode($startDate) ?>"
                                        class="btn btn-outline-primary p-2">
                                        <?= $icon ?>
                                    </a>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php
        require_once "display_meals.php";
    ?>
</body>
</html>