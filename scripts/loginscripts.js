$(document).ready(()=>{

    //login form
    var loginForm = document.getElementById("login-form");
    var registerForm = document.getElementById("register-form");

    var currForm = "login";
    
    $(document).on('click', 'a[data-role="switchForms"]', function(){
        var from = $(this).data('id');
        if (from == "login") {
            loginForm.style.display = "none";
            registerForm.style.display = "grid";
        }else if(from == "register"){
            loginForm.style.display = "block";
            registerForm.style.display = "none";
        }
    })
})
