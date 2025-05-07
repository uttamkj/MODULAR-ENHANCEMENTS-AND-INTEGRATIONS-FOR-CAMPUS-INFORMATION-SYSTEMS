<?php
require_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <script src="./bootstrap/jquery-3.7.1.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            min-width: 400px;
            overflow-x: auto;
        }

        .container-fluid {
            min-width: 400px;
        }

        .register-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            padding-top: 10px;
            padding-bottom: 40px;
        }

        .register-card {
            max-width: 700px;
            width: 100%;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Left Side Image */
        .register-img {
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
        }

        .register-img img {
            width: 100%;
            object-fit: cover;
        }

        /* Right Side (Form) */
        .register-form {
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-form h4 {
            font-weight: 500;
            margin-bottom: 20px;
            font-size: 20px;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-form small {
            color: gray;
            font-size: 14px;
        }

        .form-control {
            height: 40px;
            font-size: 14px;
            border-radius: 5px;
        }

        .register-form .btn-primary {
            background: linear-gradient(to right, rgb(128, 118, 210), rgb(114, 169, 203));
            border: none;
            font-size: 16px;
            padding: 8px;
            border-radius: 25px;
            transition: 0.3s ease-in-out;
        }

        .register-form .btn-primary:hover {
            background: #5A41CC;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .social-login a {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #eee;
            transition: 0.3s;
        }

        .social-login a:hover {
            background: #ddd;
        }

        .error-message {
            font-size: 0.875rem;
            color: rgb(163, 162, 162);
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="row g-0">
                <!-- Left Side Image -->
                <div class="col-sm-6 register-img">
                    <img src="images/Image.jpg" alt="register image">
                </div>

                <!-- Right Side (Form) -->
                <div class="col-sm-6 register-form">
                    <h4>Register Here</h4>

                    <form id="registerForm">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            <div class="error-message" id="nameError"></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="sic" name="sic" placeholder="SIC">
                            <div class="error-message" id="sicError"></div>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" id="course" name="course">
                                <option value="" disabled selected>--Course--</option>
                                <option value="MCA">MCA</option>
                                <option value="BTech">BTech</option>
                                <option value="MTech">MTech</option>
                                <option value="MSc">MSc</option>
                            </select>
                            <div class="error-message" id="courseError"></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" minlength="6">
                            <div class="error-message" id="passwordError"></div>
                        </div>
                        <div class="d-grid mt-4">
                            <input type="submit" value="Register" class="btn btn-primary text-white">
                        </div>
                        <p id="msg" class="mt-3 text-center"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#registerForm").submit(function (e) {
            e.preventDefault();

            // Reset error messages
            $(".error-message").text("");

            let name = $("#name").val().trim();
            let sic = $("#sic").val().trim();
            let course = $("#course").val();
            let password = $("#password").val();

            // Validation
            let isValid = true;

            if (name.length < 4) {
                $("#nameError").text("Please give your full name.");
                isValid = false;
            }

            if (!/^\d{2}[A-Za-z]{4}\d{2}$/.test(sic)) {
                $("#sicError").text("SIC must follow the format: (e.g., 12ABCD34).");
                isValid = false;
            }

            if (!course) {
                $("#courseError").text("Please select a course.");
                isValid = false;
            }

            if (password.length < 6) {
                $("#passwordError").text("Password must be at least 6 characters.");
                isValid = false;
            }

            if (!isValid) return;

            $.ajax({
                url: "check_voter.php",
                method: "POST",
                data: {
                    "sic": sic,
                    "name": name,
                    "course": course,
                    "password": password
                },
                success: function (response) {
                    try {
                        let data = JSON.parse(response);
                        $("#msg").text(data.message).css("color", data.status === "success" ? "green" : "red");
                    } catch (error) {
                        console.error("Invalid JSON response", response);
                        $("#msg").text("An unexpected error occurred.").css("color", "red");
                    }
                },
                error: function () {
                    $("#msg").text("Failed to register. Please try again later.").css("color", "red");
                }
            });
        });
    </script>
</body>
</html>

<?php
require_once "footer.php";
?>