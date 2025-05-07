<?php
// edited by Neha
include_once "../includes/navbar.php";
if (!isset($_SESSION['sic'])) {
    header("location:login.php");
    exit;
}

// Retrieve course and voteType from URL
$course = isset($_GET['course']) ? $_GET['course'] : '';
$voteType = isset($_GET['voteType']) ? $_GET['voteType'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <script src="./bootstrap/jquery-3.7.1.js"></script>
    <style>
        .error-message {
            font-size: 0.855rem;
            color: red;
        }

        html,
        body {
            min-width: 540px;
            overflow-x: auto;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        .container-fluid {
            min-width: 520px;
        }

        .card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-cand {
            background: linear-gradient(to right, rgb(114, 169, 232), rgb(35, 124, 179));
            color: white;
            font-size: 15px;
        }

        .card-img-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        h4.mb-3.text-center {
            font-family: Calibri, Candara, 'Gill Sans', 'Gill Sans MT', sans-serif;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <!-- Display course and voteType at the top -->
        <div class="text-center mb-3">
            <h4 class="mb-3 text-center"><?php echo htmlspecialchars($course . " - " . $voteType); ?></h4>
        </div>
        <div class="card mx-auto mb-5 mt-3" style="width: 400px;">
            <div style="position: relative;">
                <img src="images/voting_background.jpg" class="card-img-top" height="220px" alt="img">
                <div class="card-img-overlay"></div>
            </div>
            <div class="card-body">
                <form id="adminForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="error-message" id="nameError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="sic" class="form-label">SIC Number</label>
                        <input type="text" class="form-control" id="sic" name="sic">
                        <div class="error-message" id="sicError"></div>
                    </div>
                    <input type="hidden" name="course" value="<?php echo htmlspecialchars($course); ?>">
                    <input type="hidden" name="voteType" value="<?php echo htmlspecialchars($voteType); ?>">
                    <div class="text-center">
                        <button type="submit" class="btn btn-cand px-4">Add Candidate</button>
                    </div>
                    <p id="msg" class="mt-3 text-center"></p>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#adminForm").submit(function (e) {
            e.preventDefault();
            $(".error-message").text("");
            let name = $("#name").val().trim();
            let sic = $("#sic").val().trim();
            let course = $("input[name='course']").val();
            let voteType = $("input[name='voteType']").val();
            let isValid = true;

            if (name.length < 4) {
                $("#nameError").text("Please give full name");
                isValid = false;
            }

            if (!/^\d{2}[A-Za-z]{4}\d{2}$/.test(sic)) {
                $("#sicError").text("SIC must follow the format: (e.g., 12ABCD34).");
                isValid = false;
            }

            if (!isValid) return;

            $.ajax({
                url: "form.php",
                method: "POST",
                data: { name: name, sic: sic, course: course, voteType: voteType },
                dataType: "json",
                success: function (response) {
                    console.log("Server Response:", response);

                    if (response.status === "success") {
                        $("#msg").text(response.message).css("color", "green");
                        $("#adminForm")[0].reset();
                    } else {
                        $("#msg").text(response.message).css("color", "red");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", xhr.responseText);
                    $("#msg").text("An unexpected error occurred. Please check the console.").css("color", "red");
                }
            });
        });

        // Ensure the course and voteType are passed correctly
        console.log("Course:", "<?php echo htmlspecialchars($course); ?>");
        console.log("Vote Type:", "<?php echo htmlspecialchars($voteType); ?>");
    </script>
</body>

</html>

<?php
require_once "footer.php";
?>