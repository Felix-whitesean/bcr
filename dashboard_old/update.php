<?php
    session_start();
    $uname = $_SESSION['uname'];
    if($_POST['newpass'] =="" || $_POST['confirmnewpass']==""){
        echo"Password cannot be blank";
    }
    else{
        $newpass = $_POST['newpass'];
        $confirnewpass = $_POST['confirmnewpass'];
        if($newpass !== $confirnewpass){
            echo"Password not matching please try again";
            return;
        }
        else{
            // $conn = mysqli_connect('localhost','root','','biochar');
            $conn = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }
            $sql = "UPDATE admindetails set adminPassword='$newpass' where adminName = '$uname'";
            if($conn->query($sql)){
                session_unset();
                session_destroy();
                echo"1";
            }
            else{
                echo"Error in updating password please try again";
            }
        }
    }

?>