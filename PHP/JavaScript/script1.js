
function registerSlide() {
    var x = document.getElementById("login-form");
    var y = document.getElementById("register-form");
    var h1 = document.getElementById("h4-1");
    var h2 = document.getElementById("h4-2");
    var content = document.getElementById("main");

    h2.style.backgroundColor = "rgb(253, 253, 253)";
    h1.style.backgroundColor = "rgb(182, 182, 182)";
    x.style.left = "-420px";
    y.style.left = "0";
    content.style.height = "480px";

}

function loginSlide() {
    var x = document.getElementById("login-form");
    var y = document.getElementById("register-form");
    var h1 = document.getElementById("h4-1");
    var h2 = document.getElementById("h4-2");
    var content = document.getElementById("main");
    h2.style.backgroundColor = "rgb(182, 182, 182)";
    h1.style.backgroundColor = "rgb(253, 253, 253)";
    x.style.left = "0";
    y.style.left = "440px";
    content.style.height = "360px";
}

document.getElementById('h4-1').addEventListener('click',function(){
    loginSlide();
});
document.getElementById('h4-2').addEventListener('click',function(){
    registerSlide();
});
var nameR;
var lastnameR;
var emailR;
var passwordR;

var emailL;
var passwordL;

document.addEventListener('DOMContentLoaded', () => {

    nameR = document.getElementById("nameR");
    lastnameR = document.getElementById('lastnameR');
    emailR = document.getElementById('emailR');
    passwordR = document.getElementById('passwordR');

    emailL = document.getElementById('emailL');
    passwordL = document.getElementById('passwordL');

   

});

// var sub=document.getElementById('submitReg');
// var form=document.getElementById('Register-form');
// sub.addEventListener('click',function(e){
//     e.preventDefault();
//     if(checkInput()){
//         return
//     }else{
//         submitForm('Reg-form');
//     }
// });



function checkInput() {
   
    if (nameR.value == null || nameR.value == '') {
        showError('nameError', 'Name cannot be blank');
        nameR.classList.add("error");
        nameR.focus();
        return true;
    } else {
        showSuccess('nameError');
        nameR.classList.remove("error");
        
    }
    if (lastnameR.value == null || lastnameR.value == '') {
        showError('lastnameError', 'Lastname cannot be blank');
        lastnameR.classList.add("error");
        lastnameR.focus();
        return true;
    } else {
        showSuccess('lastnameError');
        lastnameR.classList.remove("error");
        
    }
    if (lastnameR.value.length < 5) {
        showError('lastnameError', 'Last name must be at least 5 characters');
        lastnameR.classList.add("error");
        lastnameR.focus();
        return true;
    } else {
        showSuccess('lastnameError');
        lastnameR.classList.remove("error");
       
    }
    if (validateEmail(emailR.value)) {
        showSuccess('emailError');
        emailR.classList.remove("error");
        
    } else {
        showError('emailError', 'Not a valid email address');
        emailR.classList.add("error");
        emailR.focus();
        return true;
    }

    if (passwordR == null || passwordR.value.length < 8) {
        showError('passwordError', 'Password must be at least 8 characters');
        passwordR.classList.add("error");
        passwordR.focus();
        return true;
    } else {
        showSuccess('passwordError');
        passwordR.classList.remove("error");
        
    }

}

function showError(element, message) {
    var x = document.getElementById(element);
    x.style.visibility = "visible";
    x.innerText = message;
}
function showSuccess(element) {
    var x = document.getElementById(element);
    x.style.visibility = "hidden";
}
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

// $(function(e){
//     e.preventDefault();
//     $('#submit').click(function(e){
//         e.preventDefault();
//         alert("aasags");
//         if(validateUserToLogin()){
//             return;
//         }else{
//             $('#login-form').submit();
//         }
//     });
    
// });
    // var xyz=document.getElementById("submitLogin");
    // xyz.addEventListener('click',function(e){
    // e.preventDefault();
    // if(validateUserToLogin()){
    //       submitForm('Login-form');
    // }else{
    //     return;
    // }
       
     
    
    // });

function submitForm(element){
    var myform=document.getElementById(element);
    myform.submit();
}
function validateUserToLogin() {
    if (validateEmail(emailL.value)) {
        showSuccess('loginEmailError');
        emailL.classList.remove("error");
       
    } else {
        showError('loginEmailError', 'Not a valid email address');
        emailL.classList.add("error");
        return

    }
    if (passwordL == null || passwordL.value == '') {
        showError('loginPasswordError', 'Password cannot be blank');
        passwordL.classList.add("error");
        return;
    } else {
        showSuccess('loginPasswordError');
        passwordL.classList.remove("error");
       
          return true;

    }
}