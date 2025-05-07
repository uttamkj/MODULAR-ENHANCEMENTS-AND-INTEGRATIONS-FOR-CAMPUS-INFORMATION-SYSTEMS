<?php
include_once "../includes/navbar.php";

require_once "dbconnect.php";

if (!isset($_SESSION['sic'])) {
    header("location:login.php");
    exit;
}

// Handle form submission for course selection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = isset($_POST['course']) ? trim($_POST['course']) : '';
    $_SESSION['course'] = $course;
    header("Location: admin_dashboard.php");
    exit;
}

// Retrieve stored values from session (if any)
$course = $_SESSION['course'] ?? '';

if ($course === "All") {
    $sql = "SELECT vote_type, status, registration_status FROM voting_status WHERE course = 'All' ORDER BY id ASC";
} else if (!empty($course)) {
    $sql = "SELECT vote_type, status, registration_status FROM voting_status WHERE course = ? OR course = 'All' ORDER BY id ASC";
} else {
    $sql = "";
}

if (!empty($sql)) {
    $stmt = $conn->prepare($sql);
    if ($course !== "All" && !empty($course)) {
        $stmt->bind_param("s", $course);
    }
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<style>
    html,
    body {
        min-width: 480px;
        overflow-x: auto;
    }

    .container-fluid {
        min-width: 480;
    }

    .custom-shadow {
        box-shadow: 0 0 16px rgba(0, 0, 0, 0.15);
    }

    
    .voting-card {
        background-size: cover;
        background-position: center;
        height: 200px;
        position: relative;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 10px;
        border-radius: 10px;
        transition: transform 0.2s ease-in-out;
        cursor: pointer;
        overflow: hidden;
    }

    .voting-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .voting-card .card-body {
        position: relative;
        z-index: 2;
    }

    .voting-card:hover {
        transform: scale(1.03);
    }

    .voting-toggle-btn {
        position: absolute;
        bottom: 5px;
        right: 8px;
        padding: 3px 10px;
        font-size: 14px;
        
    }

    .add-btn {
        position: absolute;
        bottom: 5px;
        left: 8px;
        padding: 3px 10px;
        font-size: 14px;
    }

    .delete-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(201, 63, 63);
        border: 2px solid rgb(201, 63, 63);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        padding: 0px;
        z-index: 3;
    }

    .card-title {
        width: 50%;
        position: absolute;
        top: 10px;
        font-size: 15px;
    }

    .row {
        margin-left: 0;
        margin-right: 0;
    }

    .sidebar {
        width: 280px;
        padding: 20px;
        background-color: #f8f9fa;
        border-right: 1px solid #ddd;
        min-height: 100vh;
    }
    

    .main-content {
        flex: 1;
        padding: 20px;
    }


    .btn-ok,
    .btn-card {
        background: linear-gradient(to right, rgb(114, 169, 232), rgb(35, 124, 179));
        color: white;
        font-size: 14px;
    }

    .input-group-text, .form-select {
        font-size: 0.98rem;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar for Course Selection -->
        <div class="sidebar">
            <h4 class="mb-4 text-center">Admin Dashboard</h4>
            <form method="POST" onsubmit="return validateForm()">
                <div class="input-group mb-2">
                    <label class="input-group-text" for="course">Course</label>
                    <select class="form-select" name="course" id="course" required>
                        <option value="">--Choose--</option>
                        <option value="MCA" <?php echo ($course === "MCA") ? "selected" : ""; ?>>MCA</option>
                        <option value="BTech" <?php echo ($course === "BTech") ? "selected" : ""; ?>>BTech</option>
                        <option value="MTech" <?php echo ($course === "MTech") ? "selected" : ""; ?>>MTech</option>
                        <option value="MSc" <?php echo ($course === "MSc") ? "selected" : ""; ?>>MSc</option>
                        <option value="All" <?php echo ($course === "All") ? "selected" : ""; ?>>All</option>
                    </select>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-ok px-3 py-1">OK</button>
                </div>
            </form>
        </div>

        <!-- Main Content for Cards -->
        <div class="main-content">
            <!-- Add New Card Button -->
            <div class="text-center mb-3 mt-3">
                <button class="btn btn-ok btn-addtype btn-sm" id="addNewCardBtn">Add New Type</button>
            </div>

            <!-- Display Cards -->
            <div class="row justify-content-start">
                <?php if (!empty($course) && isset($result)): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col-lg-4 col-md-6 mb-4 d-flex flex-column align-items-center">
                            <div class="position-relative" style="
                                width: 100%;
                                max-width: 285px;
                                border-radius: 12px;
                                background: rgba(255, 255, 255, 0.85);
                                backdrop-filter: blur(8px);
                                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                                border: 1px solid rgba(255, 255, 255, 0.2);">

                                <!-- Image card with gradient overlay -->
                                <div class="card voting-card p-2 text-white" style="
                                    background-image: url('images/voting_background.jpg'); 
                                    width: 100%;
                                    height: 165px;
                                    border-radius: 12px 12px 0 0;
                                    border: none;" data-url="manage_candidate.php?course=<?php echo urlencode($course); ?>&voteType=<?php echo urlencode($row['vote_type']); ?>">

                                    <div
                                        class="card-body d-flex flex-column justify-content-center text-center position-relative">
                                        <button class="delete-btn position-absolute"
                                            style="top: 10px; right: 10px; background: rgba(0,0,0,0.2); border: none; width: 28px; height: 28px; border-radius: 50%; color: white;"
                                            data-course="<?php echo htmlspecialchars($course); ?>"
                                            data-vote-type="<?php echo htmlspecialchars($row['vote_type']); ?>">
                                            <i class="fas fa-times"></i>
                                        </button>

                                        <div class="card-title">
                                            <h6 style="margin-bottom: 0; font-size: 18px; font-weight: 600">
                                                <?php echo htmlspecialchars($course); ?> Voting</h6>
                                            <p style="opacity: 0.9; font-size: 14px">Vote Type:
                                                <?php echo htmlspecialchars($row['vote_type']); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons container -->
                                <div class="d-flex flex-column p-3">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span style="font-size: 12px; color: #6c757d; font-weight: 500">Registration
                                            status</span>
                                        <span style="font-size: 12px; color: #6c757d; font-weight: 500">Voting status</span>
                                    </div>

                                    <div class="">
                                        <button
                                            class="btn btn-sm btn-registration-toggle <?php echo ($row['registration_status'] == 'on') ? 'btn-success' : 'btn-danger'; ?>"
                                            data-course="<?php echo htmlspecialchars($course); ?>"
                                            data-vote-type="<?php echo htmlspecialchars($row['vote_type']); ?>">
                                            <?php echo strtoupper($row['registration_status']); ?>
                                        </button>
                                        <button
                                            class="btn btn-sm mb-2 <?php echo ($row['status'] == 'on') ? 'btn-success' : 'btn-danger'; ?> voting-toggle-btn"
                                            data-course="<?php echo htmlspecialchars($course); ?>"
                                            data-vote-type="<?php echo htmlspecialchars($row['vote_type']); ?>">
                                            <?php echo strtoupper($row['status']); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php elseif (empty($course)): ?>
                    <div class="col-12 text-center">
                        <p>Please select a course to view voting cards.</p>
                    </div>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>No voting cards found for the selected course.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding New Card -->
<div class="modal fade" id="addNewCardModal" tabindex="-1" aria-labelledby="addNewCardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewCardModalLabel">Add New Voting Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNewCardForm">
                    <div class="mb-3">
                        <label for="voteType" class="form-label">Vote Type</label>
                        <input type="text" class="form-control" id="voteType" name="voteType" required>
                    </div>
                    <button type="submit" class="btn btn-card">Add Card</button>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle card click to navigate
        $(".voting-card").click(function (event) {
            if (!$(event.target).closest(".voting-toggle-btn, .delete-btn").length) {
                window.location.href = $(this).data("url");
            }
        });

        // Prevent button click from propagating to card
        $(".voting-toggle-btn, .delete-btn").click(function (event) {
            event.stopPropagation();
        });

        // Handle toggle voting status
        $(".voting-toggle-btn").click(function () {
            var button = $(this);
            var course = button.data("course");
            var voteType = button.data("vote-type");

            var currentStatus = button.text().trim().toLowerCase();
            var newStatus = currentStatus === "on" ? "off" : "on";

            button.text(newStatus.toUpperCase());
            button.removeClass("btn-success btn-danger")
                .addClass(newStatus === "on" ? "btn-success" : "btn-danger");

            $.ajax({
                url: "toggle_voting_ajax.php",
                type: "POST",
                data: { course: course, voteType: voteType },
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        button.text(response.newStatus.toUpperCase());
                        button.removeClass("btn-success btn-danger")
                            .addClass(response.newStatus === "on" ? "btn-success" : "btn-danger");
                    } else {
                        console.error("Server Error:", response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        });

        // Handle delete card
        $(".delete-btn").click(function () {
            var button = $(this);
            var course = button.data("course");
            var voteType = button.data("vote-type");

            if (confirm("Are you sure you want to delete this card?")) {
                $.ajax({
                    url: "delete_voting_card.php",
                    type: "POST",
                    data: { course: course, voteType: voteType },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            // Remove the specific card from the DOM
                            button.closest(".col-lg-4").remove();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        alert("An error occurred while deleting the card. Please try again.");
                    }
                });
            }
        });

        // Function to reload cards dynamically
        function reloadCards() {
            $.ajax({
                url: "admin_dashboard.php",
                type: "GET",
                data: { course: "<?php echo htmlspecialchars($course); ?>" },
                success: function (response) {
                    // Replace the card container with the updated content
                    $(".main-content .row").html($(response).find(".main-content .row").html());
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    alert("Failed to reload cards. Please refresh the page.");
                }
            });
        }

        // Show modal for adding new card
        $("#addNewCardBtn").click(function () {
            $("#addNewCardModal").modal("show");
        });

        // Handle form submission for adding new card
        $("#addNewCardForm").submit(function (e) {
            e.preventDefault();

            var voteType = $("#voteType").val().trim();
            var course = "<?php echo htmlspecialchars($course); ?>";

            $.ajax({
                url: "add_voting_card.php",
                type: "POST",
                data: { course: course, voteType: voteType },
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    alert("AJAX request failed. Check console.");
                }
            });
        });

        // Handle registration toggle button click
        $(".btn-registration-toggle").click(function () {
            var button = $(this);
            var course = button.data("course");
            var voteType = button.data("vote-type");

            $.ajax({
                url: "toggle_registration_ajax.php",
                type: "POST",
                data: { course: course, voteType: voteType },
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        button.text(response.newStatus.toUpperCase());
                        button.removeClass("btn-success btn-danger off")
                            .addClass(response.newStatus === "on" ? "btn-success" : "btn-danger off");
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    alert("An error occurred while toggling the registration status.");
                }
            });
        });
    });


    function validateForm() {
        var course = document.getElementById("course").value;
        if (course === "") {
            alert("Please select Course before proceeding.");
            return false;
        }
        return true;
    }
</script>

<?php include_once "footer.php"; ?>