<?php
    session_start();
    $name = $_POST['name'];
    if($name == $_SESSION['uname']){
        $_SESSION['uname'] = "";
        session_unset();
        session_destroy();
        echo"1";
    }
?>