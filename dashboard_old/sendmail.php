<?php
    $from_email = $_POST['from'];
    $to_email = $_POST['receiver'];
    $subject = $_POST['subj'];
    $content = $_POST['content'];
    if($to_email == "" || $content == "" || $subject == ""){
        echo"Please enter all the required values";
        // echo $_POST['from']." ".$_POST['receiver']." ".$_POST['content']." ".$_POST['subj'];
    }
    else{
        // $to = $_POST['receiver'];
        // $subject = $_POST['subj'];
        // $message = $_POST['content'];
        // $from = $_POST['from'];
          
        // Set headers
        $headers = "From: $from_email\r\n";
        $headers .= "Reply-To: $from_email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset==UTF-8\r\n";
        // "Content-Type" => "text/html;charset=UTF-8",

        // Send email
        if (mail($to_email, $subject, $content, $headers)) {
            echo "1";
        } else {
            echo "Error: Unable to send email.";
        }
    }
?>