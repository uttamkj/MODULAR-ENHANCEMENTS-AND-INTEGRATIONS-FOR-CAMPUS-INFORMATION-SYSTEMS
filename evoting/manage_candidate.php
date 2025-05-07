<?php

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
    $candidateQuery = "
        SELECT c.name, c.sic, s.course, c.vote_type 
        FROM candidates2 c
        INNER JOIN student_data s ON c.sic = s.sic
        WHERE c.vote_type = ?
        ORDER BY c.name ASC";
    $stmt = $conn->prepare($candidateQuery);
    $stmt->bind_param("s", $voteType);
} else {
    $candidateQuery = "
        SELECT c.name, c.sic, s.course, c.vote_type 
        FROM candidates2 c
        INNER JOIN student_data s ON c.sic = s.sic
        WHERE c.vote_type = ? AND s.course = ?
        ORDER BY c.name ASC";
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
    <title>Manage Candidates</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        html,
        body {
            min-width: 520px;
            overflow-x: auto;
            color: #1e293b;
        }

        .background-container {
            padding: 20px 0;
            height: auto;
            min-height: 100vh;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        .container {
            margin-top: 5px;
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
            padding: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }


        .table th,
        .table td {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border: 1px solid #ddd;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .delete-btn {
            background-color: transparent;
            border: none;
            color: #dc3545;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .delete-btn:hover {
            color: #c82333;
        }

        .top-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
            color: white;
        }

        .top-buttons .btn {
            padding: 7px 10px;
            font-size: 13px;
            border-radius: 20px;
            text-transform: uppercase;
        }

        .btn-add {
            background-color: #28a745;
            color: white;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        .btn-status {
            background-color: #437fc7;
            color: white;
        }

        .btn-status:hover {
            background-color: #0056b3;
        }

        .action-column {
            width: 50px;
        }

        h4.mb-3.text-center {
            font-family: Calibri, Candara, 'Gill Sans', sans-serif;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: #2c3e50;
            padding: 15px;
            border-left: 3px solid #3498db;
            border-right: 3px solid #3498db;
            background-color: rgb(252, 248, 248);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: relative;
            margin-bottom: 25px !important;
        }

        h5.text-center {
            font-family: Calibri, Candara, 'Gill Sans', 'Gill Sans MT', sans-serif;
            font-weight: 500;
            letter-spacing: 0.2px;
        }
    </style>
</head>

<body>
    <div class="background-container">
        <div class="container">
            <h4 class="mb-3 text-center">Manage Candidates</h4>
            <div class="top-buttons">
                <a href="addcandidate.php?course=<?php echo urlencode($course); ?>&voteType=<?php echo urlencode($voteType); ?>"
                    class="btn btn-add">Add Candidate</a>
                <a href="result.php?course=<?php echo urlencode($course); ?>&voteType=<?php echo urlencode($voteType); ?>"
                    class="btn btn-status">Election Status</a>
            </div>
            <h5 class="text-center">
                <?php echo htmlspecialchars($course . " - " . htmlspecialchars($voteType)); ?>
            </h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center table-striped" style="width: 100%; margin: auto;">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>SIC</th>
                            <th class="action-column"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($candidates as $candidate): ?>
                            <tr>
                                <td class="align-middle"><?php echo htmlspecialchars($candidate['name']); ?></td>
                                <td class="align-middle"><?php echo htmlspecialchars($candidate['sic']); ?></td>
                                <td class="align-middle">
                                    <button class="delete-btn"
                                        onclick="deleteCandidate('<?php echo $candidate['sic']; ?>')">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        crossorigin="anonymous"></script>
    <script>
        function deleteCandidate(sic) {
            if (confirm("Are you sure you want to delete this candidate?")) {
                fetch("delete_candidate.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: new URLSearchParams({
                        delete_sic: sic,
                        voteType: '<?php echo $voteType; ?>'
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            alert(data.message);
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An error occurred while deleting the candidate.");
                    });
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>