
<?php
require_once "../includes/navbar.php";
?>

<?php
// uttam : important part to track the session (single user through out the website) but need to session start  by navbar 

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("location: ../login.php");
    exit;
}
$admin_name = isset($_SESSION['name']) ? $_SESSION['name'] : "Admin";
$admin_role = $_SESSION['role'];
?>


<?php
require_once 'functions.php';

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$student = getStudentById($id);

// If student not found, redirect to index
if (!$student) {
    header("Location: index.php");
    exit();
}

// Process form submission
$success = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (updateStudent($_POST)) {
        $success = true;
        $student = getStudentById($id); // Refresh student data
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student - Silicon Student Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Update Student Information</h2>
        
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Students List
            </a>
        </div>
        
        <?php if($success): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Student information updated successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if($error): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error updating student information. Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title mb-0">Edit Student: <?php echo htmlspecialchars($student['name']); ?></h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="sl_no" value="<?php echo htmlspecialchars($student['sl_no']); ?>">
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="sic_no" class="form-label">SIC No</label>
                            <input type="text" class="form-control" id="sic_no" name="sic_no" value="<?php echo htmlspecialchars($student['sic_no']); ?>" required>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="university_regd_no" class="form-label">University Regd No</label>
                            <input type="text" class="form-control" id="university_regd_no" name="university_regd_no" value="<?php echo htmlspecialchars($student['university_regd_no']); ?>">
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input type="text" class="form-control" id="course" name="course" value="<?php echo htmlspecialchars($student['course']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="original_branch" class="form-label">Original Branch</label>
                            <input type="text" class="form-control" id="original_branch" name="original_branch" value="<?php echo htmlspecialchars($student['original_branch']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="branch_change" class="form-label">Branch Change</label>
                            <select class="form-select" id="branch_change" name="branch_change">
                                <option value="Y" <?php echo ($student['branch_change'] == 'Y') ? 'selected' : ''; ?>>Yes</option>
                                <option value="N" <?php echo ($student['branch_change'] == 'N') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="branch" class="form-label">Current Branch</label>
                            <input type="text" class="form-control" id="branch" name="branch" value="<?php echo htmlspecialchars($student['branch']); ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="Male" <?php echo ($student['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ($student['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                <option value="Other" <?php echo ($student['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="lateral" class="form-label">Lateral</label>
                            <select class="form-select" id="lateral" name="lateral">
                                <option value="Y" <?php echo ($student['lateral'] == 'Y') ? 'selected' : ''; ?>>Yes</option>
                                <option value="N" <?php echo ($student['lateral'] == 'N') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="roll_no" class="form-label">Roll No</label>
                            <input type="text" class="form-control" id="roll_no" name="roll_no" value="<?php echo htmlspecialchars($student['roll_no']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="caste" class="form-label">Caste</label>
                            <input type="text" class="form-control" id="caste" name="caste" value="<?php echo htmlspecialchars($student['caste']); ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="religion" class="form-label">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion" value="<?php echo htmlspecialchars($student['religion']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo htmlspecialchars($student['nationality']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($student['category']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="moa" class="form-label">MOA</label>
                            <input type="text" class="form-control" id="moa" name="moa" value="<?php echo htmlspecialchars($student['moa']); ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="rank" class="form-label">Rank</label>
                            <input type="number" class="form-control" id="rank" name="rank" value="<?php echo htmlspecialchars($student['rank']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo htmlspecialchars($student['date_of_birth']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="date_of_admission" class="form-label">Date of Admission</label>
                            <input type="date" class="form-control" id="date_of_admission" name="date_of_admission" value="<?php echo htmlspecialchars($student['date_of_admission']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="district" class="form-label">District</label>
                            <input type="text" class="form-control" id="district" name="district" value="<?php echo htmlspecialchars($student['district']); ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="<?php echo htmlspecialchars($student['state']); ?>">
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="is_or_discontinued" class="form-label">Is/Discontinued</label>
                            <select class="form-select" id="is_or_discontinued" name="is_or_discontinued">
                                <option value="I" <?php echo ($student['is_or_discontinued'] == 'I') ? 'selected' : ''; ?>>In Progress</option>
                                <option value="D" <?php echo ($student['is_or_discontinued'] == 'D') ? 'selected' : ''; ?>>Discontinued</option>
                                <option value="C" <?php echo ($student['is_or_discontinued'] == 'C') ? 'selected' : ''; ?>>Completed</option>
                            </select>
                        </div>
                        
                        <div class="col-md-2 mb-3">
                            <label for="cgpa" class="form-label">CGPA</label>
                            <input type="number" step="0.01" class="form-control" id="cgpa" name="cgpa" value="<?php echo htmlspecialchars($student['cgpa']); ?>">
                        </div>
                        
                        <div class="col-md-2 mb-3">
                            <label for="year_of_passing" class="form-label">Year of Passing</label>
                            <input type="text" class="form-control" id="year_of_passing" name="year_of_passing" value="<?php echo htmlspecialchars($student['year_of_passing']); ?>">
                        </div>
                        
                        <div class="col-md-2 mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control" id="company" name="company" value="<?php echo htmlspecialchars($student['company']); ?>">
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php" class="btn btn-secondary me-md-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>

<?php
require_once "../includes/footer.php";
?>