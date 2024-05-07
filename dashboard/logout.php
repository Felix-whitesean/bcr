<?php
    session_start();
    $status = $_POST['status'];
    if($status == 0){
        session_unset();
        session_destroy();
    }

?>