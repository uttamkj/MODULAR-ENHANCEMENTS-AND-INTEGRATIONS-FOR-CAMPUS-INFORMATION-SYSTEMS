<?php
require_once "../includes/navbar.php";
?>
<?php
// uttam : important part to track the session (single user through out the website) but need to session start  by navbar 

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("location: ../login.php");
    exit;
}
$admin_name = isset($_SESSION['name']) ? $_SESSION['name'] : "Admin";
$admin_role = $_SESSION['role'];
?>
<?php
require_once "../db/dbconnect.php";
require_once "functions.php";

if (isset($_POST['delete_selected']) && !empty($_POST['selected_notices'])) {
    global $conn;

    $selected_ids = $_POST['selected_notices'];
    $placeholders = implode(',', array_fill(0, count($selected_ids), '?'));

    $qry = "DELETE FROM notice WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($qry);

    $types = str_repeat('i', count($selected_ids)); // 'i' for integer
    $stmt->bind_param($types, ...$selected_ids);

    // Execute statement
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<p class='text-success text-center'>Deleted Succefully</p>";
    } else {
        echo "<script>alert('Error deleting notices.');</script>";
    }

    $stmt->close();
} else {
    // echo "<script>alert('No notices selected.');</script>";
}



// Pagination setup
$limit = 8; // Number of notices per page
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$result = getPaginatedNotices($limit, $offset);
$total_notices = getTotalNotices();
$total_pages = ceil($total_notices / $limit);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notices</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .table {
            box-shadow: 0 4px 10px rgba(18, 18, 18, 0.55);
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            background: #fff;
            border-radius: 25px;
            box-shadow: 0 4px 10px rgba(18, 18, 18, 0.55);
        }

        .pagination a {
            text-decoration: none;
            color: gray;
            font-size: 16px;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 50%;
            transition: 0.3s ease-in-out;
        }

        .pagination a.active {
            color: rgb(93, 168, 248);
            font-weight: bold;
        }

        .pagination a:hover {
            color: rgb(104, 194, 233);
        }

        .pagination .disabled {
            color: grey;
            pointer-events: none;
        }

        .pagination .arrow {
            font-size: 18px;
        }

        .admin-notice-heading {
            font-size: 28px;
            font-weight: bold;
            display: inline-block;
            color: rgb(27, 34, 129);
            border-bottom: 3px solid rgb(27, 34, 129);
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="container text-center">
            <h2 class="admin-notice-heading mb-2 p-1">ADMIN NOTICE PANEL</h2>
        </div>

        <!-- <div class="text-end">
            <p class="mb-1"><strong>Welcome, <?php echo htmlspecialchars($admin_name); ?>!</strong></p>
            <p class="mb-0">Role: <span class="badge bg-primary"><?php echo htmlspecialchars($admin_role); ?></span></p>
        </div> -->

        <div class="text-end mb-3">
            <a href="add_notice.php" class="btn btn-success">Add Notice</a>
        </div>
        <form action="delete_notice.php" method="POST"> <!-- ✅ Corrected action -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Posted Date</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "functions.php";
                        $result = getPaginatedNotices($limit, $offset);

                        if ($result->num_rows > 0) {
                            while ($notice = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><input type='checkbox' class='notice-checkbox' name='selected_notices[]' value='{$notice['id']}'></td>";
                                echo "<td>{$notice['id']}</td>";
                                echo "<td>{$notice['author']}</td>";
                                echo "<td>{$notice['title']}</td>";
                                echo "<td>{$notice['category']}</td>";
                                echo "<td>{$notice['posted_date']}</td>";
                                echo "<td>";
                                if (!empty($notice['file'])) {
                                    echo "<a class='btn btn-primary' href='uploads/{$notice['file']}' target='_blank'>View File</a>";
                                } else {
                                    echo "No File";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No Notices Found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="table-footer">
                <button type="submit" name="delete_selected" class="btn btn-danger">Delete Selected</button>

                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="?page=<?= max(1, $page - 1) ?>"
                                class="arrow <?= ($page == 1) ? 'disabled' : '' ?>">←</a>
                        </li>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li>
                                <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <li>
                            <a href="?page=<?= min($total_pages, $page + 1) ?>"
                                class="arrow <?= ($page == $total_pages) ? 'disabled' : '' ?>">→</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </form>
    </div>

    <script>
        document.getElementById("selectAll").addEventListener("change", function() {
            let checkboxes = document.querySelectorAll(".notice-checkbox");
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        document.querySelectorAll(".notice-checkbox").forEach(checkbox => {
            checkbox.addEventListener("change", function() {
                let allChecked = document.querySelectorAll(".notice-checkbox:checked").length === document.querySelectorAll(".notice-checkbox").length;
                document.getElementById("selectAll").checked = allChecked;
            });
        });
    </script>

    <?php
    require_once "../includes/footer.php";
    ?>