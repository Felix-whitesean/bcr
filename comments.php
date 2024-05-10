<?php

// Handle the AJAX request to update the like count
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['subject'])&& isset($_POST['messageBody'])) {
        $funame = $_POST['username'];
        $fmail = $_POST['mail'];
        $fsubject = $_POST['subject'];
        $fmessage = $_POST['messageBody'];
    }
    else{
        echo "Required data missing";
    }
    // $dsn = 'mysql:host=localhost;dbname=biochar';
    // $username = 'root';
    // $password = '';
    $dsn = 'mysql:host=localhost;dbname=biocharc_YmlvY2hhcmRib25l';
    $username = 'biocharc_admin_init';
    $password = 'Bcr<>23@Ng&F';
    // $conn = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
    
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Increment the like count for the specified post
        $pdo->exec("INSERT INTO comments(funame,fmail,fsubject, fmessage,commented_at)
        VALUES('$funame','$fmail','$fsubject','$fmessage', now())");
        echo 'Thank you for your comments';
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }

} else {
    echo 'Invalid request';
}
?>
