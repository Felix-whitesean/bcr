<?php

// Handle the AJAX request to update the like count
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['country'])&& isset($_POST['agree'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $telNo = $_POST['tel-no'];
        $country = $_POST['country'];
        $rules = $_POST['agree'];
        if(isset($_POST['subscription'])){
            $subscription = 1;
        }
        else{
            $subscription = 0;
        }

         $conn = mysqli_connect('localhost','root','','biochar');
        //  $conn = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
         // Check connection
         if (mysqli_connect_errno()) {
             echo "Failed to connect to MySQL: " . mysqli_connect_error();
             exit();
         }
         $sql = "INSERT INTO requests(username,email,subscription, rules,country, telNo, joined_at)
             VALUES('$name','$email','$subscription','$rules','$country', '$telNo', NOW())";
         if (mysqli_query($conn, $sql)) {
             echo"1";
         }
         else{
             echo"Error in posting comment please try again";
         }
    }
    else{
        echo "Required data missing";
    }

} else {
    echo 'Invalid request';
}
?>
