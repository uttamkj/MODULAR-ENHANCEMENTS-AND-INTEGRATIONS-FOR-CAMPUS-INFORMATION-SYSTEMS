<?php
require_once '../db/dbconnect.php';
require_once 'food_functions.php';

$result = getWeeklyMenuAdmin();

// Organize data into a structured array
$menuData = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuData[$row['meal_type']][$row['day_of_week']] = [
            'veg' => $row['menu_veg'] ?? '-',
            'nonveg' => $row['menu_nonveg'] ?? '-',
        ];
    }
}

// Define the days of the week
$daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Weekly Menu Display</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">WEEKLY MENU</h2>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Meal Type</th>
                            <?php foreach ($daysOfWeek as $day): ?>
                                <th><?= htmlspecialchars($day) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($menuData)): ?>
                            <?php foreach ($menuData as $mealType => $days): ?>
                                <tr>
                                    <td><?= htmlspecialchars($mealType) ?></td>
                                    <?php foreach ($daysOfWeek as $day): ?>
                                        <td>
                                            <span style="color: green; font-weight: bold;">Veg:</span>
                                            <?= htmlspecialchars($days[$day]['veg'] ?? '-') ?><br>
                                            <?php if (!empty($days[$day]['nonveg']) && $days[$day]['nonveg'] !== '-'): ?>
                                                <span style="color: red; font-weight: bold;">Non-Veg:</span>
                                                <?= htmlspecialchars($days[$day]['nonveg']) ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?= count($daysOfWeek) + 1 ?>" class="text-center">No Menu Data Found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="text-end mt-4">
                    <a href="change_menu.php" class="btn btn-primary">CHANGE MENU</a>
                    <a href="register_user.php" class="btn btn-primary">NEW USER</a>
                </div>
                
            </div>
        </div>
    </div>

</body>

</html>