<?php

    if($_POST['from'] == "" || $_POST['receiver'] == "" || $_POST['content'] == "" || $_POST['subject'] == ""){
        echo"Please enter all the required values";
    }
    else{
        $to = $_POST['receiver'];
        $subject = $_POST['subject'];
        $message = $_POST['content'];
        $from = $_POST['from'];
    }
    $headers = array(
        "MIME-Version" => "1.0",
        "Content-Type" => "text/html;charset=UTF-8",
        "From" => $from,
        "Reply-To" => $from
    );

    // $message = file_get_contents("mail-template.html");

    $send = mail($to, $subject, $message, $headers);

    echo($send ? "1" : "There was an error in sending email" );