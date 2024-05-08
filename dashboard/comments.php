<?php
    $comments = $_POST['message'];
    $name = $_POST['name'];
    if($comments !== ""){
        $conn = mysqli_connect('localhost','root','','biochar'); 
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $sql = "INSERT INTO member_comments ( posted_by, comment, posted_at)
        VALUES('$name','$comments', now())";
        if (mysqli_query($conn, $sql)) {
            echo"Comment posted successful";
        }
        else{
            echo"Error in posting comment please try again";
        }
    }
    else{
        echo "Please enter comments to post";
    }

?>