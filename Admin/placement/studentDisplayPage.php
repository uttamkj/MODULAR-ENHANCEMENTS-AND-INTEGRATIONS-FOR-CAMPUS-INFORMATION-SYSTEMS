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
    <title>Student Data Filter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <div class="container-fluid mt-4">
        <h2 class="mb-4 text-center">STUDENT DATA FILTER FOR PLACEMENT</h2>
        <div class="filter-section">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select class="form-select filter-select" id="course" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="branch" class="form-label">Branch</label>
                    <select class="form-select filter-select" id="branch" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="yearOfPassing" class="form-label">Year of Passing</label>
                    <select class="form-select filter-select" id="yearOfPassing" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="batchYear" class="form-label">Batch Year</label>
                    <select class="form-select filter-select" id="batchYear" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="company" class="form-label">Company</label>
                    <select class="form-select filter-select" id="company" multiple>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col text-center">
                <button class="btn btn-primary me-2" id="clearFilters">Clear Filters</button>
                <button class="btn btn-success" id="downloadPdf">Download PDF</button>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="studentTable">
                <thead class="table-dark">
                    <tr>
                        <th>Sl. No</th>
                        <th>SIC No</th>
                        <th>Branch</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Placed</th>
                        <th>Company</th>
                        <th>Package (LPA)</th>
                        <th>Job Domain</th>
                        <th>Batch Year</th>
                        <th>Year Of Passing</th>
                    </tr>
                </thead>
                <tbody id="studentData">
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
    
    <script src="script.js"></script>
</body>
</html>

<?php
require_once "../../includes/footer.php";
// require_once "./improvedERP/includes/footer.php";
?>