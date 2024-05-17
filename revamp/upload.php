<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $targetDir = '../gallery/';
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo 'File uploaded successfully!';
    } else {
        echo 'Failed to upload file.';
    }
}
?>
