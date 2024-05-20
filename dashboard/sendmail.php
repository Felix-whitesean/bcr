<?php
    if($_POST['receiver'] == "" || $_POST['content'] == "" || $_POST['subj'] == ""){
        // echo"Please enter all the required values";
        echo $_POST['from']." ".$_POST['receiver']." ".$_POST['content']." ".$_POST['subj'];
    }
    else{
        // $to = $_POST['receiver'];
        // $subject = $_POST['subj'];
        // $message = $_POST['content'];
        // $from = $_POST['from'];

        // Get form data
        $from_email = $_POST['from'];
        $to_email = $_POST['receiver'];
        $subject = $_POST['subj'];
        $content = $_POST['content'];
        // Set headers
        $headers = "From: $from_email\r\n";
        $headers .= "Reply-To: $from_email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Send email
        if (mail($to_email, $subject, $content, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Error: Unable to send email.";
        }
    }
?>