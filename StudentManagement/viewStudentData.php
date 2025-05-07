<?php
require_once "../includes/navbar.php";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student - Silicon Student Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .student-detail {
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: bold;
        }
        .detail-value {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Student Details</h2>
        
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Students List
            </a>
        </div>
        
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="card-title mb-0">
                    <i class="fas fa-user"></i> 
                    <?php echo htmlspecialchars($student['name']); ?> (SIC: <?php echo htmlspecialchars($student['sic_no']); ?>)
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-end">
                            <a href="updateStudentData.php?id=<?php echo $student['sl_no']; ?>" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $student['sl_no']; ?>, '<?php echo addslashes($student['name']); ?>')" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="student-detail">
                            <p class="detail-label">SIC No:</p>
                            <p class="detail-value"><?php echo htmlspecialchars($student['sic_no']); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="student-detail">
                            <p class="detail-label">University Regd No:</p>
                            <p class="detail-value"><?php echo htmlspecialchars($student['university_regd_no']);


