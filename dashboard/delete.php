<?php
    session_start();
    $name = $_POST['name'];
    // $conn = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
    $conn = mysqli_connect('localhost','root','','biochar'); 
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $sql = "delete from admindetails where adminName='$name'";
    if (mysqli_query($conn, $sql)) {
        session_unset();
        session_destroy();
        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

?>