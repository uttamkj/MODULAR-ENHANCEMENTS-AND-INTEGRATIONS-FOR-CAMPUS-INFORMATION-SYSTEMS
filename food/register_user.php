<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "23mmci74");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize inputs
    $name = $conn->real_escape_string($_POST["name"]);
    $sic_no = $conn->real_escape_string($_POST["sic_no"]);
    $category = $conn->real_escape_string($_POST["category"]);
    $caution_deposit = $conn->real_escape_string($_POST["caution_deposit"]);
    $regd_type = $conn->real_escape_string($_POST["regd_type"]);
    $from_date = $conn->real_escape_string($_POST["from_date"]);
    $status = $regd_type == "Registration" ? "Completed" : "Pending";

    // Insert query
    $sql = "INSERT INTO food_users (name, sic_no, category, caution_deposit, regd_type, from_date, status)
            VALUES ('$name', '$sic_no', '$category', '$caution_deposit', '$regd_type', '$from_date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success text-center">New user registered successfully!</div>';
    } else {
        echo '<div class="alert alert-danger text-center">Error: ' . $conn->error . '</div>';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>User Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">SIC No</label>
                                <input type="text" name="sic_no" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select" required>
                                    <option value="Resident">Resident</option>
                                    <option value="Day Scholar">Day Scholar</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Caution Deposit</label>
                                <select name="caution_deposit" class="form-select" required>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Registration Type</label>
                                <select name="regd_type" class="form-select" required>
                                    <option value="Registration">Registration</option>
                                    <option value="One-Day">One-Day</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">From Date</label>
                                <input type="date" name="from_date" class="form-control" required>
                            </div>

                            <div class="text-center">
                                <input type="submit" value="Register" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
