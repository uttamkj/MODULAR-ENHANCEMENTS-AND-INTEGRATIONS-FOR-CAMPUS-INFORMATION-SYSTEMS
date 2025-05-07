<?php
require_once "../includes/navbar.php";
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

<?php
require_once 'functions.php';

// Search functionality
$students = [];
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $students = searchStudents($searchTerm);
} else {
    $students = getAllStudents();
}

// Handle delete action
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteStudent($id)) {
        header("Location: index.php?deleted=true");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon Student Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .search-container {
            margin: 20px 0;
        }
        .action-buttons {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-4">
        <h2 class="text-center mb-4">Silicon Student Management System</h2>
        
        <?php if(isset($_GET['deleted']) && $_GET['deleted'] == 'true'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Student record deleted successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <!-- Search Box -->
        <div class="row search-container">
            <div class="col-md-6 offset-md-3">
                <form action="" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search by SIC No or Name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
                        <a href="index.php" class="btn btn-secondary ms-2">Clear</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        
        <!-- Students Table -->
        <div class="table-responsive">
            <table id="studentsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>SL No</th>
                        <th>SIC No</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Branch</th>
                        <th>Gender</th>
                        <th>Roll No</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($students) > 0): ?>
                        <?php foreach($students as $student): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($student['sl_no']); ?></td>
                                <td><?php echo htmlspecialchars($student['sic_no']); ?></td>
                                <td><?php echo htmlspecialchars($student['name']); ?></td>
                                <td><?php echo htmlspecialchars($student['course']); ?></td>
                                <td><?php echo htmlspecialchars($student['branch']); ?></td>
                                <td><?php echo htmlspecialchars($student['gender']); ?></td>
                                <td><?php echo htmlspecialchars($student['roll_no']); ?></td>
                                <td class="action-buttons">
                                    <a href="updateStudentData.php?id=<?php echo $student['sl_no']; ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $student['sl_no']; ?>, '<?php echo addslashes($student['name']); ?>')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    <a href="viewStudentData.php?id=<?php echo $student['sl_no']; ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No students found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the student: <span id="studentName"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" id="deleteLink" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable({
                "paging": true,
                "pageLength": 10,
                "searching": false, // Disable DataTables search as we have our own
                "order": [[ 2, "asc" ]] // Sort by name by default
            });
        });
        
        function confirmDelete(id, name) {
            document.getElementById('studentName').textContent = name;
            document.getElementById('deleteLink').href = 'index.php?action=delete&id=' + id;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }
    </script>
</body>
</html>

<?php
require_once "../includes/footer.php";
?>