<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biochar | Team</title>
    <link rel="stylesheet" href="team.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Itim&family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="ff.png">
    <meta name="theme-color" content="rgb(22, 100, 22)">
</head>
<body>
    
    <?php
        include('head.html');
    ?>
    <div class="pagecontent">
        <div class="section1Title">
            BCR | Team
        </div>
        <div class="team">
            <div class="teamNames">
                <div class="teamTitle">
                    Meet the team
                </div>
                <div class="names">
                <?php
                $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');

                if(mysqli_connect_errno()){
                    echo"Failed to connect: ".mysqli_connect_error();
                }

                $sql = "SELECT firstname, lastname, title, joined_at, userprofile, whatsapp, linkedIn FROM members ORDER BY firstname";

                $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $title = $row['title'];
                    $joined_at = $row['joined_at'];
                    $comment = $row['userprofile'];
                    $whatsapp = $row['whatsapp'];
                    $linkedinurl = $row['linkedIn'];

                    ?>
                    <span class="mname">
                        <div class="membernames"><?php echo($firstname. "  " .$lastname) ?></div>
                        <div style = "display: none;" class="ctitle"><?php echo($title);?></div>
                        <div style = "display: none;" class="join"><?php echo($joined_at);?></div>
                        <div style = "display: none;" class="aboutDetails"><?php echo($comment);?></div>
                        <div style = "display: none" class="wh"><?php echo($whatsapp);?></div>
                        <div style = "display: none;" class="li"><?php echo($linkedinurl);?></div>
                    </span>
                    <hr>
                    <br>
                    <?php
                }
            }
                ?>
                </div>
            </div>
            <div class="profile">
                <div class="head">
                    <div class="profileTitle">Personal Profile</div>
                    <div class="personName">
                        <i class="fa-solid fa-circle-user"></i>
                        <p></p>
                    </div>
                </div>
                <div class="personaldetails">
                    <div class="persontitle">Title: <p></p></div>
                    <div class="joined">Joined: <p></p></div>
                </div>
                <div class="aboutPerson"> <p>Click on the person on the left to view their profile here</p> </div>
                <hr>
                <div class="personalSocials">
                    <a target="_blank" title="Whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
                    <a target="_blank" title="LinkedIn | Biochar Climate (Company) Resolution"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <hr id="about">
        <div class="about">
            <div class="aboutTitle">
                BCR |About us
            </div>
            <div class="aboutcontent">
                <img class="aboutimage" src="1705993663049.jpeg">
                <div class="aboutText">
                    <p>
                        The aim of organization is to capture up to 1,000 tons of CO2 per year using (Biochar). We want to tackle worsening effects of climate change in L. Victoria region. We are emphasizing the need for impactful climate solutions. We intend to work on a solution that actually has a meaningful, scaled impact on climate change, to actually make a dent on this.”
                        The organization has an ambitious goal of removing millions of CO2 tons by 2035, subject to considerable scale up challenge. The organization plans to triple this capture capacity each year over the next 12 years to reach that goal.  
                    </p>
                    <h1>OUR WORK</h1>
                    Catalyzing pragmatic solutions for climate change:

                    <h3>Pollution</h3>
                    Our task is to reduce climate change by applying an overwhelming amount of force to some of the biggest levers to reduce carbon and other climate-warming emissions through biochar application regenerative agriculture systems.

                    Through nature based innovation, and thought leadership, Biochar Climate Resolution drives impact to prevent catastrophic climate change through pragmatic solutions of biochar tool in regenerative agriculture.

                    <h3>Carbon Capture</h3>
                    BCRs work in carbon capture aims to achieve global net-zero emissions by mid-century.

                    BCR works towards this goal by rapidly accelerate the adoption of biochar capture technologies to prevent the emission of millions of tons of CO₂ from farming, livestock, pit latrines power generation and industrial sources in Kenya.

                    <h1>Our efforts:</h1>
                    The amount of carbon dioxide released in Kenya from livestock -related activities is 92 percent, mainly via entric farmentation (20.8Mt CO2eq or 55 percentage and manure left on pasture (13.6MtCo2eq or 36.9 percent) (WRI CAIT 2.0.2017).We propose to wide scale adaption of biochar applications in livestock feeds ,compost manures and in agriculture farming to prevent CO2 from being released from these emitter sources and to capture CO2 emissions from the atmosphere and bury permanently in farms in doing so we build healthy soils that produce healthy food for large population.


                </div>
            </div>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>

    <script>
        members = document.querySelectorAll('.mname');
        personName = document.querySelector('.personName');
        title = document.querySelector('.persontitle');
        joined = document.querySelector('.joined');
        aboutPerson = document.querySelector('.aboutPerson');
        socials = document.querySelector('.personalSocials');
        for(i = 0; i<members.length; i++){
            members[i].querySelectorAll('div')[0].style.color = "rgb(0, 50, 50)";
            members[i].addEventListener("click", display);
        }
        function display(event){
            personName.querySelector('p').textContent = event.target.parentElement.querySelector('.membernames').textContent;
            title.querySelector('p').textContent = event.target.parentElement.querySelector('.ctitle').textContent;
            joined.querySelector('p').textContent = event.target.parentElement.querySelector('.join').textContent;
            aboutPerson.querySelector('p').textContent = event.target.parentElement.querySelector('.aboutDetails').textContent;
            socialLinks = socials.querySelectorAll('a');
            for(i = 0; i<socialLinks.length; i++){
                socialLinks[0].href = "https://wa.me/"+event.target.parentElement.querySelector('.wh').textContent;
                socialLinks[1].href = event.target.parentElement.querySelector('.li').textContent;
            }
            for(i = 0; i<members.length; i++){
                members[i].querySelectorAll('div')[0].style.color = "rgb(0, 50, 50)";
            }
            event.target.style.color = "rgb(255, 255, 197)";
        }
    </script>
</body>