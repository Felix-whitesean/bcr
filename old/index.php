<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biochar Climate Resolution</title>
    <meta name="description" content="Biochar Climate Resolution">
    <meta name="keywords" content="Biochar, climate, green, climate change, busia, Biochar climate resolution">
    <meta name="author" content="felix">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Itim&family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="ff.png">
    <meta name="theme-color" content="rgb(22, 110, 22)">
</head>
<body>
    <div class="loadingBackground">
        <div class="loading"></div>
        <div class="constant"><img src="ff.png" alt="LOADING"></div>
    </div>
    <div class="bodycontent">
        <?php
            include('head.html');
        ?>
        <div class="landing">
            <div class="landingContent">
                <h1>Biochar Climate Resolution Services</h1>
                <p>Biochar Climate Resolution (BCR), a Kenyan-based company, addresses the climate crisis by focusing on Net-Zero planning and 
                rapid carbon dioxide removal (CDR) to meet world's climate goals by 2050. BCR emphasizes the urgent need to curb greenhouse gas 
                emissions and simultaneously remove carbon at scale, creating a carbon-negative society. The company operates in the biochar industry, 
                producing products with the potential to sequester CO₂ for centuries. BCR's efforts extend beyond being a carbon sink, recognizing nature's 
                multifaceted functions essential for life on Earth. By deploying biochar products, BCR aims to store CO₂ for extended periods, contributing 
                to a net-negative emissions world. The company is actively involved in reducing short-lived climate pollutants, such as methane and black carbon, 
                addressing both climate change and air pollution. BCR's overarching philosophy is to minimize human interference in the climate system while 
                catalyzing sustainable solutions for a resilient and climate-responsible future in Kenya.</p>
            </div>
        </div>
        <hr>
        <div class="functions">
            <div class="functionsTitle">What we do</div>
            <div class="functionsContent">
                <div class="function1">
                    <div class="function1Image"></div>
                    <div class="function1Title">
                        Weeds and Prunings
                    </div>
                    <div class="function1Text">
                        Green vegetation types can be utilized to produce biochar, a carbon-rich material obtained through the process of pyrolysis.
                        <br><br> Pyrolysis involves heating biomass in the absence of oxygen, converting it into biochar while also producing bioenergy.
                    </div>
                    <div class="function1Image2"></div>
                </div>

                <div class="function2">
                    <div class="function2Image"></div>
                    <div class="function2Title">
                        Biochar Production from Weeds and Prunings
                    </div>
                    <div class="function2Text">
                    This shows resultant biochar products made of weeds and prunings that can be used as organic manure. 
                    It acts as a stable carbon source, enhancing soil structure, nutrient retention, and microbial activity.
                    <br><br> Compacting this biochar into pellets increases convenience for application. 
                    These pellets can be spread across the soil surface as shown in the next frame.
                    </div>
                </div>

                <div class="function3">
                    <div class="function3Image"></div>
                    <div class="function3Title">
                        Biochar Application
                    </div>
                    <div class="function3Text">
                        The prepared biochar are then applied as a top layer around plants as demonstrated. Its application has profound impacts on soil health, plant growth, and environmental sustainability.
                    </div>
                    <div class="function3Image2"></div>
                </div>
            </div>
        </div>
        <hr>
        <div class="sectionBTitle">
            <div class="title"></div>
        </div>
        <div class="excerpts">
            <div class="scrolling">
                <div class="imageSlidesContainer">
                    <div class=".scrolling-item">
                        <div class="slideTitle">
                            Biochar Climate Resolution Objectives:
                        </div>
                        <li>To build biochar industry in Kenya for climate resilience and create more sustainable future for the posterity</li>
                        <li>To curb CO₂ emissions</li>
                        <li>To advance agricultural and forestry biomass utilization on carbon sequestration production</li>
                    </div>
                    <div class=".scrolling-item">
                        <div class="slideTitle">
                            Our focus strategies to Net Zero:
                        </div>
                        <div class="image1 txt">
                            Biochar Climate Resolution has committed to an ambitious Net Zero target by 2050. To help realize these goals, 
                            Biochar Climate is delivering a range of Net Zero solutions that will have an impact on the large-scale change the planet needs.
                        </div>
                        <div class="image2 txt">
                            Biochar Climate Resolution has developed a vision for where we need to be in 15 years to ensure our Net Zero target
                            for 2050 is achievable. Climate change is one of the biggest threats facing our planet today, so our future must be sustainable.
                        </div>
                        <div class="image3 txt">
                            Sustainable innovation that produces environmental and economic impacts is essential, and therefore we are creating initiatives and delivering 
                            programs to support businesses and farming to decarbonize, reduce waste, increase organic fertilizer and build resilient, low carbon supply chains.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr  id="mission">
        <div class="companydetails">
            <div class="mission">
                <div class="missionTitle">Mission</div>
                <hr>
                <div class="missionStatement">
                Our mission is to accelerate durable Carbon Dioxide Removal (CDR) with permanence over 100 years.
                </div>
            </div>
            <div class="vision">
                <div class="visionTitle">Vision</div>
                <hr>
                <div class="visionStatement">
                    An atmosphere that enables people and the planet to thrive - stabilizing the climate with warming limited to 1.5 ⁰C and drastically reduced air pollution.            
                </div>
            </div>
        </div>
        <hr>
        <?php
            include('footer.html');
        ?>
    </div>
    <script>
        window.addEventListener("load", hideLoading);
        slides = document.querySelector('.slides2').querySelectorAll('.txt');
        console.log(slides);

        let slideIndex = 0;
        function hideLoading(){
            loader = document.querySelector('.loadingBackground');
            body = document.querySelector('.bodycontent');
            loader.style.display = "none";
            body.style.display = "initial";
        }
        const slider = document.querySelector('.scrolling');
        // itemcontainer2 = document.querySelector('.slides2');

        function showSlide(index) {
            slider.style.transition= "3s eas-in-out"
            slider.style.transform = `translateX(-${index * 50}%)`;
        }

        // Function to go to the previous slide
        function prevSlide() {
            slideIndex = (slideIndex - 1 + slides.length) % slides.length;
            showSlide(slideIndex);
            indicating();
        }

        // Function to go to the next slide
        function nextSlide() {
            slideIndex = (slideIndex + 1) % slides.length;
            showSlide(slideIndex);
        }

        imageSlidesContainers = document.querySelectorAll('.imageSlidesContainer');
        for(i=0; i<imageSlidesContainers.length; i++){
            imageSlidesContainers[i].addEventListener("wheel",function(event){
                itemcontainer1.scrollLeft += 0;
                console.log(itemcontainer1);
            });
        }
    </script>
</body>
</html>