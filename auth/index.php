<?php
    session_start();
     $_SESSION['last_activity'] = time();
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
                            $_SESSION['uname'] = $row['adminName'];
                            ?>
                                <meta http-equiv="refresh" content="0.5;url=https://admin.biocharclimateresolution.org">
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
        $timeout = 1200; // seconds
        $current_time = time();
        $last_activity_time = $_SESSION['last_activity'];
    
        // If the user has been inactive for more than the timeout period
        if(($current_time - $last_activity_time) > $timeout) {
            // Session timed out, destroy the session
            session_unset();
            session_destroy();
            header('Location: https://admin.biocharclimateresolution.org');
        }

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>BIOCHAR | ADMIN</title>
            <link rel="icon" href="logo5.jpg">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Itim&family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
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
                    color: rgb(255, 255, 197);
                }
                h3{
                    font-family: var(--title-text);
                    color: rgb(0, 50, 50);
                    text-decoration: underline;
                }
                .majorAc{
                    display: flex;
                    justify-content: space-between;
                    max-width: fit-content;
                    gap: 10px;
                }
                .viewc a, .addnew a, .dis{
                    border:2px solid black;               
                    width: fit-content;
                    display:flex;
                    justify-content: space-between;
                    user-select: none;
                    gap: 10px;
                    padding: 15px 8px;
                    color: rgb(0, 50, 50);
                    font-family: var(--medium-text);
                    background: rgb(255, 255, 255, .8);
                    padding: 5px 12px;
                    outline: none;
                    text-transform: uppercase;
                    white-space: nowrap;
                    text-decoration: none;
                }
                .viewc a:hover, .addnew a:hover, .dis:hover{
                    cursor: pointer;
                    background:rgb(255, 255, 255);
                    outline: 2px solid: rgb(0, 0, 0, .8);
                    border: 2px solid: rgb(0, 0, 0, .8);
                }
                .viewc a, .addnew a{
                    color: rgb(0, 50, 50); 
                }
                .formhidden{
                    display: none;
                    width: fit-content;
                    padding: 5px 10px;
                    position: relative;
                    background: rgb(255, 255, 197);
                    border: 2px solidrgb(255, 255, 255, .8);
                    user-select: none;
                    transition: 1s;
                }
                .formshow{
                    display: flex;
                    width: fit-content;
                    flex-direction: column;
                    position: absolute;
                    z-index: 111;
                    transition: 1s;
                }
                form label{
                    display: flex;
                    gap: 10px;
                    margin: 10px auto;
                    font-family: var(--medium-text);
                    letter-spacing: 3px;
                    color: var(--secondary-background);
                }
                form label input{
                    outline: 2px solid rgb(255, 255, 197);
                    background: transparent;
                    padding: 5px 10px;
                    width: 250px;
                    color: rgb(45, 54, 63);
                    border: transparent;
                    border-bottom: 2px solid var(--secondary-background);
                    font-family: var(--normal-text);
                }
                form textarea{
                    resize: none;
                    width: 270px;
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
                    background:rgb(255, 255, 255, .8);
                    color: rgb(0, 50, 50);
                    cursor: pointer;
                    outline: 2px solid: rgb(0, 0, 0, .8);
                    border: 2px solid: rgb(0, 0, 0, .8);
                }
                .table{
                    background: rgb(255, 255, 197, .3);
                    padding: 6px 12px;
                    border: 3px solid rgb(0, 155, 155);
                    overflow: hidden;
                    box-shadow: -3px -3px 5px rgb(255, 255, 197) inset;
                    width: 90%;
                    margin: auto;
                    max-height: 60vh;
                    overflow: auto;
                    margin-top: 20px;
                    padding-top: 40px;"
                }
                .table::-webkit-scrollbar{
                    width: 8px;
                    background: rgb(0, 0, 0, .8);
                }
                .table::-webkit-scrollbar-thumb{
                    border-radius: 3px;
                    background: rgb(255, 255, 255, .8);
                }
                .table .tr{
                    transition: 1s;
                    display: flex;
                    justify-content: space-between;
                }
                .table .tr div{
                    user-select: all;
                    padding: 2px 8px;
                    color: var(--primary-background);
                    border-right: 2px solid rgb(255, 255, 255, .8);
                    border-bottom: 2px solid rgb(255, 255, 255, .8);
                    font-family: var(--normal-text);
                    width: 100%;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    transition: 1s;
                    padding: 7px 3px;
                }
                .table .tr:hover{
                    transition: 1s;
                    box-shadow: 2px 0 5px rgb(97, 255, 255), -2px -2px 5px rgb(97, 255, 255);
                    background: rgb(50, 50, 50, .4);
                }
                .table .tr:first-child{
                    user-select: none;
                    box-shadow: 0 2px 5px black;
                    background: var(--secondary-background);
                    position: absolute; width: 88%; margin-top: -30px;
                }
                .table .tr:first-child:hover{
                    box-shadow: 0 2px 5px black;
                    background: var(--secondary-background);
                }
                .table .tr:first-child div{
                    color:rgb(255, 255, 255, .8);
                    font-family: var(--title-text);
                    padding-right: 0px;
                    border-bottom: 0;
                    border-right: 0;
                }
                footer{
                    gap: 10px;
                    bottom: 30px;
                    position: fixed;
                    user-select: none;
                    margin: auto;
                    width: fit-content;
                }
                footer h5{
                    font-family: var(--medium-text);
                    font-size: 22px;
                    margin-bottom: 0;
                }
                footer li{
                    transition: 1s;
                    padding: 5px;
                    list-style: none;
                }
                footer li:hover{
                    transition: 1s;
                    box-shadow: 2px 2px 2px rgb(0, 0, 0, .8);
                    border: 1px dotted rgb(255, 255, 255, .3);
                    color: white;
                }
                footer li a{
                    gap: 20px;
                    color:rgb(255, 255, 255, .8);
                    font-family: var(--normal-text);
                    font-size: 18px;
                }
                footer .links{
                    display: flex;
                    gap: 5px;
                    bottom: -10px
                }
                @media only screen and (max-width:678px) {
                    .majorAc{
                        display: block;
                    }
                    .majorAc .dis, .majorAc .addnew{
                        margin: 10px;
                    }
                    .title, .last, .email{
                        display: none;
                    }
                    .table div:nth-child(2){
                        overflow: auto;
                        text-overflow: initial;
                    }
                }
            </style>
        </head>
        <body>

        <?php
            if(isset($_POST['add'])){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $title = $_POST['title'];
                $userprofile = $_POST['userprofile'];

                $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
                if(mysqli_connect_errno()){
                    echo"Did not connect to the database successfully: ".mysqli_connect_error();
                    exit();
                }
                $sql = "INSERT INTO members(firstname,lastname,title,userprofile,joined_at)
                VALUES('$firstname','$lastname','$title','$userprofile', now())";

                if (mysqli_query($con, $sql)) {
                    ?>
                    <script>
                        alert('New member Added √');
                    </script>
                    <meta http-equiv="refresh" content="0.5;url=https://admin.biocharclimateresolution.org">
                <?php
                }
            }
            else{
                ?>
                <div class="majorAc">
                    <div class="dis">
                        <i class="fa-solid fa-user-plus"></i>
                        <div>Add new member</div>
                        <i></i>
                    </div>
                    <div class="addnew">
                        <a href="signup.php"><i class="fa-solid fa-user-tie">+</i>  Add new admin</a>
                    </div>
                    <div class="viewc">
                        <a href="comments.php"><i class="fa-solid fa-comments"></i>  View comments</a>
                    </div>
                </div>
                <form class="formhidden" action="" method="post">

                    <label>
                        Firstname:
                        <input type="text" maxlength="28" name="firstname" placeholder="with no spaces" required>
                    </label>
                    <label>
                        Lastname:
                        <input type="text" maxlength="28" name="lastname" placeholder="with no spaces" required>
                    </label>
                    <label>
                        Title:
                        <input type="text" maxlength="35" name="title" required>
                    </label>
                    <label>
                        Profile:
                        <textarea name="userprofile" maxlength="1000" required></textarea>
                    </label>
                    <button name="add">CONFIRM AND ADD</button>
                </form>

                <?php
            }
            
            $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
            if(mysqli_connect_errno()){
                echo"Did not connect to the database successfully: ".mysqli_connect_error();
                exit();
            }
            $sql2 = "SELECT memberId, firstname, lastname, title, joined_at, userprofile, email, linkedIn, gender, whatsapp FROM members ORDER BY firstname";

                    $result = mysqli_query($con, $sql2);

                    if (mysqli_num_rows($result) > 0) {
                        ?>
                        <div class="header">
                            
                        </div>
                        <div class="table">
                            <div class="tr">
                                <div style="padding-left: 12px;">Firstname</div>
                                <div class="last">Lastname</div>
                                <div class="title">Title</div>
                                <div class="email">Email</div>
                                <div>Whatsapp no.</div>
                                <div>Delete Record</div>
                                <div>Change Details</div>
                            </div>
        
                            <?php
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="tr">
                                    <div><?php echo($row['firstname']);?></div>
                                    <div class="last"><?php echo($row['lastname']);?></div>
                                    <div class="title"><?php echo($row['title']);?></div>
                                    <div class="email"><?php echo($row['email']);?></div>
                                    <div><?php echo($row['whatsapp']);?></div>
                                    <div style="cursor: pointer; color: rgb(255, 24, 24);" class="delete"><i class="fa-solid fa-user-minus"></i> Remove <?php echo($row['firstname']);?></div>
                                    <a class="del" style="display: none;" href="delete.php?id=<?php echo "$row[memberId]";?>"></a>
                                    <div style="cursor: pointer;"><a style="color: rgb(200, 200, 30);" href="members_update.php?id=<?php echo "$row[memberId]";?>">Update</a></div>
                            </div>
                            <?php
                        }
                    }
                                    
            ?>
            </div>
            <footer>
                <h5>Contact developer</h5>
                <div class="links">
                    <li><a target="_blank" href="https://wa.me/254113312549"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a></li>
                    <li title="Call: +254113312549"><a href="tel:+254113312549"><i class="fa-solid fa-mobile-screen"></i> Phone call</a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/in/felix-whitesean-686100220/"><i class="fa-brands fa-linkedin"></i> LinkedIn</a></li>
                </div>
            </footer>
            <script>
                toggleButton = document.querySelector('.dis');
                deleteBtns = document.querySelectorAll('.delete');
                for(i = 0; i< deleteBtns.length; i++){
                    deleteBtns[i].addEventListener("click", removeMember);
                }
                form = document.querySelector('.formhidden');
                symbols = toggleButton.querySelectorAll('i');
                symbols[1].classList.add('fa-solid','fa-caret-down');
                symbols[1].style.fontSize = "20px";
                toggleButton.addEventListener('click', function(){
                    form.classList.toggle('formshow');
                    if(symbols[1].classList == ""){
                        symbols[1].classList.add('fa-solid','fa-caret-up');
                    }
                    else if (symbols[1].classList == "fa-solid fa-caret-up"){
                        symbols[1].classList.remove('fa-solid','fa-caret-up');
                        symbols[1].classList.add('fa-solid','fa-caret-down');
                    }
                    else{
                        symbols[1].classList.remove('fa-solid','fa-caret-down');
                        symbols[1].classList.add('fa-solid','fa-caret-up');
                    }
                });
                function removeMember(event){
                    var answer = confirm("Are you sure you want to delete this user");
                    if(answer){
                        window.location.href = event.target.parentElement.querySelector('.del').href;
                    }
                    else{
                        alert("User not deleted");
                    }
                }
            </script>
            </body>
            </html>

            <?php
                }
            mysqli_close($con);
            ?>