<?php
    session_start();
    $pass = $_POST['adPass'];
    $uname = $_POST['adName'];
    // $conn = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
    $conn = mysqli_connect('localhost','root','','biochar');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $sql = "SELECT adminPassword, adminName FROM admindetails WHERE adminName = '$uname'";
    $result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error executing query: " . $conn->error;
} else {
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // Fetch data from the result set
        while ($row = $result->fetch_assoc()) {
            $paswd = $row['adminPassword'];
            $userName = $row['adminName'];
        }
        if($userName == $uname && $paswd == $pass){
            echo "1";
            $_SESSION['uname'] = $userName;
        }
        else{
            echo("Wrong name or password, please try again");
        }
    } else {
        echo "Invalid login details";
    }
}
$conn->close();
?>