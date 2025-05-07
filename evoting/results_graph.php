<?php
require_once "dbconnect.php";

$course = isset($_GET['course']) ? trim($_GET['course']) : null;
$voteType = isset($_GET['voteType']) ? trim($_GET['voteType']) : null;

if (empty($course) || empty($voteType)) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>No Candidates</title>
        <style>
            body,
            html {
                margin: 0;
                padding: 0;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: Arial, sans-serif;
            }

            .no-candidates {
                text-align: center;
                color: #555;
            }

            .no-candidates h5 {
                font-size: 1.5rem;
                font-weight: bold;
                color: #333;
            }
        </style>
    </head>

    <body>
        <div class="no-candidates">
            <h5>Invalid request. Missing course or vote type.</h5>
        </div>
    </body>

    </html>
    <?php
    exit;
}

// Fetch candidates for the given course and vote type
$sql = "SELECT name, vote_count FROM candidates2 WHERE course = ? AND vote_type = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $course, $voteType);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>No Candidates</title>
        <style>
            body,
            html {
                margin: 0;
                padding: 0;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: Arial, sans-serif;
            }

            .no-candidates {
                text-align: center;
                color: #555;
            }

            .no-candidates h4 {
                font-size: 1.3rem;
                font-weight: bold;
                color: #333;
            }
        </style>
    </head>

    <body>
        <div class="no-candidates">
            <h4>No candidates available.</h4>
        </div>
    </body>

    </html>
    <?php
    exit;
}

// Prepare data for the bar graph
$candidates = [];
$votes = [];
while ($row = $result->fetch_assoc()) {
    $candidates[] = $row['name'];
    $votes[] = $row['vote_count'];
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Results</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .heading3 {
            font-family: Calibri, Candara, 'Gill Sans', 'Gill Sans MT', sans-serif;
            font-weight: 500;
            letter-spacing: 0.5px;
            font-size: 24px;
        }

        #resultsChart {
            max-width: 600px;
            max-height: 400px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="heading3">Vote Results for <?php echo htmlspecialchars($course . " - " . $voteType); ?></h3>
        <canvas id="resultsChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('resultsChart').getContext('2d');
        const resultsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($candidates); ?>,
                datasets: [{
                    label: 'Votes',
                    data: <?php echo json_encode($votes); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: Math.max(...<?php echo json_encode($votes); ?>) + 1, // Dynamically set max value
                        ticks: {
                            stepSize: 1, 
                            callback: function (value) {
                                return Number.isInteger(value) ? value : ''; // Show only whole numbers
                            }
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)' 
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)' 
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>