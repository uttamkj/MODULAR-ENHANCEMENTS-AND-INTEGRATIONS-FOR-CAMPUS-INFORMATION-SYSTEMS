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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .dashboard-heading {
            font-size: 2.2rem;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color:rgb(13, 110, 253);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .card {
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.2s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

<?php
// echo "<p>Welcome, " . htmlspecialchars($user['name']) . "!</p>";
// echo "<p>Your role: " . htmlspecialchars($user['role']) . "</p>";

// $admin_name = $_SESSION['name'];
// $admin_role = $_SESSION['role'];
?>
    <div class="container mt-4 border shadow rounded">
        <!-- Header -->
        <div class="header d-flex justify-content-center align-items-center p-4 bg-light border-bottom">
            <h1 class="dashboard-heading">
                <i class="fas fa-chart-pie"></i>ADMIN DASHBOARD
            </h1>


            <div class="text-end ms-5">
                <p class="mb-1 ms-5"><strong> <?php echo htmlspecialchars($admin_name); ?></strong></p>
                <p class="mb-0">Role: <span class="badge bg-primary"><?php echo htmlspecialchars($admin_role); ?></span></p>
            </div>
        </div>
        <!-- Dashboard Content -->
        <div class="container py-4 m-2">
            <div class="row g-4">
                <!-- First Row -->
                <div class="col-md-4">
                    <div class="card bg-light border-1 shadow-lg h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="fas fa-vote-yea text-primary mb-3 fa-3x"></i>
                            <h5 class="card-title fw-bold">E Voting</h5>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="../evoting/admin_dashboard.php" class="btn btn-sm btn-outline-primary w-100">Manage</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border-1 shadow-lg h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="fas fa-filter text-primary mb-3 fa-3x"></i>
                            <h5 class="card-title fw-bold">Data Filtration</h5>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="dataFilterPage.php" class="btn btn-sm btn-outline-primary w-100">Manage</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border-1 shadow-lg h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="fas fa-bell text-primary mb-3 fa-3x"></i>
                            <h5 class="card-title fw-bold">Notice</h5>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="../notice/delete_notice.php" class="btn btn-sm btn-outline-primary w-100">Manage</a>
                        </div>
                    </div>
                </div>

                <!-- Second Row -->
                <div class="col-md-4">
                    <div class="card bg-light border-1 shadow-lg h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="fas fa-user-graduate text-primary mb-3 fa-3x"></i>
                            <h5 class="card-title fw-bold">Student<br>Data Management</h5>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="../StudentManagement/index.php" class="btn btn-sm btn-outline-primary w-100">Manage</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border-1 shadow-lg h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="fas fa-utensils text-primary mb-3 fa-3x"></i>
                            <h5 class="card-title fw-bold">Canteen</h5>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="../food/admin_menu_display.php" class="btn btn-sm btn-outline-primary w-100">Manage</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border-1 shadow-lg h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="fas fa-comment-alt text-primary mb-3 fa-3x"></i>
                            <h5 class="card-title fw-bold">Feedback Report /<br>Contact Us</h5>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="#" class="btn btn-sm btn-outline-primary w-100">Manage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <!-- <script src="../assets/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>

<?php
require_once "../includes/footer2.php";
?>