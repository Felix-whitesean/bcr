window.addEventListener("load", hideLoading);
function hideLoading(){
    loader = document.querySelector('.loadingBackground');
    body = document.querySelector('.template');
    loader.style.display = "none";
    body.style.display = "flex";    
}
popupwindow = document.querySelector(".popup");
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
                // return;
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
});
function formsubmission(formid, actionfile, successMessage){
    var form = document.getElementById(formid);
    var inputs = form.querySelectorAll('input')
    inputs.forEach(function (input){
        if(input.hasAttribute('required')){
            characters = input.value;
            var textArea = form.querySelector('textarea'); // Replace 'myTextArea' with the actual ID of your textarea

             // Use trim() to remove leading/trailing whitespace
            if(textArea){
                var textAreaValue = textArea.value.trim();
            }
            if (textAreaValue == "") {
                characters = "";
                pop("Please input value for text box", 3000);
                    return;
            }
            if(input.type == "checkbox"){
                if(!input.checked){
                    characters = "";
                    pop("Please check the required checkboxes", 3000);
                    return;
                }
            }
            if(characters==""){
                pop("Please enter all the required details", 3000);
                return;
            }
            else{
                var formData = new FormData(form);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', actionfile, true);
                xhr.responseType = 'text';
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            if(xhr.responseText == 1){
                                pop(successMessage, 3000);
                                form.reset();
                                location.reload();
                            }
                            else{
                                pop(xhr.responseText, 3000)
                            }
                        } else {
                            // minimize();
                            pop("Error in submiting comments!, enter the required fields and try again", 6000);
                            // console.error('Failed to update like count');
                        }
                    }
                };
                xhr.send(formData);
            }
        }
    })
}
function pop(txt, timeout){
    popupwindow.textContent = txt;
    popupwindow.style.display = "initial";
    setTimeout(function () {
        popupwindow.style.display = "none";
    }, timeout);
}
function logout(){
    $.ajax({
        url: 'logout.php',
        type: 'POST',
        data: { status: "0"},
        success: function(response) {

        },
        error: function() {
            alert('Error calling PHP function!');
        }
    });
}