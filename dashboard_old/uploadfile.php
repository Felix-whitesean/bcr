<?php
session_start();
$user = $_SESSION['uname'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $targetDir = '../images/';

    $originalName = $_FILES['file']['name'];
    $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);

    $randomName = bin2hex(random_bytes(8)); // Generates a random hexadecimal string
    $targetFile = $targetDir . $randomName. '.' . $fileExtension;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo "File uploaded successfully!"."*/*";

        // $conn = new mysqli('localhost','root,'','biochar');
        $conn = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Get the list of files in the folder
        $file = $randomName. '.' . $fileExtension;
        // Exclude current directory (.) and parent directory (..)
        if ($file !== '.' && $file !== '..') {
            // Insert filename into the database
            
            $sql = "INSERT INTO files (file_name, uploaded_at, uploaded_by)
            VALUES ('$file', now(), '$user')";

            if ($conn->query($sql) === TRUE) {
                echo "File '$file' inserted into the database successfully.<br>";
            } else {
                echo "Error inserting file '$file' into the database: " . $conn->error . "<br>";
            }
        }
    }else {
        echo "Failed to upload file.";
    }
}else {
    echo "Undefined method or input";
}
?>
