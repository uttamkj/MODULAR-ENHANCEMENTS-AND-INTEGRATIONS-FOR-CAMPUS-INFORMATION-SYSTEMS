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

<html>
<head>
    <title>Notice Information System</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
          .addNoticePage, .addNoticeBody {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .addNoticeh2 {
            text-align: center;
            text-decoration: underline;
            font-size: 28px;
            font-weight: bold;
            color: rgb(27, 34, 129);           
        }

        .addNotice {
            width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .addNoticeInput,
        .addNoticeSelect {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 5px;
        }

        .addNoticeBtn{
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: white;
            background-color: rgb(27, 34, 129); 
        }
    </style>
</head>

<body class="addNoticeBody">
    <?php
    // if(isset($_GET['status'])){
//     $response= $_GET['status'];
//     if($response){
//         echo "Notice Added";
//     } else {
//         echo "Something went wrong. Try again later";
//     }
// }
    ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4 addNoticeh2">ADD NEW NOTICE </h2>
        <form action="add_notice.php" method="POST" enctype="multipart/form-data" class="addNotice">

            <label class="form-label">Author:</label>
            <input type="text" name="author" class="form-control" required>

            <label class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" required>

            <label class="form-label">Category:</label>
            <select name="category" class="form-control" required>
                <option value="Exam">Exam</option>
                <option value="Event">Event</option>
                <option value="Academic">Academic</option>
                <option value="Finance">Finance</option>
                <option value="Administration">Administration</option>
            </select>

            <label class="form-label">Upload File (Optional):</label>
            <input type="file" name="file" class="form-control"><br>

            <input type="submit" name="add_notice" class="addNoticeBtn" value="Submit Notice">
        </form>
    </div>
</body>
<!-- <script src="bootstrap.bundle.min.js"></script> -->
<!-- <script src="../assets/js/bootstrap.bundle.min.js"></script> -->

</html>
<?php

if (isset($_POST['add_notice'])) {
    $posted_date = date("Y-m-d H:i:s");
    $author = $_POST['author'];
    $title = $_POST['title'];
    $category = $_POST['category'];

    // File upload handling
    $uploadDir = __DIR__ . "/uploads/";
    $file_name = ""; // Default to empty if no file is uploaded

    if (!empty($_FILES['file']['name'])) { // Check if a file is selected
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_path = $uploadDir . basename($file_name);

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!move_uploaded_file($file_tmp, $file_path)) {
            echo "<p class='text-danger text-center'>Error uploading file.</p>";
            exit(); // Stop execution if file upload fails
        }
    }

    // Insert the notice into the database (even if file_name is empty)
    require_once 'functions.php';

    if (addNotice($posted_date, $author, $title, $category, $file_name)) {
        echo "<p class='text-success text-center'>Notice added successfully!</p>";
    } else {
        echo "<p class='text-danger text-center'>Failed to add notice.</p>";
    }
}


?>

<?php
require_once "../includes/footer.php";
?>