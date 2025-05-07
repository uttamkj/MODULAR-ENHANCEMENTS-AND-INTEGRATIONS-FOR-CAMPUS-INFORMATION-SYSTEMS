<?php
// require_once "../includes/navbarfinal.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        /* Contact Box */
        .contact-box {
            display: flex;
            width: 800px;
            height: 600px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Left Box */
        .left-box {
            background-color: rgba(121, 228, 236, 0.85);
            color: white;
            flex: 1;
            padding: 40px;
        }

        .left-box h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        /* Right Box (Form) */
        .right-box {
            flex: 1;
            padding: 40px;
        }

        .right-box h3 {
            font-size: 22px;
            font-weight: 500;
            margin: 10px 20px;
        }

        .right-box input,
        .right-box textarea {
            width: 100%;
            padding: 6px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .right-box textarea {
            height: 150px;
        }

        /* Submit Button */
        .right-box button {
            margin-top: 20px;
            background-color: rgba(121, 228, 236, 0.85);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
        }

        .right-box button:hover {
            background-color: #007bb5;
        }

        .contact-card {
            background: linear-gradient(135deg, rgba(224, 231, 231, 0.78), rgba(0, 206, 209, 0.78));
            border-radius: 10px;
            margin-top: 20px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        /* Heading Styling */
        .contact-card h4 {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
        }

        /* Underline Style */
        .underline {
            width: 158px;
            height: 2px;
            background-color: rgb(10, 10, 10);
            margin: 5px 0 15px;
        }

        .underline-recruit{
            width: 205px;
            height: 2px;
            background-color: rgb(10, 10, 10);
            margin: 5px 0 15px;
        }

        .contact-info i {
            margin-right: 10px;
        }

        .error{
            color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-5 ">
        <div class="contact-box mx-auto">
            <!-- Left Side -->
            <div class="left-box">
                <h2>Contact Us</h2>
                <div class="contact-card text-dark">
                    <!-- Heading with Underline -->
                    <h4>STUDY AT SILICON</h4>
                    <div class="underline"></div>

                    <!-- Subtext -->
                    <p>Reach out to us for any admissions related queries.</p>

                    <!-- Contact Information -->
                    <div class="contact-info">
                        <!-- Email -->
                        <div class="email">
                            <i class="fa fa-envelope"></i>
                            <span>info@silicon.ac.in</span>
                        </div>
                        <!-- Phone -->
                        <div class="phone">
                            <i class="fa fa-phone"></i>
                            <span>+91 9937289499 / 7381499499</span>
                        </div>
                    </div>
                </div>
                <div class="contact-card text-dark">
                    <h4>RECRUIT FROM SILICON</h4>
                    <div class="underline-recruit"></div>

                    <p>Write to us or give us a call to hire the best engineering talent.</p>

                    <div class="contact-info">
                        <div class="email">
                            <i class="fa fa-envelope"></i>
                            <span>pcell@silicon.ac.in</span>
                        </div>
                        <div class="phone">
                            <i class="fa fa-phone"></i>
                            <span>+91 9937289499 (Ext 351 / 352 / 354)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side (Form) -->
            <div class="right-box">
                <h3>Contact</h3><br>
                <form method="" action="" onsubmit="validate(event)">
                    <input type="text" placeholder="Name" id="name"><br>
                    <label class="error" id="nameError"></label>
                    <input type="email" placeholder="Email" id="email"><br>
                    <label class="error" id="emailError"></label>
                    <input type="text" placeholder="Phone" id="mobile"><br>
                    <label class="error" id="mobileError"></label>
                    <textarea placeholder="Message" id="message"></textarea>
                    <label class="error" id="messageError"></label><br>
                    <button type="submit"><b>SUBMIT</b></button>
                </form>
            </div>
        </div>
    </div>
    <script src="contact_validation.js"></script>
    <?php
    require_once "../includes/footer.php";
    ?>