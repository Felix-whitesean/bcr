<?php
    $to = "felixwhitesean@gmail.com";
    $subject = "Welcome to the BCR website";


    $headers = array(
        "MIME-Version" => "1.0",
        "Content-Type" => "text/html;charset=UTF-8",
        "From" => "info@biocharclimateresolution.org",
        "Reply-To" => "info@biocharclimateresolution.org"
    );

    $message = file_get_contents("mail-template.php");

    $send = mail($to, $subject, $message, $headers);

    echo($send ? "Mail is send" : "There was an error" );