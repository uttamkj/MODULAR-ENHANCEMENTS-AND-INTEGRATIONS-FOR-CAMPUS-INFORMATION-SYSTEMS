<?php
require_once "includes/navbar.php";
require_once "functions.php";


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['login'])) {
    $sic = $_POST['sic'];
    $password = $_POST['password'];
    $res = logIn($sic, $password);
    if ($res) {
        $_SESSION['sic'] = $sic;
        $user = $res->fetch_assoc();

        $_SESSION['name'] = $user['name'];
        $_SESSION['course'] = $user['course'];
        $_SESSION['role'] = $user['role']; // Set the session role


        // echo "<script>console.log('User Name: " . addslashes($user['name']) . "');</script>";
        // echo "<script>console.log('Role: " . addslashes($user['role']) . "');</script>";
        // echo "<p>Welcome, " . htmlspecialchars($user['name']) . "!</p>";
        // echo "<p>Your role: " . htmlspecialchars($user['role']) . "</p>";


        // Redirect based on role  edited by uttam 
        if ($user['role'] === 'admin') {
            header("Location: Admin/admin_dashboard.php");
        } else if ($user['role'] === 'user') {
            header("Location: User/user_dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit; // Ensure script stops execution after redirection
    } else {
        $error_message = "Invalid SIC or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="./bootstrap/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Fullscreen Layout */
        .login-container {
            min-height: 70vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 20px;
            padding-top: 80px;
            padding-bottom: 80px;
            /* background: linear-gradient(to right, #A18CD1, #FBC2EB); */
        }

        .login-card {
            max-width: 800px;
            width: 100%;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Left Side Image */
        .login-img {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            padding: 15px;
        }

        .login-img img {
            width: 100%;
            object-fit: cover;
        }

        /* Right Side (Form) */
        .login-form {
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form h5 {
            font-weight: 500;
            margin-bottom: 20px;
            font-size: 18px;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-form small {
            color: gray;
            font-size: 14px;
        }

        .form-control {
            height: 40px;
            font-size: 14px;
            border-radius: 5px;
        }

        .login-form .btn-primary {
            background: #7B61FF;
            border: none;
            font-size: 16px;
            padding: 8px;
            border-radius: 25px;
            transition: 0.3s ease-in-out;
        }

        .login-form .btn-primary:hover {
            background: #5A41CC;
        }

        /* Responsive Design: Image Moves on Small Screens */
        @media (max-width: 767px) {
            .login-img {
                order: -1;
                /* Moves image to top */
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card mt-5">
            <div class="row g-0">
                <!-- Left Side Image (Moves above form on small screens) -->
                <div class="col-sm-6 col-12 login-img">
                    <img src="images/loginImg.png" alt="login image">
                </div>

                <!-- Right Side (Form) -->
                <div class="col-sm-6 col-12 login-form">
                    <h5>Welcome Back!</h5>

                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger text-center mt-3">
                            <?php echo htmlspecialchars($error_message); ?>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="sic" name="sic"
                                placeholder="Enter your SIC number" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <input type="password" class="form-control pe-5" id="password" name="password"
                                placeholder="Enter your password" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword()" style="cursor: pointer;">
                                <i id="toggleIcon" class="bi bi-eye-slash"></i>
                            </span>
                        </div>

                        <div class="d-grid mt-4">
                            <input type="submit" class="btn btn-primary" value="Login" name="login">
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <small class="text-muted">Don't have an account?
                            <a href="register.php" class="text-primary">Sign Up</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
require_once "includes/footer.php";
?>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("bi-eye-slash");
            toggleIcon.classList.add("bi-eye");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("bi-eye");
            toggleIcon.classList.add("bi-eye-slash");
        }
    }
    window.addEventListener("pageshow", function(event) {
        if (event.persisted) {
            // The page was restored from the cache (back/forward button was used)
            window.location.reload();
        }
    });
</script>