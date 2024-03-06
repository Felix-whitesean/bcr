<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biochar | Comments</title>
        <link rel="stylesheet" href="comments.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Itim&family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
        <link rel="icon" href="logo5.jpg">
    </head>
    <body>


<?php
    if (isset($_POST['conf'])){
        $funame = $_POST['fname'];
        $fmail = $_POST['fmail'];
        $fsubject = $_POST['fsubject'];
        $fmessage = $_POST['fmessage'];

            $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
            if(mysqli_connect_errno()){
                echo"Did not connect successfully: ".mysqli_connect_error();
                exit();
            }
            $sql = "INSERT INTO comments(funame,fmail,fsubject, fmessage,commented_at)
            VALUES('$funame','$fmail','$fsubject','$fmessage', now())";

            if (mysqli_query($con, $sql)) {
                ?>
                <div class="thankyou">
                    <?php
                        include('head.html');
                    ?>
                    <div class="thankyoumessage">
                        Thank you for reaching out. We will respond via email: <span style="color: rgb(255, 255, 255, .8); text-decoration: underline dashed;letter-spacing: 1.5px;"><?php echo($fmail)?></span> as soon as possible
                    </div>
                    <?php
                        include('footer.html');
                    ?>
                </div>
            <?php
            }

    }
    else{
        $uname = $_POST['username'];
        $mail = $_POST['mail'];
        $subject = $_POST['subject'];
        $message = $_POST['messageBody'];
        ?>
            <div class="messagedisplay">
                <div class="title">
                    <div class="confirm">Confirm details</div>
                    <div class="change">Change details</div>
                </div>

                <div class="details">
                    <div class="name">Name: <span><?php echo($uname)  ?></span></div>
                    <div class="mail">Mail: <span><?php echo($mail) ?></span></div>
                    <div class="message">
                        Message:
                        <span><div class="subject"><?php echo($subject)?></div></span>
                        <span><div class="messagebody"><?php echo($message)?></div></span>
                    </div>
                    <form action="" method="post">
                        <div class="hidden">
                            <input type="text" name="fname" value="<?php echo($uname)?>">
                            <input type="text" name="fmail" value="<?php echo($mail)?>">
                            <input type="text" name="fsubject" value="<?php echo($subject)?>">
                            <textarea name="fmessage"><?php echo($message)?></textarea>
                        </div>
                        <button class="confirmbtn" name="conf" title="Click to submkt details above">Confirm</button>
                    </form>
                </div>

                <div class="form">
                    <form action="" method="post">
                        <label>
                            Name:
                            <input type="text" name="fname" maxlength="45" value="<?php echo($uname)?>" required>
                        </label>
                        <label>
                            Mail:
                            <input type="text" name="fmail" maxlength="45" value="<?php echo($mail)?>" required>
                        </label>
                        <label>
                            Subject:
                            <input type="text" name="fsubject" maxlength="245" value="<?php echo($subject)?>" required>
                        </label>
                        <label>
                            Message:
                            <textarea maxlength="445" name="fmessage" required><?php echo($message)?></textarea>
                        </label>
                        <button class="confirmbtn" name="conf" title="Click to submit details above">Confirm and Submit</button>
                    </form>
                </div>
            </div>
    <?php
    }
    ?>
        <script>
            changebutton = document.querySelector('.change');
            details = document.querySelector('.details');
            form = document.querySelector('.form');
            confirmdetails = document.querySelector('.confirm');
            changebutton.addEventListener('click', function(){
                changebutton.style.border = "2px solid rgb(255, 197, 155)";
                confirmdetails.style.border = "2px solid rgb(0, 0, 0)";
                details.style.display = "none";
                form.style.display = "initial";
            });
            confirmdetails.addEventListener('click', function(){
                confirmdetails.style.border = "2px solid rgb(255, 197, 155)";
                changebutton.style.border = "2px solid rgb(0, 0, 0)";
                details.style.display = "initial";
                form.style.display= "none";
            });
        </script>
    </body>
    </html>