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
window.addEventListener('load', function(){
    navLinks = document.querySelector('nav').querySelectorAll('a');
    var cur = window.location.href;
    
    // first = document.querySelector('.first');
    for(i=0; i<navLinks.length; i++){
        if(cur == navLinks[i].href){
            navLinks[i].style.borderTop = "1px solid";
            navLinks[i].style.borderBottom = "1px solid";
            navLinks[i].style.color = "var(--white)";
        }
    }
});