<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biochar | comments</title>
    <meta name="theme-color" content="rgb(0, 50, 50)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Itim&family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
    <link rel="icon" href="ff.png">
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
            color: rgb(255, 255, 197);
            background: rgb(0, 50, 50);
        }
        .header{
            color: rgb(255, 255, 255);
            font-size: 20px;
            font-family: var(--title-text);
            border: 1px solid;
            background: rgb(0, 0, 0, .4);
            border-bottom: transparent;
        }
        .header p{
            padding-left: 10px;
        }
        .header, .tablecontent{
            display: flex;
            justify-content: space-between;
            margin: auto;
        }
        .header p, .tablecontent p{
            width: 20%;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding:0 9px;
        }.tablecontent p{
            font-family: var(--normal-text);
            user-select: all;
        }
        .tablecontent p::-webkit-scrollbar{
            display: none;
        }
        .tablecontent p:nth-child(2){
            text-overflow: initial;
            overflow: auto;
        }
        .tablecontent p:nth-child(2):hover{
            box-shadow: 2px 0 2px black;
            padding: 5px;
        }
        .tablecontent p:hover{
            overflow: auto;
            white-space: wrap;
        }
        .tablecontent{
            padding: 5px;
            border-bottom: 1px solid white;
        }
        .tablecontent:hover{
            background: rgb(20, 40, 60);
            box-shadow: 0 2px 2px black;
        }
        .commentdate{
            display: none;
        }
        .tmd{
            color: rgb(255, 255, 255);
            text-decoration: underline dotted;
            text-align: center;
            padding-left: 2%;
            word-spacing: 5px;
        }
        .table{
            border: 1px solid white;
            max-height: 70vh;
            width: 90%;
            overflow-y: auto;
            margin: auto;
            box-shadow: -1px -1px 5px black inset;
        }
    </style>
</head>
<body>
    <?php
        if(!$_SESSION['uname']){
            ?>
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
                            $_SESSION['uname'] = $userName;
                            ?>
                                <meta http-equiv="refresh" content="0.5;url=comments.php">
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
        <?php
        }
        else{
            $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
            if(mysqli_connect_errno()){
                echo"Did not connect to the database successfully: ".mysqli_connect_error();
                exit();
            }
            $sql = "SELECT funame, fmail, fsubject, fmessage, commented_at FROM comments";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                ?>
                <div class="table">
                    <div class="header">
                        <p>Name</p>
                        <p>Email</p>
                        <p>Subject</p>
                        <p>Comments</p>
                        <p>Commented</p>
                    </div>
                    <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        $t=time();
                        $n = (date("Y-m-d h:m:s",$t));
                        ?>
                        <div class="tablecontent">
                            <p class="fname"><?php echo($row['funame']);?></p>
                            <p class="fmail"> <?php echo($row['fmail']);?></p>
                            <p class="fsubject"><?php echo($row['fsubject']);?></p>
                            <p class="fmessage"> <?php echo($row['fmessage']);?></p>
                            <p class="commentdate"><?php echo($row['commented_at']); ?></p>
                            <p class="tmd"></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            mysqli_close($con);
        // }
    ?>
    <script>
        commentdates = document.querySelectorAll('.commentdate');
        timedifferences = document.querySelectorAll('.tmd');
        var x = setInterval(function(){
            for(i = 0; i < commentdates.length; i++){
                // Define the specific time in the past
                const specificTime = new Date(commentdates[i].textContent);
            
                // Get the current time
                var currentTime = new Date();
                // Convert milliseconds to days, hours, minutes, and seconds
                var timeDiff = currentTime.getTime() - specificTime.getTime();

                var days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) - 9;
                var minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

                // Display the time difference
                if(days < 1){
                    if(hours < 1){
                        timedifferences[i].textContent = `${minutes}m ago`;
                    }
                    else{
                        timedifferences[i].textContent = `${hours}h, ${minutes}m ago`;
                    }
                }
                else{
                    timedifferences[i].textContent = `${days}d ${hours}h ${minutes}m ago`;
                }
            }
        }, 1000);

    </script>
</body>
</html>
<?php
}
?>