<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']); // Get the file name safely
    $filePath = __DIR__ . "/notice/uploads/" . $file; // Correct file path

    if (file_exists($filePath)) {
        // Set headers to force download
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . $file . "\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Content-Length: " . filesize($filePath));
        
        readfile($filePath);
        exit;
    } else {
        die("Error: File not found at " . $filePath);
    }
} else {
    die("Error: No file specified.");
}
// die("Debug: Looking for file at " . $fiFlePath);
?>
