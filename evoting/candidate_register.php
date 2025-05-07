<?php
// edited by Neha
include_once "../includes/navbar.php";
if (!isset($_SESSION['sic'])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Registration</title>
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
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="card mx-auto mb-5 mt-5" style="width: 400px;">
            <div style="position: relative;">
                <img src="images/voting_background.jpg" class="card-img-top" height="220px" alt="img">
                <div class="card-img-overlay"></div>
            </div>
            <div class="card-body">
                <form id="candidateForm">
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
                    <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <select class="form-select" id="course" name="course">
                            <option value="">--Select--</option>
                            <option value="MCA">MCA</option>
                            <option value="BTech">BTech</option>
                            <option value="MTech">MTech</option>
                            <option value="MSc">MSc</option>
                        </select>
                        <div class="error-message" id="courseError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="voteType" class="form-label">Vote Type</label>
                        <select class="form-select" id="voteType" name="voteType">
                            <option value="">--Select--</option>
                        </select>
                        <div class="error-message" id="voteTypeError"></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-cand px-4">Register</button>
                    </div>
                    <p id="msg" class="mt-3 text-center"></p>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Fetch vote types dynamically based on the user's course
            $("#course").change(function () {
                let course = $(this).val();
                $("#voteType").html('<option value="">--Select--</option>'); // Reset voteType dropdown

                if (course === "") return; // If no course is selected, do nothing

                console.log("Selected course:", course);

                $.ajax({
                    url: "fetch_vote_types.php",
                    method: "POST",
                    data: { course: course },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            response.voteTypes.forEach(function (voteType) {
                                $("#voteType").append(`<option value="${voteType}">${voteType}</option>`);
                            });
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        alert("An error occurred while fetching vote types.");
                    }
                });
            });

            // Handle form submission
            $("#candidateForm").submit(function (e) {
                e.preventDefault();
                $(".error-message").text("");
                let name = $("#name").val().trim();
                let sic = $("#sic").val().trim();
                let course = $("#course").val();
                let voteType = $("#voteType").val();
                let isValid = true;

                if (name.length < 4) {
                    $("#nameError").text("Please provide the full name.");
                    isValid = false;
                }

                if (!/^\d{2}[A-Za-z]{4}\d{2}$/.test(sic)) {
                    $("#sicError").text("SIC must follow the format: (e.g., 12ABCD34).");
                    isValid = false;
                }

                if (course === "") {
                    $("#courseError").text("Please select a course.");
                    isValid = false;
                }

                if (voteType === "") {
                    $("#voteTypeError").text("Please select a vote type.");
                    isValid = false;
                }

                if (!isValid) return;

                $.ajax({
                    url: "form.php",
                    method: "POST",
                    data: { name: name, sic: sic, course: course, voteType: voteType },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            $("#msg").text(response.message).css("color", "green");
                            $("#candidateForm")[0].reset();
                        } else {
                            $("#msg").text(response.message).css("color", "red");
                        }
                    },
                    error: function (xhr, status, error) {
                        $("#msg").text("An unexpected error occurred.").css("color", "red");
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
require_once "footer.php";
?>