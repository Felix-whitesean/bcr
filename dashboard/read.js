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
    const listName = document.createElement("span");
    listName.textContent = list[i].getAttribute('title');
    list[i].appendChild(listName);
    document.querySelector("."+list[i].getAttribute('title').toLowerCase().split(" ").join("-")).style.display = "none";
    list[i].addEventListener("click", clicked)
    function clicked(event){
        document.querySelector(".landingprofile").style.display = "none";
        arrowLeft = document.querySelector(".landing").querySelector("i");
        arrowLeft.style.display = "initial";
        arrowLeft.addEventListener("click", function(){
            for(i = 0; i<list.length; i++){
                list[i].style.color = "var(--white)";
                list[i].querySelector('i').style.color = "var(--white)";
                list[i].querySelector('span').style.color = "var(--white)";
                list[i].style.paddingLeft= "5px";
                list[i].querySelector('i').style.paddingLeft= "5px";
                list[i].querySelector('span').style.paddingLeft= "5px";
                list[i].style.background= "transparent";
                document.querySelector("."+list[i].getAttribute('title').toLowerCase().split(" ").join("-")).style.display = "none";
                document.querySelector("."+list[i].getAttribute('title').toLowerCase().split(" ").join("-")).style.width = "0";
                document.querySelector(".landingprofile").style.display = "block";
                arrowLeft.style.display = "none";
                // return;
            }
        });
        for(i = 0; i<list.length; i++){
            list[i].style.color = "var(--white)";
            list[i].querySelector('i').style.color = "var(--white)";
            list[i].querySelector('span').style.color = "var(--white)";
            list[i].style.paddingLeft= "5px";
            list[i].querySelector('i').style.paddingLeft= "5px";
            list[i].querySelector('span').style.paddingLeft= "5px";
            list[i].style.background= "transparent";
            document.querySelector("."+list[i].getAttribute('title').toLowerCase().split(" ").join("-")).style.display = "none";
            document.querySelector("."+list[i].getAttribute('title').toLowerCase().split(" ").join("-")).style.width = "0";
        }
        event.target.style.color = "var(--brown)";
        event.target.style.paddingLeft= "12px";
        if(event.target.tagName.toLowerCase() == "i" || event.target.tagName.toLowerCase() == "span"){
            toDisplay = document.querySelector("."+event.target.parentElement.getAttribute('title').toLowerCase().split(" ").join("-")); 
            event.target.parentElement.querySelector('i').style.color = "var(--green)";
            event.target.parentElement.querySelector('span').style.color = "var(--green)";
            event.target.parentElement.style.paddingLeft= "12px";
            event.target.parentElement.style.background= "rgb(240, 240, 240)";
            event.target.style.paddingLeft= "0";
        }
        else{
            toDisplay = document.querySelector("."+event.target.getAttribute('title').toLowerCase().split(" ").join("-"));
            event.target.querySelector('i').style.color = "var(--brown)";
            event.target.querySelector('span').style.color = "var(--brown)";
            event.target.style.background= "rgb(255, 255, 255)";
        }
        if(toDisplay.className == "email"){
            emailButtons[2].classList.add("clicked");
        }
        toDisplay.style.display = "flex";
        setTimeout(function() {
            toDisplay.style.width = "99%";
            toDisplay.style.margin = "auto";
            toDisplay.style.marginTop = "1%";
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
function minimize(cancelbtn){
    setTimeout(function() {
        cancelbtn.parentElement.style.display = "none";
    }, 100);
    
    pop("process cancelled", 3000);
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
                // profilecontainer.querySelectorAll("a")[0].href = "tel:"+whatsapp;
                // profilecontainer.querySelectorAll("a")[0].textContent = whatsapp;
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
                textArea.focus();
                pop("Please input value for text box", 3000);
                return;
            }
            if(input.type == "checkbox"){
                if(!input.checked){
                    characters = "";
                    input.focus();
                    pop("Please check the required checkboxes", 3000);
                    return;
                }
            }
            if(input.type == "radio"){
                if(!input.checked){
                    characters = "";
                    pop("Please check the required radio boxes", 3000);
                    return;
                }
            }
            if(characters==""){
                pop("Please enter all the required details", 3000);
                input.parentElement.style.borderColor = "red";
                input.focus();
                return;
            }
        }
        input.parentElement.style.borderColor = "initial";
    })
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
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
                else{
                    pop(xhr.responseText, 3000);
                    if(formid == "commentsform"){
                        form.reset();
                    }
                }
            } else {
                // minimize();
                // location.reload();
                pop("Error! Enter the required fields and try again", 6000);
            }
        }
    }
    xhr.send(formData);
}
document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var fileInput = document.getElementById('fileInput');
    var file = fileInput.files[0];
    var formData = new FormData();
    formData.append('file', file);

    fetch('uploadfile.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // document.getElementById('message').textContent = data.split("*/*")[0];;
        // if(data.split("*/*")[0] == "File uploaded successfully!"){
        //     document.getElementById('filename').value = data.split("*/*")[1];
        // }
        pop(data.split("*/*")[0], 4000);
        fileInput.value = ''; // Clear file input after upload
    })
    .catch(error => console.error('Error:', error));
});
function pop(txt, timeout){
    popupwindow.textContent = txt;
    popupwindow.style.display = "initial";
    setTimeout(function () {
        popupwindow.style.display = "none";
    }, timeout);
}

// forms = document.querySelectorAll('form');

function switchinput(togglebtn){
    if (togglebtn.classList[1] == 'fa-eye'){
        togglebtn.classList.remove('fa-eye');
        togglebtn.classList.add('fa-eye-slash');
        togglebtn.parentElement.querySelector('input').type = "text";
    }
    else{
        togglebtn.classList.remove('fa-eye-slash');
        togglebtn.classList.add('fa-eye');
        togglebtn.parentElement.querySelector('input').type = "password";
    }

}
actionBtn = document.querySelector(".actionbtn").querySelector("i");
actionBtn.addEventListener("click", function(){
    if(actionBtn.classList[1] == "fa-chevron-right"){
        actionBtn.classList.remove('fa-chevron-right');
        actionBtn.classList.add('fa-chevron-left');
    }
    else{
        actionBtn.classList.remove('fa-chevron-left');
        actionBtn.classList.add('fa-chevron-right');
    }
    actionBtn.parentElement.parentElement.parentElement.classList.toggle("menu");
});

let inactiveTimeout;
const INACTIVE_TIME = 5 * 60 * 1000; // 5 minutes in milliseconds

// Function to reset the inactive timeout
function resetInactiveTimeout() {
    clearTimeout(inactiveTimeout);
    inactiveTimeout = setTimeout(handleInactive, INACTIVE_TIME);
}

// Function to handle user inactivity
function handleInactive() {
    formsubmission('logoutform', 'logout.php', 'Logging out...');
    console.log('User inactive for 5 minutes');
}

// Event listeners to track user activity
function setupActivityTracking() {
    document.addEventListener('mousemove', resetInactiveTimeout);
    document.addEventListener('keypress', resetInactiveTimeout);
    // Add more event listeners as needed to track other user interactions
}

// Initialize activity tracking when the page loads
setupActivityTracking();
resetInactiveTimeout(); // Start the timeout initially
