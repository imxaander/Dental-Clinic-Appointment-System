$(document).ready(()=>{

    //login form
    var loginForm = document.getElementById("login-form");
    var registerForm = document.getElementById("register-form");
    var titleText = document.getElementById("tltxt");
    var currForm = "login";
    var mainForm = document.getElementById("main-form");
    $(document).on('click', 'a[data-role="switchForms"]', function(){
        var from = $(this).data('id');
        if (from == "login") {
            loginForm.style.display = "none";
            registerForm.style.display = "grid";
            titleText.innerHTML = "Register";
            if (window.innerWidth < 700) {
                mainForm.style.width = "100%";   
            }else{
                mainForm.style.width = "700px";  
            }
        }else if(from == "register"){
            loginForm.style.display = "block";
            registerForm.style.display = "none";
            titleText.innerHTML = "Login";
            if (window.innerWidth < 700) {
                mainForm.style.width = "100%";   
            }else{
                mainForm.style.width = "500px";  
            }
        }
    })

    function switchToReg(){
        loginForm.style.display = "none";
            registerForm.style.display = "grid";
            titleText.innerHTML = "Register";
            if (window.innerWidth < 700) {
                mainForm.style.width = "100%";
            }else{
                mainForm.style.width = "700px";  
            }
    }

    //validations

    $('#reg-first').filter_input({ regex: '[A-z]' });
    $('#reg-mid').filter_input({ regex: '[A-z]' });
    $('#reg-last').filter_input({ regex: '[A-z]' });
    $('#reg-age').filter_input({ regex: '[0-9]' });
    $('#reg-occupation').filter_input({ regex: '[A-z ]' });
    $('#reg-no').filter_input({ regex: '[0-9]' });
    
})


var loginForm = document.getElementById("login-form");
    var registerForm = document.getElementById("register-form");
    var titleText = document.getElementById("tltxt");
    var currForm = "login";
    var mainForm = document.getElementById("main-form");
    $(document).on('click', 'a[data-role="switchForms"]', function(){
        var from = $(this).data('id');
        if (from == "login") {
            loginForm.style.display = "none";
            registerForm.style.display = "grid";
            titleText.innerHTML = "Register";
            if (window.innerWidth < 700) {
                mainForm.style.width = "100%";   
            }else{
                mainForm.style.width = "700px";  
            }
        }else if(from == "register"){
            loginForm.style.display = "block";
            registerForm.style.display = "none";
            titleText.innerHTML = "Login";
            if (window.innerWidth < 700) {
                mainForm.style.width = "100%";   
            }else{
                mainForm.style.width = "500px";  
            }
        }
    });

    function switchToReg(){
        loginForm.style.display = "none";
            registerForm.style.display = "grid";
            titleText.innerHTML = "Register";
            if (window.innerWidth < 700) {
                mainForm.style.width = "100%";   
            }else{
                mainForm.style.width = "700px";  
            }
    }
