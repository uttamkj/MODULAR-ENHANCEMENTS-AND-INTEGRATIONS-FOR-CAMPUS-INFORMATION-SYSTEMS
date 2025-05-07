<?php

// edited by neha
require_once "dbconnect.php";
require_once "../includes/navbar.php";

if (!isset($_SESSION['sic'])) {
    header("location: login.php");
    exit;
}

$course = isset($_GET['course']) ? $_GET['course'] : '';
$voteType = isset($_GET['voteType']) ? $_GET['voteType'] : '';

if (empty($course) || empty($voteType)) {
    echo "Invalid course or vote type.";
    exit;
}

// Fetch candidates for the specified course and vote type
$candidates = [];

if ($course === "All") {
    // Fetch candidates with their course from the student_data table for the "All" card
    $candidateQuery = "
        SELECT c.name, c.sic, s.course, c.vote_count 
        FROM candidates2 c
        INNER JOIN student_data s ON c.sic = s.sic
        WHERE c.vote_type = ?
        ORDER BY c.vote_count DESC";
    $stmt = $conn->prepare($candidateQuery);
    $stmt->bind_param("s", $voteType);
} else {
    // Fetch candidates for the branch-specific course and common candidates (course = 'All')
    $candidateQuery = "
        SELECT c.name, c.sic, s.course, c.vote_count 
        FROM candidates2 c
        INNER JOIN student_data s ON c.sic = s.sic
        WHERE c.vote_type = ? AND s.course = ?
        ORDER BY c.vote_count DESC";
    $stmt = $conn->prepare($candidateQuery);
    $stmt->bind_param("ss", $voteType, $course);
}

$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $candidates[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
            padding-top: 30px;
            height: auto;
            min-height: 100vh;
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
            font-size: 14px;
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

        .vote-message {
            font-size: 18px;
            margin-top: 20px;
        }

        h4.mb-4.text-center {
            font-family: Calibri, Candara, 'Gill Sans', 'Gill Sans MT', sans-serif;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        h5.text-center {
            font-family: Calibri, Candara, 'Gill Sans', 'Gill Sans MT', sans-serif;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        @media (max-width: 768px) {
            .table {
                font-size: 14px;
            }

            .table th,
            .table td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="background-container">
        <div class="container">
            <h4 class="mb-4 text-center">Election Results</h4>
            <h5 class="text-center">
                <i><?php echo htmlspecialchars($course . " - " . htmlspecialchars($voteType)); ?></i>
            </h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center table-striped" style="width: 100%; margin: auto;">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>SIC</th>
                            <?php if ($course === "All"): ?>
                                <th>Course</th>
                            <?php endif; ?>
                            <th>Total Votes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($candidates as $candidate): ?>
                            <tr>
                                <td class="align-middle"><?php echo htmlspecialchars($candidate['name']); ?></td>
                                <td class="align-middle"><?php echo htmlspecialchars($candidate['sic']); ?></td>
                                <?php if ($course === "All"): ?>
                                    <td class="align-middle"><?php echo htmlspecialchars($candidate['course']); ?></td>
                                    <!-- Display course -->
                                <?php endif; ?>
                                <td class="align-middle fw-bold"><?php echo $candidate['vote_count']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$conn->close();
?>

<?php include_once "footer.php"; ?>