
<?php
require_once "../../includes/navbar.php";
// require_once "./improvedERP/includes/navbarfinal.php";
?>
<?php
// uttam :  important part to track the session (single user through out the website) but need to session start  by navbar 

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("location: ../login.php");
    exit;
}
$admin_name = isset($_SESSION['name']) ? $_SESSION['name'] : "Admin";
$admin_role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Data Filter</title>
    <!-- Fix the CDN links to ensure they load properly -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- Add a direct CSS file for additional styles -->
    <style>
        .filter-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .select2-container {
            width: 100% !important;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-4">
        <h2 class="mb-4 text-center">Scholarship Data Filter</h2>

        <div class="filter-section">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="scholarship_year" class="form-label">Scholarship Year</label>
                    <select class="form-select filter-select" id="scholarship_year" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select class="form-select filter-select" id="course" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="branch" class="form-label">Branch</label>
                    <select class="form-select filter-select" id="branch" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="year_of_study" class="form-label">Year of Study</label>
                    <select class="form-select filter-select" id="year_of_study" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="department" class="form-label">Department</label>
                    <select class="form-select filter-select" id="department" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="scholarship_type" class="form-label">Scholarship Type</label>
                    <select class="form-select filter-select" id="scholarship_type" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select filter-select" id="gender" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="state" class="form-label">State</label>
                    <select class="form-select filter-select" id="state" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="payment_status" class="form-label">Payment Status</label>
                    <select class="form-select filter-select" id="payment_status" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2 mb-3">
                    <label for="scholarship_name" class="form-label">Scholarship Name</label>
                    <select class="form-select filter-select" id="scholarship_name" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-primary" id="clearFilters">Clear Filters</button>
                    <button class="btn btn-success" id="downloadPdf">Download PDF</button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Scholarship Year</th>
                        <th>Application Number</th>
                        <th>Student Name</th>
                        <th>SIC No</th>
                        <th>Registration No</th>
                        <th>Course</th>
                        <th>Branch</th>
                        <th>Year of Study</th>
                        <th>Department</th>
                        <th>Scholarship Type</th>
                        <th>Gender</th>
                        <th>State</th>
                        <th>Caste</th>
                        <th>Application Type</th>
                        <th>Date of Application</th>
                        <th>Payment Status</th>
                        <th>Scholarship Name</th>
                        <th>Sanctioned Amount</th>
                    </tr>
                </thead>
                <tbody id="scholarshipData">
                    <!-- Data will be populated dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
<!-- Make sure the path to script.js is correct -->
<script src="script.js"></script>
</body>

</html>

<?php
require_once "../../includes/footer.php";
?>