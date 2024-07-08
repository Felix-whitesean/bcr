<?php
    $from_email = $_POST['from'];
    $to_email = $_POST['receiver'];
    $subject = $_POST['subj'];
    $content = $_POST['content'];
    if($to_email == "" || $content == "" || $subject == ""){
        echo"Please enter all the required values";
    }
    else{
        $to = "felixwhitesean@gmail.com";
        $subject = "Welcome to the BCR website";

        $headers = array(
            "MIME-Version" => "1.0",
            "Content-Type" => "text/html;charset=UTF-8",
            "From" => "info@biocharclimateresolution.org",
            "Reply-To" => "info@biocharclimateresolution.org"
        );

        $message = file_get_contents("mail-template.html");

        $send = mail($to, $subject, $message, $headers);

        echo($send ? "Mail is send" : "There was an error" );
        // if (mail($to_email, $subject, $content, $headers)) {
        //     echo "1";
        // } else {
        //     echo "Error: Unable to send email.";
        // }
    }
?>

<?php
    