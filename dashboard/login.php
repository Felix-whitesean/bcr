<?php
    session_start();
    $pass = $_POST['adPass'];
    $uname = $_POST['adName'];
    $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
    // $con = mysqli_connect('localhost','root','','biochar');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $sql = "select adminPassword, adminName from admindetails";

    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $userName = $row['adminName'];
        $paswd = $row['adminPassword'];
    }
    if($userName == $uname && $paswd == $pass){
        echo "1";
        $_SESSION['uname'] = $userName;
    }
    else{
        echo($userName.$uname);
        echo($paswd.$pass);
        echo("Wrong name or password, please try again");
    }
?>