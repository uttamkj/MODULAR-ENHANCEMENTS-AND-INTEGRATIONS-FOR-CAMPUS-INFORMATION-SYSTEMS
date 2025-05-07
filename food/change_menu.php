<?php
require_once '../db/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $day = $_POST['day'];
    $mealType = $_POST['meal_type'];
    $vegMenu = trim($_POST['veg_menu']);
    $nonVegMenu = trim($_POST['nonveg_menu']);

    // Update Veg Menu (if non-empty)
    if (!empty($vegMenu)) {
        $stmt = $conn->prepare(
            "UPDATE weekly_menu 
             SET menu = ? 
             WHERE day_of_week = ? AND meal_type = ? AND is_veg = 1"
        );
        $stmt->bind_param('sss', $vegMenu, $day, $mealType);
        $stmt->execute();
    }

    // Update Non-Veg Menu (if non-empty)
    if (!empty($nonVegMenu)) {
        $stmt = $conn->prepare(
            "UPDATE weekly_menu 
             SET menu = ? 
             WHERE day_of_week = ? AND meal_type = ? AND is_veg = 0"
        );
        $stmt->bind_param('sss', $nonVegMenu, $day, $mealType);
        $stmt->execute();
    }

    // Redirect back to the menu display page
    header('Location: admin_menu_display.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Menu</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Change Menu</h2>

    <div class="card shadow">
        <div class="card-body">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="change_menu.php">
                <div class="mb-3">
                    <label for="day" class="form-label">Day of the Week</label>
                    <select name="day" id="day" class="form-select" required>
                        <option value="">Select a Day</option>
                        <?php foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day): ?>
                            <option value="<?= htmlspecialchars($day) ?>"><?= htmlspecialchars($day) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="meal_type" class="form-label">Meal Type</label>
                    <select name="meal_type" id="meal_type" class="form-select" required>
                        <option value="">Select a Meal Type</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="veg_menu" class="form-label">Veg Menu</label>
                    <input type="text" name="veg_menu" id="veg_menu" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nonveg_menu" class="form-label">Non-Veg Menu</label>
                    <input type="text" name="nonveg_menu" id="nonveg_menu" class="form-control">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Update Menu</button>
                    <a href="admin_menu_display.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>