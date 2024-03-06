<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biochar | Admin - Signup</title>
    <link rel="icon" href="logo5.jpg">
    <style>
                :root{
                    --primary-background: rgb(255, 255, 197);
                    --secondary-background: rgb(0, 50, 50);
                    --secondary-background-with-opacity: rgb(0, 50, 50, .5);
                    --title-text: "Jacques Francois Shadow", serif;
                    --medium-text: "Irish Grover", system-ui;
                    --normal-text: "Itim", cursive;
                    --footer-background: rgb(31, 36, 45, .8);
                    --footer-color: rgb(153, 153, 153);
                }
                body{
                    background: rgb(255, 255, 197);
                    color: rgb(0, 0, 0);
                }
                h3{
                    font-family: var(--title-text);
                    color: rgb(0, 50, 50);
                    text-decoration: underline;
                }
                form{
                    width: fit-content;
                    padding: 20px 50px;
                    margin: auto;
                    background: rgb(255, 255, 197, .6);
                    border: 2px solid rgb(255, 197, 155);
                    user-select: none;
                    color: var(--primary-color);
                }
                form label{
                    display: flex;
                    gap: 20px;
                    margin: 10px auto;
                    font-family: var(--medium-text);
                    letter-spacing: 3px;
                }
                form label input{
                    outline: 2px solid rgb(255, 255, 197);
                    border-radius: 20px;
                    padding: 5px 10px;
                    width: 310px;
                    color: rgb(0, 155, 155);
                    background: rgb(0, 0, 0, .8);
                    border: 2px solid white;
                    font-family: var(--normal-text);
                }
                form textarea{
                    resize: none;
                    width: 370px;
                    height: 210px;
                    background: rgb(0, 0, 0, .8);
                    color: rgb(0, 155, 155);
                    font-family: var(--normal-text);
                }
                form  button{
                    padding: 5px 25px;
                    margin: auto;
                    width: fit-content;
                    font-family: var(--medium-text);
                }
                form  button:hover{
                    background: rgb(255, 197, 155);
                    color: rgb(0, 50, 50);
                    cursor: pointer;
                    outline: 2px solid: rgb(0, 0, 0, .8);
                    border: 2px solid: rgb(0, 0, 0, .8);
                }
            </style>
</head>
<body>
    <?php
    session_start();
    if(!$_SESSION['uname']){
        include('login.php');
    }
    else{
        if(isset($_POST['submit'])){
            $adName = $_POST['adName'];
            $adPass = $_POST['adPass'];
            $adEmail = $_POST['adEmail'];
            $con = mysqli_connect('localhost','root','','biochar');
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }
            $sql = "INSERT INTO admindetails(adminName, adminPassword, adminEmail, joined_at)
            VALUES('$adName','$adPass','$adEmail', now())";

            if(mysqli_query($con, $sql)){
                sleep(1.5);
                echo '<script>alert("Registration successfull, please login")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
                die();
            }
            mysqli_close($con);
            header("Location: admin.php");            
        }
    ?>
    <form action="" method="post">
        <h3>Add New Admin Details Below</h3>
        <label>
            NAME:
            <input type="text" name="adName" required>
        </label>
        <label>
            PASSWORD:
            <input type="password" name="adPass" minlength="5"required>
        </label>
        <label>
            EMAIL:
            <input type="email" name="adEmail" required>
        </label>
        <button name="submit">SUBMIT</button>
    </form>
</body>
</html>
<?php
    }
?>