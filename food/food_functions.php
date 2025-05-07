<?php
require_once "dbconnect.php";
function getMealsBySIC($sic_no, $startDate, $endDate)
{
    global $conn;
    try {
        $qry = "
          SELECT 
            ms.meal_type,
            DAYNAME(ms.scheduled_date) AS day_of_week,
            ms.status
          FROM meal_schedule ms
          INNER JOIN food_users u 
            ON ms.user_id = u.user_id
          WHERE u.sic_no      = ?
            AND ms.scheduled_date BETWEEN ? AND ?
          ORDER BY 
            FIELD(DAYNAME(ms.scheduled_date),
                  'Monday','Tuesday','Wednesday','Thursday',
                  'Friday','Saturday','Sunday'),
            FIELD(ms.meal_type,'Breakfast','Lunch','Dinner')
        ";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("sss", $sic_no, $startDate, $endDate);
        $stmt->execute();
        return $stmt->get_result();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $stmt->close();
    }
}

function getMealDetails(string $sic_no, string $meal_type, string $scheduled_date) 
{
    global $conn;
    $sql = "
      SELECT ms.* 
      FROM meal_schedule ms
      JOIN food_users u 
        ON ms.user_id = u.user_id
      WHERE u.sic_no         = ?
        AND ms.meal_type     = ?
        AND ms.scheduled_date = ? -- Ensure exact date match
      LIMIT 1
    ";

    if (! $stmt = $conn->prepare($sql)) {
        die('SQL prepare failed: ' . $conn->error);
    }
    $stmt->bind_param("sss", $sic_no, $meal_type, $scheduled_date);
    $stmt->execute();
    $res = $stmt->get_result();
    $stmt->close();

    return $res;
}


/**
 * Fetch all veg/non-veg menu items for a meal/day from weekly_menu.
 */
function getWeeklyMenu(string $meal_type, string $day_of_week): array {
    global $conn;
    $sql = "
      SELECT menu, is_veg
      FROM weekly_menu
      WHERE meal_type = ? AND day_of_week = ?
    ";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $meal_type, $day_of_week);
        $stmt->execute();
        $res = $stmt->get_result();

        $menus = ['veg' => [], 'nonveg' => []];
        while ($row = $res->fetch_assoc()) {
            if ((int)$row['is_veg'] === 1) {
                $menus['veg'][] = $row['menu'];
            } else {
                $menus['nonveg'][] = $row['menu'];
            }
        }

        $stmt->close();
        return $menus;
    } else {
        // Error in SQL statement preparation
        die('Error preparing SQL statement: ' . $conn->error);
    }
}
function addMealFeedback(int $meal_id, int $user_id, int $rating, string $comments): bool
{
    global $conn;

    $sql = "
        INSERT INTO feedback (meal_id, user_id, rating, comments, submitted_at)
        VALUES (?, ?, ?, ?, NOW())
    ";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        return false;
    }
    $stmt->bind_param("iiis", $meal_id, $user_id, $rating, $comments);
    $ok = $stmt->execute();
    if (!$ok) {
        error_log("Execute failed: " . $stmt->error);
    }
    $stmt->close();

    return $ok;
}

function hasSubmittedFeedback($meal_id, $user_id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT 1 FROM feedback WHERE meal_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $meal_id, $user_id);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}
function saveMealPreference($user_id, $meal_type, $scheduled_date, $preference = 'Veg') {
    global $conn;

    // Debugging the function execution
    error_log("Saving preference for user_id: $user_id, meal_type: $meal_type, scheduled_date: $scheduled_date, preference: $preference");

    $stmt = $conn->prepare("INSERT INTO meal_preferences (user_id, meal_type, scheduled_date, preference)
                            VALUES (?, ?, ?, ?)
                            ON DUPLICATE KEY UPDATE preference = VALUES(preference)");

    if (!$stmt) {
        error_log("SQL error: " . $conn->error);  // Log SQL error
        return false;
    }

    // Log the parameters being bound to ensure they are correct
    error_log("Binding parameters: user_id=$user_id, meal_type=$meal_type, scheduled_date=$scheduled_date, preference=$preference");

    $stmt->bind_param("isss", $user_id, $meal_type, $scheduled_date, $preference);

    if ($stmt->execute()) {
        error_log("Preference saved successfully.");
        $stmt->close();
        return true;
    } else {
        error_log("Execute failed: " . $stmt->error);  // Log execution error
        $stmt->close();
        return false;
    }
}


function getWeeklyMenuAdmin()
{
    global $conn;
    try {
        $qry = "
            SELECT 
                day_of_week,
                meal_type,
                GROUP_CONCAT(CASE WHEN is_veg = 1 THEN menu ELSE NULL END) AS menu_veg,
                GROUP_CONCAT(CASE WHEN is_veg = 0 THEN menu ELSE NULL END) AS menu_nonveg
            FROM weekly_menu
            GROUP BY day_of_week, meal_type
            ORDER BY 
                FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
                FIELD(meal_type, 'Breakfast', 'Lunch', 'Dinner')
        ";
        $stmt = $conn->prepare($qry);
        $stmt->execute();
        return $stmt->get_result();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $stmt->close();
    }
}