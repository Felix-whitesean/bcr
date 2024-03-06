<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biochar | Admin - Login</title>
    <link rel="icon" href="logo5.jpg">
    <meta name="theme-color" content="rgb(0, 50, 50)">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
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
                    background: rgb(0, 50, 50);
                    color: rgb(0, 50, 50);
                }
                h3{
                    font-family: var(--title-text);
                    color: rgb(0, 50, 50);
                    text-decoration: underline;
                }
                form{
                    width: fit-content;
                    padding: 10px;
                    margin: auto;
                    background: rgb(255, 255, 197, .6);
                    border: 2px solid rgb(255, 197, 155);
                    user-select: none;
                    color: var(--primary-color);
                }
                form label{
                    display: flex;
                    gap: 5px;
                    padding: 6px;
                    font-family: var(--medium-text);
                    letter-spacing: 3px;
                    justify-content: space-between;
                }
                form label input{
                    outline: transparent;
                    padding: 5px 10px;
                    width: 250px;
                    color: rgb(255, 255, 255, .8);
                    background: transparent;
                    border: transparent;
                    border-bottom: 2px solid white;
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
                    border: 1px solid transparent;
                }
                form  button:hover{
                    color: rgb(255, 255, 255);
                    background: rgb(0, 50, 50);
                    cursor: pointer;
                    outline: 2px solid: rgb(0, 0, 0, .8);
                    border: 1px solid black;
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
        if(isset($_POST['submit'])){
            $pass = $_POST['adPass'];
            $uname = $_POST['adName'];
            $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }
            $sql = "select adminPassword, adminName from admindetails";

            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $userName = $row['adminName'];
                $paswd = $row['adminPassword'];
    
                if($userName == $uname && $paswd == $pass){
                    echo "Welcome $uname";
                    session_start();
                    $_SESSION['uname'] = $row['adminName'];
                    ?>
                        <meta http-equiv="refresh" content="0.5;url=index.php">
                    <?php
                }
            }
        }
    ?>
    <form action="" method="post">
        <h3>Enter Admin details to login</h3>
        <label>
            NAME:
            <input type="text" name="adName" required>
        </label>
        <label>
            PASSWORD:
            <input type="password" name="adPass" required>
            <i class="fa-solid fa-eye"></i>
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