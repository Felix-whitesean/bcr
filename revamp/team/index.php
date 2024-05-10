<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCR | Team</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Inter:wght@100..900&family=Miltonian&family=Sevillana&display=swap" rel="stylesheet">    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ff.png">
    <meta name="theme-color" content="rgb(22, 110, 22)">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="loadingBackground">
        <div class="loading"></div>
        <div class="constant"><img src="../ff.png" alt="LOADING"></div>
    </div>
    <div class="template">
        <div>
            <div class="popup"></div>
        </div>
        <section class="navigation">
            <div class="left">
                <div class="name">
                    <div class="logo">
                        <img src="../ff.png" alt="">
                    </div>
                    <div class="acronym">
                        BCR
                    </div>
                </div>
                <hr>
                <nav class="topics">
                    <a href="https://biocharclimateresolution.org/revamp/">Home</a>
                    <a href="https://biocharclimateresolution.org/revamp/team/">Team <i class="fa-solid fa-angle-right"></i></a>
                    <a href="#blog">Blogs section <i class="fa-solid fa-angle-right"></i></a>
                    <a href="#about">About us <i class="fa-solid fa-angle-right"></i></a>
                </nav>
            </div>
            
            <div class="follow">
                <!-- <h5>Follow us:</h5> -->
                <div class="social">
                    <a href="https://twitter.com" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="https://www.linkedin.com/in/biochar-climate-resolution-8523522a1/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </section>
        <section class="view-window">
            <div class="top">
                <a href="https://wa.me/+256760493770" target="_blank"><button><i class="fa-brands fa-whatsapp"></i> Chat with us</button></a>
                <button class="donate"><i class="fa-solid fa-circle-dollar-to-slot"></i> Donate here</button>
                <a href="tel:0712345678"><i class="fa-solid fa-phone-volume"></i>  Call us now!</a>
                <img width="26px" height="26px"src="../5077.jpg" class="topImage">
            </div>
            <div class="container">
                <div class="usercontent">
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
                                    ?>
                                    <li>                    
                                    <div class="profileimage">
                                        <i class="fa-solid fa-circle-user"></i>
                                        <div class="bio">
                                            <h3 class="fullname"><?php print_r($row['firstname']." ".$row['lastname']); ?></h3>
                                            <h5 class="title"><?php print_r($row['title']);?></h5>
                                        </div>
                                    </div>
                                    <p class="profile"><?php print_r($row['userprofile']);?></p>
                                    <a href="tel:<?php print_r($row['whatsapp']);?>"><?php print_r($row['whatsapp']);?></a>
                                    <br><br>
                                    <a href="mailto:<?php print_r($row['email']);?>"><?php print_r($row['email']);?></a>
                                    </li>
                                    <?php
                                }
                            } catch (PDOException $e) {
                                echo 'Database error: ' . $e->getMessage();
                            }
                        ?>
                    </ol>
                </div>
            </div>
            <?php
                include("../footer.html");
            ?>
        </section>
        <script src="team.js"></script>
</body>
</html>