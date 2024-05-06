window.addEventListener("load", hideLoading);
function hideLoading(){
    loader = document.querySelector('.loadingBackground');
    body = document.querySelector('.template');
    loader.style.display = "none";
    body.style.display = "flex";    
}
emailButtons = document.querySelector('.email').querySelector('.head').querySelectorAll('button');
list = document.querySelector(".topics").querySelectorAll("li");
for(i = 0; i < list.length; i++){
    list[i].style.color = "var(--white)";
    list[i].addEventListener("click", clicked)
    function clicked(event){
        document.querySelector(".landingprofile").style.display = "none";
        arrowLeft = document.querySelector(".floatingheader").querySelector("i");
        arrowLeft.style.display = "initial";
        arrowLeft.addEventListener("click", function(){
            for(i = 0; i<list.length; i++){
                list[i].style.color = "var(--white)";
                list[i].style.paddingLeft= "0";
                document.querySelector("."+list[i].textContent.toLowerCase().replace(" ", "-")).style.display = "none";
                document.querySelector("."+list[i].textContent.toLowerCase().replace(" ", "-")).style.width = "0";
                document.querySelector(".landingprofile").style.display = "block";
                arrowLeft.style.display = "none";
                return;
            }
        });
        for(i = 0; i<list.length; i++){
            list[i].style.color = "var(--white)";
            list[i].style.paddingLeft= "0";
            document.querySelector("."+list[i].textContent.toLowerCase().replace(" ", "-")).style.display = "none";
            document.querySelector("."+list[i].textContent.toLowerCase().replace(" ", "-")).style.width = "0";
        }
        event.target.style.color = "var(--brown)";
        event.target.style.paddingLeft= "12px";
        toDisplay = document.querySelector("."+event.target.textContent.toLowerCase().replace(" ", "-"));
        if(toDisplay.className == "email"){
            emailButtons[2].classList.add("clicked");
        }
        toDisplay.style.display = "flex";
        setTimeout(function() {
            toDisplay.style.width = "100%";
        }, 1);
    };
}
function listenClick(){
    for(i = 0; i < emailButtons.length; i++){
        emailButtons[i].addEventListener("click", function(event){
            for(i = 0; i < emailButtons.length; i++){
                emailButtons[i].classList.remove("clicked");
            }
            event.target.classList.add("clicked");
        })
    }
}
actionBtns = document.querySelector(".settings").querySelectorAll("li");

for(i = 0; i < actionBtns.length; i++){
    actionBtns[i].addEventListener("click", listenClick);
}
function listenClick(btn){
    for(i = 0; i < actionBtns.length; i++){
        document.getElementById(actionBtns[i].id+"form").style.display = "none";
    }
    document.getElementById(btn.target.id+"form").style.display = "flex";
}
// Get all radio buttons by name
var radioButtons = document.querySelector(".email").querySelectorAll('input[type="radio"][name="email"]');
// Loop through each radio button and add an event listener
radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('change', function() {
        // Check if the radio button is checked
        if (this.checked) {
            var target = document.getElementById("selectedmail");
            target.value = this.parentElement.textContent;
        }
    });
});
members = document.querySelector(".members").querySelector(".list").querySelectorAll("li");
members.forEach(function(user){
    user.addEventListener('click', function(){
            // Use AJAX to call the PHP function
        var hiddeninput = user.querySelector("input");
        // var words = username.split(' ');
        var username = user.textContent;
        var memberId = hiddeninput.value;
        $.ajax({
            url: 'view.php',
            type: 'POST',
            data: { memberIdNo: memberId},
            success: function(response) {
                var x = response;
                var title  = x.split('%&%')[0];
                var email = x.split('%&%')[1];
                var about = x.split('%&%')[2];
                var whatsapp = x.split('%&%')[3];
                var profilecontainer = document.querySelector(".members").querySelector('.container');
                profilecontainer.querySelector(".fullname").textContent = username;
                profilecontainer.querySelector(".title").textContent = title;
                profilecontainer.querySelector(".profile").textContent = about;
                profilecontainer.querySelectorAll("a")[0].href = "tel:"+whatsapp;
                profilecontainer.querySelectorAll("a")[0].textContent = whatsapp;
                profilecontainer.querySelectorAll("a")[1].href = "mailto:"+email;
                profilecontainer.querySelectorAll("a")[1].textContent = email;
            },
            error: function() {
                alert('Error calling PHP function!');
            }
        });
    })
})