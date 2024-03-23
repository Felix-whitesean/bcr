<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email template</title>
    <link rel="icon" href="https://biocharclimateresolution.org/ff.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Itim&family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="email content">
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
                /* background-image: url(logo1.png); */
                background-blend-mode: color;
                background-color: rgb(244, 228, 215, .99);
            }
            .logo{
                text-align: center;
                width: 100%;
                display: flex;
                gap: 20px;
                flex-wrap: wrap;
            }
            .logo img{
                width: 50px;
                height: 50px;
                align-self: flex-start;
            }
            .logo h1{
                color: var(--secondary-background);
                align-self: flex-start;
                font-family: var(--title-text);
                border-bottom: 2px solid;
                font-size: 23px;
            }
            .body{
                width: 50%;
                min-width: 300px;
                background: rgb(240, 240, 240);
                box-shadow: 2px 2px 5px rgb(20, 117, 20);
                border: 1px solid black;
                margin: auto;
                padding: 10px 20px;
                margin-bottom: 50px;
            }
            .body h4{
                color: var(--secondary-background);
            }
            .body p{
                color: black;
                font-family: var(--normal-text);
            }
            .footer{
                position: absolute;
                width: 100%;
                bottom: 0;
                font-family: var(--medium-text);
                background: var(--footer-background);
            }
            .socials{
                background: rgb(0, 0, 0, .65);
                padding: 10px 30px;
                color: var(--primary-background);
                display: flex;
                position: relative;
                justify-content: space-around;
                flex-wrap: wrap;
                letter-spacing: 1.5px;
            }
            .socials .icons{
                align-self: center;
                display: flex;
                gap: 20px
            }
            .socials .icons a{
                color: var(--primary-background);
                align-self: center;
            }
            .socials .icons a i{
                font-size: 32px;
            }
            .footer .web a{
                color: var(--secondary-background);
                font-family: var(--normal-text);
            }
            @media only screen and (max-width:878px){
                .footer .socials  h4{
                    display: none;
                }
                .footer{
                    position: initial;
                }
            }
        </style>
        <div class="logo">
            <img src="https://biocharclimateresolution.org/ff.png" ALT="logo">
            <h1>Biochar Climate Resolution (BCR)</h1>
        </div>
        <div class="body">
            <h4>Information desk</h4>
            <p>
                <span><a href="https://biocharclimatereoslution.org">Biochar Climate Resolution (BCR)</a>
                   is a Kenyan based company that aims to curb the effects of air pollution in the biochar industry.
                   The company is currently undertaking projects in both Kenya and Uganda, in selected places. After the trial
                    phase, the company aims to scale to the entire country. <br>
                    The company however, needs the input from various stakeholders.
                </span>
                <br><br>
                <span>Regards BCR;</span>
            </p>
        </div>
        <div class="footer">
            <div class="socials">
                <div class="icons">
                    <h4>More updates: </h4>
                    <a href="https://www.linkedin.com/in/biochar-climate-resolution-8523522a1/" target="_blank" title="LinkedIn | Biochar Climate (Company) Resolution">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href="https://www.x.com/" target="_blank" title="X | Biochar Climate (Company) Resolution">
                        <i class="fa-brands fa-square-x-twitter"></i>
                    </a>
                </div>
                <div class="web">
                    <a href="https://biocharclimateresolution.org" title="biochar climate resolution">Visit our website for more information</a>
                    <br><br>
                    Or send an Email to us: <a href="mailto:info@biocharclimateresolution.org">info@biocharclimateresolution.org</a>
                </div>
            </div> 
        </div> 
    </div>
</body>
</html>