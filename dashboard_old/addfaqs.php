<?php
    session_start();
    $name = $_SESSION['uname'];
    $title = $_POST['faq-title'];
    $answer = $_POST['answer'];
    if($title  !== "" && $answer !== ""){
        // $conn = mysqli_connect('localhost','root','','biochar');
        $conn = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $sql = "INSERT INTO faqs( faq_title, faq_answer, updated_by, updated_at)
        VALUES('$title','$answer','$name', now())";
        if (mysqli_query($conn, $sql)) {
            echo"1";
        }
        else{
            echo"Error in posting comment please try again";
        }
    }
    else{
        echo "Please enter comments to post";
    }

?>