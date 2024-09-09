<?php
    session_start();
    $_SESSION['last_activity'] = time();
    $name = $_SESSION['uname'] ?? '';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Inter:wght@100..900&family=Miltonian&family=Sevillana&display=swap" rel="stylesheet">    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <!-- <link rel="icon" href="https://biocharclimateresolution.org/logo.png"> -->
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"href="/css/app-wa-d53d10572a0e0d37cb8d614a3f177a0c.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet"href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <link rel="icon" href="https://biocharclimateresolution.org/f1.png">
    <meta name="theme-color" content="rgb(22, 110, 22)">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="container1">
    <div class="popup">
        <h5></h5>
        <p></p>
        <div class="progressbox"></div>
    </div>

</div>
    <?php
    if(!$name){
        ?>
        <div class="login">
            <form id="login" method="post">
                <div class="input-container">
                    <div class="title">
                        <img src="finalicon.png" alt="">
                        <h3>Account Login</h3>
                    </div>
                    <fieldset>
                        <label for="adName"><i class="fa-regular fa-user"></i></label>
                        <input type="text" name="adName" id="adName" placeholder="Username" required>
                    </fieldset>
                    <fieldset>
                        <label for="password"><i class="fa-light fa-lock"></i></label>
                        <input type="password" id="password" name="adPass" placeholder="Password" required>
                        <i onclick="switchinput(this)" class="fa-regular fa-eye"></i>
                    </fieldset>
                    <button type="button" onclick="formsubmission('login','login.php', 'Sign in successful...', 0)">Submit</button>
                </div>
                <br>
                <a onclick="popup('Enter email', '3000')">Forgot password</a>
            </form>
        </div>
        <?php
    }else{
        ?>
    <div class="loadingBackground">
        <div class="loading"></div>
    </div>
    <div class="template">
        <section class="navigation">
            <div class="left">
                <div class="name">
                    <div class="logo">
                        <!-- <img src="https://biocharclimateresolution.org/ff.png" alt=""> -->
                        <a href="https://biocharclimateresolution.org" target="_blank" title="visit home page"><img src="f1.png" alt=""></a>
                    </div>
                    <div class="acronym">
                        <p>BCR | Menu</p>
                    </div>
                </div>
                <hr>
                <nav class="topics">
                    <li title="Email"><i class="fa-solid fa-envelope"></i> </li>
                    <li title="Members"><i class="fa-solid fa-user-group"></i> </li>
                    <li title="Comments"><i class="fa-regular fa-comments"></i> </li>
                    <li title="Contact Details"><i class="fa-regular fa-address-card"></i> </li>
                    <li title="Editable pages"><i class="fa-solid fa-file-pen"></i> </li>
                    <li title="Blog"><i class="fa-regular fa-newspaper"></i> </li>
                    <li title="Payments received"><i class="fa-solid fa-sack-dollar"></i> </li>
                    <div class="actionbtn">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </nav>
            </div>  
        </section>
        <div class="right">
            <section class="landing">
                <i class="fa-solid fa-circle-arrow-left"></i>
                <div class="floatingheader">
                    <a href="https://biocharclimateresolution.org" target="_blank" title="visit home page"><img src="f1.png" alt=""></a>
                    <h4>BCR - Dashboard</h4>
                </div>
                <div class="userprofiledisplay" title="<?php echo($_SESSION['uname']); ?>">
                    <img src="https://www.pngall.com/wp-content/uploads/12/Avatar-Profile-PNG-Photos.png" alt="IMAGE">
                    <h6><?php echo($_SESSION['uname']); ?></h6>
                </div>
            </section>
            <section class="landingprofile">
                <div class="landingprofilecontainer">
                    <div class="accounttemplate">
                        <div class="account">
                            <div class="profileimage">
                                <i class="fa-solid fa-circle-user"></i>
                                Account settings
                            </div>
                            <!-- <hr> -->   
                            <div class="settings">
                                <li id="changepass">Change password</li>
                                <hr>
                                <li id="logout">Log out</li>
                                <hr>
                                <li id="delete">Delete account</li>
                            </div>
                        </div>
                        <div class="actionwindow">
                            <div id="changepassword">
                                <form id="changepassform">
                                    <input type="hidden" name="name" value="<?php echo($name); ?>">
                                        <fieldset>
                                            <label for="newpass"><i class="fa-solid fa-key"></i></label>
                                            <input type="password" id="newpass" name="newpass" placeholder="Enter new password"required>
                                            <i onclick="switchinput(this)" class="fa-regular fa-eye"></i>
                                        </fieldset>
                                    <fieldset>
                                        <label for="newpassconfirm"><i class="fa-solid fa-key"></i></label>
                                        <input type="password" id="newpassconfirm" name="confirmnewpass" placeholder="Confirm new password" required>
                                        <i onclick="switchinput(this)" class="fa-regular fa-eye"></i>
                                    </fieldset>
                                    <button type="button" onclick="formsubmission('changepassform', 'update.php', 'Password updated successsfully...')">Change</button>
                                    <button onclick="minimize(this)">Cancel</button>
                                </form>
                            </div>
                            <!-- <div id="logoutform"> -->
                                <form id="logoutform">
                                    <h5>Are you sure your want to logout</h5>
                                    <input type="hidden" name="name" value="<?php echo($name); ?>" id="lof" required>
                                    <button type="button" id="cancellogout" onclick="minimize(this)"><i class="fa-solid fa-ban"></i> No</button>
                                    <br>
                                    <button type="button" id="confirmlogout" onclick="formsubmission('logoutform', 'logout.php', 'Logging out...')"><i class="fa-solid fa-triangle-exclamation"></i> Yes</button>
                                </form>
                                <br>
                            <!-- </div> -->
                            <!-- <div id="deleteform"> -->
                                <form id="deleteform">
                                    <h5>Are you sure your want to delete account?</h5>
                                    <input type="hidden" name="name" value="<?php echo($name); ?>" required>
                                    <button type="button" id="cancelDelete" onclick="minimize(this)"><i class="fa-solid fa-ban"></i> No</button>
                                    <br>
                                    <button type="button" id="confirmDelete" onclick="formsubmission('deleteform', 'delete.php', 'Account deleted successsfully... Redirecting...')"><i class="fa-solid fa-triangle-exclamation"></i> Yes</button>
                                </form>
                                <br>
                            <!-- </div> -->
                        </div>
                    </div>
                    <hr>
                    <div class="contactdeveloper">
                        <form id="commentsform">
                            <h5>Contact admin</h5>
                            <input type="hidden" name="name" value="<?php echo($name); ?>" required>
                            <textarea name="message" placeholder="Leave a note for the admin here" required></textarea>
                            <button type="button" onclick="formsubmission('commentsform', 'comments.php', 'Comments posted successfull...')"><i class="fa-duotone fa-paper-plane-top fa-2x"></i></button>
                        </form>
                        <div class="admin-contact">
                            <li><a href="tel:+254712345678" target="_blank"><i class="fa-duotone fa-phone fa-2x"></i></a></li>
                            <br>
                            <li><a href="https://wa.me/+254012345678" ><i class="fa-brands fa-whatsapp fa-2x"></i></a></li>
                        </div>
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
            <section class="comments">

            </section>
            <section class="blog"></section>
            <section class="contact-details">
                <div class="contact-container">
                    <h5>Contact details</h5>
                    <form action="">
                        <fieldset>
                            <label for="phn"><i class="fa-solid fa-phone"></i></label>
                            <input type="text" name="phone" id="phn">
                        </fieldset>
                        <fieldset>
                            <label for="env"><i class="fa-solid fa-envelope"></i></label>
                            <input type="email" name="email" id="env">
                        </fieldset>
                        <fieldset>
                            <label for="ln"><i class="fa-brands fa-linkedin"></i></label>
                            <input type="url" name="linkedin" id="ln">
                        </fieldset>
                        <fieldset>
                            <label for="x"><i class="fa-brands fa-x-twitter"></i></label>
                            <input type="url" name="x" id="x">
                        </fieldset>
                        <fieldset>
                            <label for="fb"><i class="fa-brands fa-facebook"></i></label>
                            <input type="url" name="facebook" id="fb">
                        </fieldset>
                        <button type="button" onclick="">Change details</button>
                    </form>
                </div>
            </section>
            <section class="payments-received"></section>
        </div>
        
    </div>
    
<?php
}
?>
<script src="read.js"></script>
</body>
</html>
