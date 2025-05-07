<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
    <title>E-Voting System</title>
    <script src="./bootstrap/jquery-3.7.1.js"></script>
</head>

<body>
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['sic'])) {
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">E-Voting System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-2">
                        <a class="btn btn-primary btn-sm" href="password.php">Change Password</a>
                        <a class="btn btn-primary btn-sm" href="logout.php">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
    <?php
    } else {
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">E-Voting System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse me-3" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a class="btn btn-primary me-1" href="login.php">Login</a>
                        <a class="btn btn-primary" href="register.php">Register</a>
                    </div>
                </div>
            </div>
        </nav>
        <?php
    }
    ?>
</body>

</html>