<?php
require_once "dbconnect.php";
require_once "../includes/navbar.php";
//edited by neha
if (!isset($_SESSION['sic'])) {
    header("location: login.php");
    exit;
}

// Get course (branch) and vote type from URL
$course = isset($_GET['course']) ? trim($_GET['course']) : '';
$voteType = isset($_GET['voteType']) ? trim($_GET['voteType']) : '';

if (empty($course) || empty($voteType)) {
    $_SESSION['message'] = "Invalid access. Please select a vote type!";
    header("location: vote.php");
    exit;
}

if ($course === "All") {
    // Fetch candidates for "All" course and include their branch (course column) from student_data
    $sql = "SELECT c.name, c.sic, s.course, c.vote_type 
            FROM candidates2 c
            INNER JOIN student_data s ON c.sic = s.sic
            WHERE c.vote_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $voteType);
} else {
    // Fetch candidates for the specific branch
    $sql = "SELECT c.name, c.sic, s.course, c.vote_type 
            FROM candidates2 c
            INNER JOIN student_data s ON c.sic = s.sic
            WHERE c.course = ? AND c.vote_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $course, $voteType);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Page</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            min-width: 520px;
            overflow-x: auto;
            color: #1e293b;
        }

        .container-fluid {
            min-width: 520px;
        }

        .background-container {
            padding-top: 50px;
            min-height: 100vh;
            height: auto;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        .container {
            margin-top: 10px;
        }

        .table-responsive {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 0 auto;
            width: 70%;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            font-size: 13.8px;
            text-align: left;
        }

        .table thead tr th {
            background-color: #437fc7;
            color: #fff;
            padding: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .table th,
        .table td {
            padding: 8px 15px;
            border: none;
            border: 1px solid #ddd;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 4px 8px;
            color: #fff;
            border-radius: 50px;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .table .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
        }

        .table .btn-primary:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }

        .vote-message {
            font-size: 13px;
            margin-top: 5px;
        }

        .table th:last-child,
        .table td:last-child,
        .table th:first-child,
        .table td:first-child {
            width: 220px;
            text-align: center;
        }

        .vote-btn {
            background: linear-gradient(to right, rgb(114, 169, 232), rgb(35, 124, 179));
            color: white;
        }

        h4.mb-4.text-center {
            font-family: Calibri, Candara, 'Gill Sans', 'Gill Sans MT', sans-serif;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        @media (max-width: 768px) {
            .table {
                font-size: 13px;
            }

            .table th,
            .table td {
                padding: 8px;
            }

            .table .btn-primary {
                padding: 7px 14px;
            }
        }
    </style>
</head>

<body>
    <div class="background-container">
        <div class="container">
            <h4 class="mb-4 text-center"><?php echo htmlspecialchars($course) . " - " . htmlspecialchars($voteType); ?>
                Voting</h4>

            <div class="table-responsive">
                <table class="table table-bordered text-center table-striped" style="width: 100%; margin: auto;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>SIC</th>
                            <?php if ($course === "All"): ?>
                                <th>Course</th>
                            <?php endif; ?>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['sic']); ?></td>
                                <?php if ($course === "All"): ?>
                                    <td><?php echo htmlspecialchars($row['course']); ?></td>
                                <?php endif; ?>
                                <td>
                                    <button class="btn btn-primary vote-btn btn-sm px-4"
                                        data-sic="<?php echo htmlspecialchars($row['sic']); ?>"
                                        data-course="<?php echo htmlspecialchars($row['course']); ?>"
                                        data-vote-type="<?php echo htmlspecialchars($row['vote_type']); ?>">
                                        Vote
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <p id="vote-message" class="text-center vote-message"></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".vote-btn").click(function () {
                var button = $(this);
                var sic = button.data("sic");
                var course = button.data("course");
                var voteType = button.data("vote-type");

                // Clear any previous messages
                button.closest("td").find(".vote-message").remove();

                $.ajax({
                    url: "submit_vote.php",
                    type: "POST",
                    data: { sic: sic, course: course, voteType: voteType },
                    dataType: "json",
                    success: function (response) {
                        var message = $("<div class='vote-message'></div>");
                        if (response.status === "success") {
                            message.text(response.message).css("color", "green");
                            button.prop("disabled", true).text("Voted");
                        } else {
                            message.text(response.message).css("color", "red");
                        }
                        button.after(message);
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        var message = $("<div class='vote-message'></div>");
                        message.text("An error occurred. Try again.").css("color", "red");
                        button.after(message);
                    }
                });
            });
        });
    </script>

    <?php include_once "footer.php"; ?>
</body>
</html>