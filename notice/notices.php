<?php
include_once "functions.php";

$category = isset($_GET['category']) ? $_GET['category'] : '';

$notices = getNotices($category); // Fetch all notices without pagination
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category); ?> Notices</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .admin-notice-heading {
            font-size: 28px;
            font-weight: bold;
            display: inline-block;
            color: rgb(27, 34, 129);
            border-bottom: 3px solid rgb(27, 34, 129);
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="container text-center">
            <h2 class=" admin-notice-heading mb-4 p-1 "><?php echo "$category"; ?></h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Posted Date</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $notices->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['author']); ?></td>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td class="text-muted"><?php echo htmlspecialchars($row['posted_date']); ?></td>
                            <td>
                                <?php if (!empty($row['file'])) { ?>
                                    <a href="uploads/<?php echo htmlspecialchars($row['file']); ?>" download
                                        class="btn btn-primary btn-sm">
                                        Download
                                    </a>
                                <?php } else { ?>
                                    <p class="text-muted">No file attached</p>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php 

require_once "../includes/footer.php"
?>