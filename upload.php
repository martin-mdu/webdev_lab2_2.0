<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
        $file = $_FILES['fileUpload'];

        // Check if the uploaded file is a JSON file
        $fileType = pathinfo($file['name'], PATHINFO_EXTENSION);
        if ($fileType != 'json') {
            echo "Error: Only JSON files are allowed.";
            exit;
        }

        // Define where you want to save the uploaded file
        $uploadDir = 'uploads/';
        $uploadFilePath = $uploadDir . basename($file['name']);

        // Check if the uploads directory exists, if not, create it
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the file to the uploads directory
        if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
            // Save the latest file name to latest.json file
            file_put_contents('uploads/latest.json', basename($file['name']));
            echo "File uploaded successfully: " . htmlspecialchars(basename($file['name']));
        } else {
            echo "Error: There was a problem uploading your file.";
        }
    } else {
        echo "Error: No file uploaded or an error occurred.";
    }
}
?>