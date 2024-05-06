<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCR | Dashboard</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Inter:wght@100..900&family=Miltonian&family=Sevillana&display=swap" rel="stylesheet">    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="ff.png">
    <meta name="theme-color" content="rgb(22, 110, 22)">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="loadingBackground">
        <div class="loading"></div>
        <div class="constant"><img src="../ff.png" alt="LOADING"></div>
    </div>
    <div class="template">
        <section class="navigation">
            <div class="left">
                <div class="name">
                    <div class="logo">
                        <img src="../bcrLogo.png" alt="">
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
                            <div class="profileimage"><i class="fa-solid fa-circle-user"></i></div>
                            <div class="settings">
                                <li id="changepass">Change password</li>
                                <li id="logout">Log out</li>
                                <li id="delete">Delete account</li>
                            </div>
                        </div>
                        <div class="actionwindow">
                            <form id="changepassform">
                                <input type="hidden" value="<?php echo($id); ?>">
                                <label>New password: <fieldset><input type="password" name="newpass"></fieldset></label>
                                <label>Confirm new password: <fieldset><input type="password" name="confirmnewpass"></fieldset></label>
                                <button type="button">Change</button>
                            </form>
                            <form id="logoutform">
                                <input type="hidden" value="<?php echo($id); ?>">
                                <h5>Are you sure your want to logout</h5>
                                <button type="button" id="confirmlogout"> Yes</button>
                                <br>
                                <button type="button" id="cancellogout"> No</button>
                            </form>
                            <form id="deleteform">
                                <input type="hidden" value="<?php echo($id); ?>">
                                <h5>Are you sure your want to delete account?</h5>
                                <button type="button" id="confirmDelete"> Yes</button>
                                <br>
                                <button type="button" id="cancelDelete"> No</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="contactdeveloper">
                        <h3>Contact admin</h3>
                        <form>
                            <textarea name="message" placeholder="Leave a note for the admin here" required></textarea>
                            <button type="button">Send</button>
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
                        <form method="POST">
                            <h3>Fill in the following details to send the email</h3>
                            <label>From: <fieldset><input type="email" id="selectedmail" name="from" placeholder ="Please select email in the Left" required disabled></fieldset></label>
                            <label>To: <fieldset><input type="email" name="receiver" required></fieldset></label>
                            <label>Subject: <fieldset><input type="text" name="subj"></fieldset></label>
                            <label>Content: <textarea name="content" required></textarea></label>
                            <button type="button">Send</button>
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
            <section class="editable-pages"></section>
            <section class="comments"></section>
            <section class="blog"></section>
            <section class="contact-details"></section>
            <section class="payments-received"></section>
        </div>
        
    </div>
    <script src="read.js"></script>
</body>
</html>