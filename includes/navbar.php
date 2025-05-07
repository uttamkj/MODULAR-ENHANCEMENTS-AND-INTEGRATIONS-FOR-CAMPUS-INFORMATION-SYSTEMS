<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
// if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
//     header("location: ../login.php");
//     exit;
// }
// $admin_name = isset($_SESSION['name']) ? $_SESSION['name'] : "Admin";
// $admin_role = $_SESSION['role'];
// <li><p class="text-dark  ms-3 me-1"> <i class="fas fa-user me-2"></i>' . htmlspecialchars($admin_name) . '</p></li>
//                                 <li><hr class="dropdown-divider"></li>
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .profile-icon {
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <?php
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="images/logo-7.png" width="120" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item me-1">
                        <a class="nav-link active" href="">Home</a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link active" href="homePages/about.php">About</a>
                    </li>
                    <li class="nav-item dropdown me-1">
                        <a class="nav-link active dropdown-toggle" href="#" id="noticeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Notices
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../silicon/notice/notices.php?category=Administration">Administration</a></li>
                            <li><a class="dropdown-item" href="../silicon/notice/notices.php?category=Exam">Exam</a></li>
                            <li><a class="dropdown-item" href="../silicon/notice/notices.php?category=Academic">Academics</a></li>
                            <li><a class="dropdown-item" href="../silicon/notice/notices.php?category=Event">Event</a></li>
                            <li><a class="dropdown-item" href="../silicon/notice/notices.php?category=Finance">Finance</a></li>
                        </ul>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link active" href="homePages/contact.php">Contact</a>
                    </li>
                </ul>

                <?php
                echo isset($_SESSION['sic']) ?
                    '<div class="d-flex">
                        <div class="dropdown">
                            <div class="profile-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle fa-2x text-white"></i>
                            </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                
                                <!-- Uttam : link to dashboard accoring to role -->
                                <li><a class="dropdown-item" href="' . (isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? '../Admin/admin_dashboard.php' : '../User/user_dashboard.php') . '">
                                <i class="fas fa-user me-2"></i>Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>


                                <li><a class="dropdown-item" href="passwordChange.php"><i class="fas fa-key me-2"></i>Change Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                </ul>
                        </div>
                    </div>'
                    :
                    '<div class="d-flex">
                        <a class="btn btn-light text-info me-2" href="login.php">Log In</a>
                        <a class="btn btn-light text-info " href="evoting/register.php">Register</a>
                    </div>';

                ?>

            </div>
        </div>
    </nav>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>