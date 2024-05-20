<?php
    session_start();
    $_SESSION['last_activity'] = time();
    $name = $_SESSION['uname']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCR | Dashboard</title>
    <meta name="description" content="Biochar Climate Resolution Dashboard, BCR Dashboard, Biochar Climate Resolution Login, BCR Admin">
    <meta name="keywords" content="Biochar Climate Resolution Dashboard, BCR Dashboard, Biochar Climate Resolution Login, BCR Admin">
    <meta name="author" content="felix whitesean">
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Inter:wght@100..900&family=Miltonian&family=Sevillana&display=swap" rel="stylesheet">    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="https://biocharclimateresolution.org/logo.png">
    <meta name="theme-color" content="rgb(22, 110, 22)">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="container1">
    <div class="popup"></div>
</div>
    <?php
    if(!$name){
        ?>
        <div class="login">
            <form id="login" method="post">
                <h5>This page is protected with password, please login</h5>
                <label><p><i class="fa-regular fa-user"></i> Username:</p><fieldset><input type="text" name="adName" required></fieldset></label>
                <br>
                <label><p><i class="fa-solid fa-lock"></i> Password:</p><fieldset><input type="password" name="adPass" required><i onclick="switchinput(this)" class="fa-regular fa-eye"></i></fieldset></label>
                <button type="button" onclick="formsubmission('login','login.php', 'Sign in successful...')">Sumbit</button>
                <br>
                <a href="">Forgot password</a>
            </form>
        </div>
        <?php
    }else{
        $timeout = 60; // seconds
        $current_time = time();
        $last_activity_time = $_SESSION['last_activity'];
    
        if(($current_time - $last_activity_time) > $timeout) {
            session_unset();
            session_destroy();
            ?>
            <script>
                location.reload();
            </script>
            <?php
        }
        ?>
    <div class="loadingBackground">
        <div class="loading"></div>
        <div class="constant"><img src="https://biocharclimateresolution.org/logo.png" alt="LOADING"></div>
    </div>
    <div class="template">
        <section class="navigation">
            <div class="left">
                <div class="name">
                    <div class="logo">
                        <img src="https://biocharclimateresolution.org/ff.png" alt="">
                    </div>
                    <div class="acronym">
                        <p>BCR | Menu</p>
                    </div>
                </div>
                <hr>
                <nav class="topics">
                    <li>Email</li>
                    <li>Members</li>
                    <li>Comments</li>
                    <li>Contact Details</li>
                    <li>Editable pages</li>
                    <li>Blog</li>
                    <li>Payments received</li>
                </nav>
            </div>
            <div class="actionbtn">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </section>
        <div class="right">
            <section class="landing">
                <div class="floatingheader">
                    <i class="fa-solid fa-circle-arrow-left"></i>
                    <h4>Biochar Climate Resolution - Dashboard</h4>
                </div>  
            </section>
            <section class="landingprofile">
                <div class="landingprofilecontainer">
                    <div class="accounttemplate">
                        <div class="account">
                            <div class="profileimage">
                                <i class="fa-solid fa-circle-user"></i>
                                <?php echo($_SESSION['uname']); ?>
                            </div>
                            <div class="settings">
                                <li id="changepass">Change password</li>
                                <li id="logout">Log out</li>
                                <li id="delete">Delete account</li>
                            </div>
                        </div>
                        <div class="actionwindow">
                            <div id="changepassword">
                                <form id="changepassform">
                                    <input type="hidden" name="name" value="<?php echo($name); ?>">
                                    <label>New password: <fieldset><input type="password" name="newpass" required><i class="fa-regular fa-eye"></i></fieldset></label>
                                    <label>Confirm new password: <fieldset><input type="password" name="confirmnewpass" required><i class="fa-regular fa-eye"></i></fieldset></label>
                                    <button type="button" onclick="formsubmission('changepassform', 'update.php', 'Password updated successsfully...')">Change</button>
                                </form>
                            </div>
                            <!-- <div id="logoutform"> -->
                                <form id="logoutform">
                                    <h5>Are you sure your want to logout</h5>
                                    <input type="hidden" name="name" value="<?php echo($name); ?>" required>
                                    <button type="button" id="cancellogout" onclick="minimize()"><i class="fa-solid fa-ban"></i> No</button>
                                    <br>
                                    <button type="button" id="confirmlogout" onclick="formsubmission('logoutform', 'logout.php', 'Logging out...')"><i class="fa-solid fa-triangle-exclamation"></i> Yes</button>
                                </form>
                                <br>
                            <!-- </div> -->
                            <!-- <div id="deleteform"> -->
                                <form id="deleteform">
                                    <h5>Are you sure your want to delete account?</h5>
                                    <input type="hidden" name="name" value="<?php echo($name); ?>" required>
                                    <button type="button" id="cancelDelete" onclick="minimize()"><i class="fa-solid fa-ban"></i> No</button>
                                    <br>
                                    <button type="button" id="confirmDelete" onclick="formsubmission('deleteform', 'delete.php', 'Account deleted successsfully... Redirecting...')"><i class="fa-solid fa-triangle-exclamation"></i> Yes</button>
                                </form>
                                <br>
                            <!-- </div> -->
                        </div>
                    </div>
                    <hr>
                    <div class="contactdeveloper">
                        <h3>Contact admin</h3>
                        <form id="commentsform">
                            <input type="hidden" name="name" value="<?php echo($name); ?>" required>
                            <textarea name="message" placeholder="Leave a note for the admin here" required></textarea>
                            <button type="button" onclick="formsubmission('commentsform', 'comments.php', 'Comments posted successfull...')">Send</button>
                        </form>
                    </div>
                </div>
            </section>
            <section class="email">
                <div class="list">
                    <h3>Email Lists</h3>
                    <label><input type="radio" name="email" id="info">info@biocharclimateresolution.org</label>
                    <label><input type="radio" name="email" id="official">official@biocharclimateresolution.org</label>
                    <label><input type="radio" name="email" id="admin">admin@biocharclimateresolution.org</label>
                </div>
                <div class="container">
                    <div class="head">
                        <button>Sent</button>
                        <button>Received</button>
                        <button>Compose</button>
                    </div>
                    <div class="compose">
                        <form id="emailform">
                            <h3>Fill in the following details to send the email</h3>
                            <label>From:
                                <select name="email" required>
                                    <option disabled="disabled">Choose an email to send from</option>
                                    <option value="info@biocharclimateresolution.org">info</option>
                                    <option value="admin@biocharclimateresolution.org">admin</option>
                                    <option value="official@biocharclimateresolution.org">official</option>
                                </select>
                            </label>
                            <label>To: <fieldset><input type="email" name="receiver" required></fieldset></label>
                            <label>Subject: <fieldset><input type="text" name="subj"></fieldset></label>
                            <label>Content: <textarea name="content" required></textarea></label>
                            <button type="button" onclick="formsubmission('emailform', 'sendmail.php', 'Email sent successfully...')">Send</button>
                        </form>
                    </div>
                </div>
            </section>
            <section class="members">
                <div class="list">
                <h3>Members</h3>
                    <ol>
                        <?php
                            $dsn = 'mysql:host=localhost;dbname=biocharc_YmlvY2hhcmRib25l';
                            $username = 'biocharc_admin_init';
                            $password = 'Bcr<>23@Ng&F';
                            // $dsn = 'mysql:host=localhost;dbname=biochar';
                            // $username = 'root';
                            // $password = '';
                            try {
                                $pdo = new PDO($dsn, $username, $password);
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $sql = "SELECT * FROM members";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($results as $row) {
                                    echo "<li>";
                                    print_r($row['firstname']." ".$row['lastname']); // Output each row as an associative array
                                    ?>
                                    <input type="hidden" name="id" value="<?php echo($row['memberId']); ?>">
                                    <?php
                                    echo "</li>";
                                }
                            } catch (PDOException $e) {
                                echo 'Database error: ' . $e->getMessage();
                            }
                        ?>
                    </ol>
                </div>
                <div class="container">
                    <div class="usercontent">
                        <div class="profileimage">
                            <i class="fa-solid fa-circle-user"></i>
                            <div class="bio">
                                <h3 class="fullname"></h3>
                                <h5 class="title"></h5>
                            </div>
                        </div>
                        <p class="profile"></p>
                        <a href=""></a>
                        <br><br>
                        <a href=""></a>
                    </div>
                </div>
            </section>
            <section class="editable-pages">
                
                <div class="container">
                    <h2>Upload File</h2>
                    <p>Update Gallery Images here</p>
                    <form id="uploadForm" enctype="multipart/form-data">
                        <input type="file" name="file" id="fileInput">
                        <button type="submit">Save</button>
                    </form>
                    <div id="message"></div>
                </div>
                <br>
                <div class="container">
                    <form id="faqs" method="post">
                        <h2>Update FAQs</h2>
                        <label>FAQ title:<fieldset><input type="text" name="faq-title" required></fieldset></label>
                        <br>
                        <label>Answer:<textarea placeholder="Input answer" name="answer" required></textarea></label>
                        <br>
                        <button type="button" onclick="formsubmission('faqs','addfaqs.php', 'Faqs updated...')">Sumbit</button>
                    </form>
                </div>
            </section>
            <section class="comments"></section>
            <section class="blog"></section>
            <section class="contact-details"></section>
            <section class="payments-received"></section>
        </div>
        
    </div>
    
<?php
}
?>
<script src="read.js"></script>
</body>
</html>
