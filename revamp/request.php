<?php

// Handle the AJAX request to update the like count
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['country'])&& isset($_POST['agree'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $telNo = $_POST['tel-no'];
        $country = $_POST['country'];
        $rules = $_POST['agree'];
        if(isset($_POST['subscription'])){
            $subscription = 1;
        }
        else{
            $subscription = 1;
        }
        echo "User request submitted successfull";
    }
    else{
        echo "Required data missing";
    }
    // $dsn = 'mysql:host=localhost;dbname=biochar';
    // $username = 'root';
    // $password = '';
    
    // try {
    //     $pdo = new PDO($dsn, $username, $password);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //     // Increment the like count for the specified post
    //     $pdo->exec("INSERT INTO comments(funame,fmail,fsubject, fmessage,commented_at)
    //     VALUES('$funame','$fmail','$fsubject','$fmessage', now())");
    //     echo 'Thank you for your comments';
    // } catch (PDOException $e) {
    //     echo 'Database error: ' . $e->getMessage();
    // }

} else {
    echo 'Invalid request';
}
?>
