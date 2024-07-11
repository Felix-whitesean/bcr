window.addEventListener("load", hideLoading);
function hideLoading(){
    loader = document.querySelector('.loadingBackground');
    body = document.querySelector('body');
    loader.style.display = "none";
    body.style.display = "block";
}
popupwindow = document.querySelector('.popup');
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section');

    function checkViewport() {
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            section.style.opacity= "0";
            section.style.display = "none";
            section.style.transition= "1s";
            section.style.animation = "flyin 1s normal ease-in-out";
            section.style.animationPlayState = "paused";

            if (sectionTop < windowHeight * 0.75) {
                setTimeout(function() {
                    section.style.transition= "3s";
                    section.style.opacity = "1";
                    section.style.display = "block";
                    section.style.animationPlayState = "running";
                }, 2000);
            }
        });
    }

    // Check viewport on page load and scroll
    checkViewport();
    window.addEventListener('scroll', checkViewport);
});
kenyaflag = document.querySelector(".top").querySelector(".topImage");
kenyaflag.addEventListener("click", function (){
    pop("Kenya, Africa", 3000);
});
joinToggle = document.getElementById('join');
floatingPage = document.querySelector('.floatingpage');
exitBtn = floatingPage.querySelector('i');
exitBtn.addEventListener('click', minimize)
joinToggle.addEventListener('click', toggling);
function toggling(){
    floatingPage.style.display = "initial";
    setTimeout(function() {
        floatingPage.style.width = "100%";
    }, 6);
}
function minimize(){
    floatingPage.style.width = "0";
    setTimeout(function() {
        floatingPage.style.display = "none";
    }, 1000);   
}
meta = document.querySelector('.meta');
hidden = document.querySelector('.hidden');
meta.addEventListener('click', dis);
function dis(){
    hidden.classList.toggle('show');
}
donate = document.querySelector('#donate');
floatingdonate = document.querySelector('.donate');
donate.addEventListener("click", warn);
floatingdonate.addEventListener("click", warn);

function warn(){
    donate.style.background = "red";
    pop("This function is coming soon", 3000);
}
forms = document.querySelectorAll("form");
forms.forEach( function (form){
    allinputs = form.querySelectorAll("input");
    allinputs.forEach(function (forminput){
        if(forminput.hasAttribute('required')){
            required = document.createElement("span");
            required.textContent = "*";
            required.style.color = "red";
            required.style.position = "absolute";
            required.style.marginLeft = "-10px";
            forminput.parentElement.appendChild(required);
        }
    })
})
function formsubmission(frmId, targetFile, successMessage) {
    var form = document.getElementById(frmId);
    var inputs = form.querySelectorAll('input')
    inputs.forEach(function (input){
        if(input.hasAttribute('required')){
            characters = input.value;
            var textArea = form.querySelector('textarea'); // Replace 'myTextArea' with the actual ID of your textarea

             // Use trim() to remove leading/trailing whitespace
            if(textArea){
                var textAreaValue = textArea.value.trim();
                if (textAreaValue == "") {
                    characters = "";
                    pop("Please enter value of textarea", 3000);
                    textArea.focus();
                    return;
                }
            }
            if(input.type == "checkbox"){
                if(!input.checked){
                    characters = "";
                    pop("Please enter and check the required boxes", 3000);
                    input.focus();
                    return;
                }
            }
            if(characters==""){
                successMessage = "Please enter all the required details";
                frmId = 0;
                targetFile = "null";
                input.style.borderColor = "red";
                input.focus();
                pop(successMessage, 3000);
                return;
            }
        }
        input.style.borderColor = "initial";
    })
    var formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', targetFile, true);
    xhr.responseType = 'text';
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Display response from PHP (for testing)
                if(xhr.responseText == 1){
                    pop(successMessage, 6000);
                    minimize();
                    form.reset();
                }
                else{
                    pop(xhr.responseText, 6000);
                }
            } 
            // else {
            //     setTimeout(function() {
            //         pop("Error in submiting comments!, enter the required fields and try again", 6000);
            //     },2000);
            // }
        }
    };
    xhr.send(formData);
}

function pop(txt, timeout){
    popupwindow.textContent = txt;
    popupwindow.style.display = "initial";
    setTimeout(function () {
        popupwindow.style.display = "none";
    }, timeout);
}
window.addEventListener('load', function(){
    navLinks = document.querySelector('nav').querySelectorAll('a');
    var cur = window.location.href;
    
    // first = document.querySelector('.first');
    for(i=0; i<navLinks.length; i++){
        if(cur == navLinks[i].href){
            navLinks[i].style.border = "1px solid";
            navLinks[i].style.color = "var(--green)";
            navLinks[i].style.boxShadow = "1px 1px 3px var(--green) inset, -1px -1px 3px var(--green) inset";
        }
    }
    hambugher = document.querySelector('.bars');
    nav = document.querySelector('.navigation');
    hambugher.addEventListener("click", toggle);
    function toggle(){
        hambugher.querySelector('i').classList.toggle('fa-circle-xmark');
        nav.classList.toggle('navDisplay');
    }
})
const slider = document.querySelector('.scrolling-container');
// const prevBtn = document.getElementById('prev');
// const nextBtn = document.getElementById('next');

let slideIndex = 0;
const slides = slider.querySelectorAll('.scrolling-item');
indicator = document.querySelector('.indicator');
slides.forEach( function(){
    indicate = document.createElement('span');
    indicator.appendChild(indicate);
})
indicators = indicator.querySelectorAll('span');

indicators[0].style.background = "var(--white)";
indicators[0].style.transform = "scale(1.2)";
function showSlide(index) {
    slider.style.transition= "3s eas-in-out"
    slider.style.transform = `translateX(-${index * 100}%)`;
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
    indicating();
}
function indicating(){
    for(i = 0;i < indicators.length; i++){
        if(i == slideIndex){
            indicators[i].style.backgroundColor = "var(--white)";
            indicators[i].style.transition = "1s";
            indicators[i].style.transform = "scale(1.2)";
        }
        else{
            indicators[i].style.backgroundColor = "rgb(0, 0, 0, .7)";
            indicators[i].style.transition = "1s";
            indicators[i].style.transform = "scale(1)";
        }
    }
}
let autoPlayInterval;
function startAutoPlay() {
    autoPlayInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
}
startAutoPlay();

faqs = document.querySelector(".faqs").querySelector(".cont").querySelectorAll("li");
faqs.forEach( function(faq){
     h3 = faq.querySelector("h3");
    h3.addEventListener("mouseenter", function(){
        faq.querySelector("p").style.display = "initial";
        h3.querySelector("span").style.textWrap = "wrap";
        h3.querySelector("i").style.transform = "rotate(90deg)";
    });
    h3.addEventListener("mouseleave", function(){
        faq.querySelector("p").style.display = "none";
        h3.querySelector("span").style.textWrap = "nowrap";
        h3.querySelector("i").style.transform = "rotate(0)";
    });
})
