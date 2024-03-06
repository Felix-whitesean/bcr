<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biochar | Admin - Signup</title>
    <link rel="icon" href="ff.png">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <style>
                :root{
                    --primary-background: rgb(240, 240, 240);
                    --secondary-background: rgb(20, 117, 20);
                    --secondary-background-with-opacity: rgb(20, 117, 20, .5);
                    --title-text: "Jacques Francois Shadow", serif;
                    --medium-text: "Irish Grover", system-ui;
                    --normal-text: "Itim", cursive;
                    --footer-background: rgb(31, 36, 45, .8);
                    --footer-color: rgb(153, 153, 153);
                }
                body{
                    background: var(--primary-background);
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
                    outline: 2px solid transparent;
                    padding: 5px 10px;
                    width: auto;
                    color: rgb(0, 155, 155);
                    background: transparent;
                    border: transparent;
                    border-bottom: 2px solid rgb(0, 50, 50);
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
                form button:hover{
                    background: rgb(200, 200, 200);
                    cursor: pointer;
                    box-shadow: 1px 1px 4px black;
                    color: rgb(0, 0, 0, .8);
                    outline: 1px solid black;
                    border: transparent;
                    padding:8px 25px;
                    border-radius: 5px;
                }
                form label i{
                    align-self: flex-start;
                    margin-bottom: -14px;
                    margin-left: -26px;
                }
            </style>
</head>
<body>
    <?php
    if(!$_SESSION['uname']){
        //include('login.php');
        echo"Please login in the admin page first";
    }
    else{
        if(isset($_POST['submit'])){
            $adName = $_POST['adName'];
            $adPass = $_POST['adPass'];
            $adEmail = $_POST['adEmail'];
            $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }
            $sql = "INSERT INTO admindetails(adminName, adminPassword, adminEmail, joined_at)
            VALUES('$adName','$adPass','$adEmail', now())";

            if(mysqli_query($con, $sql)){
                echo '<script>alert("Registration successfull, please proceed to login")</script>';
                sleep(1.5);
                ?>
                <meta http-equiv="refresh" content="1.5;url=https://admin.biocharclimateresolution.org/">
                <?php
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
                die();
            }
            mysqli_close($con);
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
            <i class="fa-solid fa-eye"></i>
        </label>
        <label>
            EMAIL:
            <input type="email" name="adEmail" required>
        </label>
        <button name="submit">SUBMIT</button>
    </form>
    <script>
        toggleBtn = document.querySelector('i');
        toggleBtn.addEventListener("click", function(target){
            if(event.target.classList == "fa-solid fa-eye"){
                event.target.parentElement.querySelector('input').type = "text";
                event.target.classList = ('fa-solid fa-eye-slash');
                
            }
            else{
                event.target.parentElement.querySelector('input').type = "password";
                event.target.classList = ('fa-solid fa-eye');
            }
        })
    </script>
</body>
</html>
<?php
    }
?>