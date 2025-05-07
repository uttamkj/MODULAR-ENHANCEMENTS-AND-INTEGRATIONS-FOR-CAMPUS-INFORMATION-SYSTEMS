<?php
include_once "../includes/navbar.php";
require_once "dbconnect.php";

// Edited by Neha
if (!isset($_SESSION['sic']) || !isset($_SESSION['course'])) {
    header("location: login.php");
    exit;
}

$voter_course = $_SESSION['course'];

// Fetch distinct vote types for the voter's course and common vote types
$sql = "SELECT DISTINCT vote_type, status, registration_status, course 
FROM voting_status 
WHERE course = ? OR course = 'All'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $voter_course);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<style>
    html,
    body {
        min-width: 540px;
        overflow-x: auto;
    }

    .container-fluid {
        min-width: 540px;
    }

    .voting-card {
        background-size: cover;
        background-position: center;
        height: 300px;
        position: relative;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 10px;
        border-radius: 10px;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        cursor: pointer;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(8px);
    }

    .voting-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.25);
        z-index: 1;
    }

    .voting-card .card-body {
        position: relative;
        z-index: 2;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .voting-card:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .results-btn {
        position: absolute;
        bottom: 5px;
        right: 5px;
        z-index: 3;
        background-color: rgba(53, 58, 69, 0.75);
        color: white;
        border: none;
        padding: 5px 10px;
        font-size: 0.9rem;
        border-radius: 5px;
        text-decoration: none;
    }

    .results-btn:hover {
        background-color: #0056b3;
        color: white;
    }

    .voting-status {
        position: absolute;
        bottom: 10px;
        left: 10px;
        font-weight: bold;
    }

    /* .container {
        padding-bottom: 100px;
        min-height: 100vh;
    } */

    /* .apply-btn-container {
        position: absolute;
        top: 150px;
        left: 100px;
        z-index: 10;
    } */

    .apply-btn {
        background: linear-gradient(to right, rgb(114, 169, 232), rgb(35, 124, 179));
        color: white;
        border: none;
        padding: 8px 15px;
        font-size: 0.9rem;
        border-radius: 5px;
        text-decoration: none;
    }

    .apply-btn:hover {
        background-color: #0056b3;
        color: white;
    }

    h4.mb-4.text-center {
        font-family: Calibri, Candara, 'Gill Sans', sans-serif;
        font-weight: 500;
        letter-spacing: 0.1px;
        color: #2c3e50;
        padding: 15px;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        position: relative;
        margin-bottom: 25px !important;
    }

    .card-content {
        position: relative;
        height: 100%;
    }
</style>

<div class="container  mt-3">
    <h4 class="mb-4 text-center">User Dashboard</h4>
    <div class="apply-btn-container d-flex justify-content-center ">
        <a href="candidate_register.php" class="apply-btn ">Register now</a>
    </div>

    <div class="row justify-content-start" style="margin-top: 50px">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-lg-4 col-md-6 mb-3 d-flex flex-column align-items-center">
                <div class="card voting-card p-2 text-white" style="
                        background-image: url('images/voting_background.jpg'); 
                        background-size: cover; background-position: center;
                        width: 100%; max-width: 300px; height: 180px; border-radius: 10px; position: relative;"
                    data-url="<?php echo ($row['registration_status'] == 'off' && $row['status'] == 'on') ? 'vote_page.php?course=' . $row['course'] . '&voteType=' . $row['vote_type'] : '#'; ?>">
                    <div class="card-body d-flex flex-column text-center">
                        <div>
                            <h6 class="card-title" style="margin-bottom: 0.3rem; font-size: 18px;">
                                <?php echo ($row['course'] === 'All') ? 'Common Voting' : htmlspecialchars($voter_course . ' Voting'); ?>
                            </h6>
                            <p class="mb-1" style="font-size: 15px;">Vote Type:
                                <?php echo htmlspecialchars($row['vote_type']); ?></p>
                        </div>
                        <?php if (!($row['registration_status'] == 'on') && !($row['registration_status'] == 'off' && $row['status'] == 'on')): ?>
                            <a href="results_graph.php?course=<?php echo urlencode($row['course']); ?>&voteType=<?php echo urlencode($row['vote_type']); ?>"
                                class="results-btn" target="_blank">
                                Results
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Display appropriate message based on registration and voting status -->
                <?php if ($row['registration_status'] == 'on'): ?>
                    <p class="mt-2 px-3 py-1 text-center rounded bg-info text-white fw-bold" style="font-size: 0.8rem;">
                        Registration is Ongoing
                    </p>
                <?php elseif ($row['registration_status'] == 'off' && $row['status'] == 'on'): ?>
                    <p class="mt-2 px-3 py-1 text-center rounded bg-success text-white fw-bold" style="font-size: 0.8rem;">
                        Voting is Ongoing
                    </p>
                <?php else: ?>
                    <p class="mt-2 px-3 py-1 text-center rounded bg-danger text-white fw-bold" style="font-size: 0.8rem;">
                        Voting is Closed
                    </p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".voting-card").click(function (event) {
            // Prevent redirection if registration is open
            if ($(this).find(".bg-info").length > 0) {
                event.preventDefault();
                return;
            }

            // Redirect only if the card has a valid URL
            if (!$(event.target).closest(".results-btn").length && $(this).data("url") !== "#") {
                window.location.href = $(this).data("url");
            }
        });
    });

    // Replace history state when reaching home page
    window.history.replaceState(null, "", window.location.href);

    // Detect back button press and prevent going back
    window.onpopstate = function (event) {
        window.history.pushState(null, "", window.location.href);
    };
</script>