

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
{



function formvalidation() {
    checkInput();
}

function checkInput() {
   
    if (nameR.value == null || nameR.value == '') {
        showError('nameError', 'Name cannot be blank');
        nameR.classList.add("error");
        nameR.focus();

    } else {
        showSuccess('nameError');
        nameR.classList.remove("error");

    }
    if (lastnameR.value == null || lastnameR.value == '') {
        showError('lastnameError', 'Lastname cannot be blank');
        lastnameR.classList.add("error");
        lastnameR.focus();
    } else {
        showSuccess('lastnameError');
        lastnameR.classList.remove("error");
    }
    if (lastnameR.value.length < 5) {
        showError('lastnameError', 'Last name must be at least 5 characters');
        lastnameR.classList.add("error");
        lastnameR.focus();
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
    }

    if (passwordR == null || passwordR.value.length < 8) {
        showError('passwordError', 'Password must be at least 8 characters');
        passwordR.classList.add("error");
        passwordR.focus();
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

function validateUserToLogin() {
    var x=document.getElementById('login-form');
    
    event.preventDefault();
    console.log(emailL.value+" "+passwordL.value);
    if (validateEmail(emailL.value)) {
        showSuccess('loginEmailError');
        emailL.classList.remove("error");
       x.submit();
    } else {
        showError('loginEmailError', 'Not a valid email address');
        emailL.classList.add("error");
        return true;

    }
    if (passwordL == null || passwordL.value == '') {
        showError('loginPasswordError', 'Password cannot be blank');
        passwordL.classList.add("error");
        return true;
    } else {
        showSuccess('loginPasswordError');
        passwordL.classList.remove("error");
        x.submit();
        return false;
    }
}

    

// //Contact validation
// $(function(){
//     $('#contact-nameError').hide();
//     $('#contact-lastnameError').hide();
//     $('#contact-emailError').hide();
//     $('#contact-messageError').hide();
//     $('#contact-selectError').hide();
//     $('#contact-ageError').hide();

//     $('#contact-name').focusout(function(){
//         checkContactName();
//     });
//     $('#contact-lastname').focusout(function(){
//         checkContactLastname();
//     });
//     $('#contact-email').focusout(function(){
//         checkContactEmail();
        
//     });
//     $('#message-area').focusout(function(){
//         checkContactMessage();
//     });
//     $('#contact-country').focusout(function(){
//         checkContactCountry();
//     });
//     $('#contact-age').focusout(function(){
//         checkContactAge();
//     });
//     $('#contact-area').focus(function(){
//         checkContactCountry();
//     });
//     $('#c-form #contact-submit').click(function(e){
//         console.log("ssad");
//         alert("safasdgasg");
//         e.preventDefault();
//         if(checkContactName()||checkContactLastname()||checkContactEmail()||checkContactMessage()||checkContactCountry()||checkContactAge()){
//             return;

//         }else{
           
//         }
//     });
//     var submitbtn=document.getElementById("contact-submit");
//         submitbtn.addEventListener("click",function(e){
//         e.preventDefault();
//         if(checkContactName()||checkContactLastname()||checkContactEmail()||checkContactMessage()||checkContactCountry()||checkContactAge()){
//             return;

//         }else{
//            alert("success");
//         }
//         });

//     function checkContactName(){
//         var name=$('#contact-name').val();
      
//         var letters = /^[A-Za-z]+$/;
//         if(name==''||name==null){
//             $('#contact-nameError').text('Name cannot be blank');
//             $('#contact-nameError').show();
//             return true;
//         }else if(name.length<5||name.length>20){
//             $('#contact-nameError').text('Name should be between 5-20 characters');
//             $('#contact-nameError').show();
//             return true;
//         }else if(!lastname.match(letters))
//         {
//           $('#contact-lastnameError').text('Enter alphabets only');
//           $('#contact-lastnameError').show();
//           return true;
//         }
//         else{
//             $('#contact-nameError').hide();
//             return false;
//         }
//     };
//     function checkContactLastname(){
//         var lastname=$('#contact-lastname').val();
//         var letters = /^[A-Za-z]+$/;
//         if(lastname==''||lastname==null){
//             $('#contact-lastnameError').text('LastName cannot be blank');
//             $('#contact-lastnameError').show();
//             return true;
//         }else if(lastname.length<5||lastname.length>20){
//             $('#contact-lastnameError').text('Lastname should be between 5-20 characters');
//             $('#contact-lastnameError').show();
//             return true;
//         }else if(!lastname.match(letters))
//         {
//           $('#contact-lastnameError').text('Enter alphabets only');
//          $('#contact-lastnameError').show();
//          return true;
//         }
        
// else{
//     $('#contact-lastnameError').hide();
//     return false;
//         }
//     }
//     function checkContactEmail(){
//         let email=$('#contact-email').val();
// if(email==''||email==null){
//             $('#contact-emailError').text('Email cannot be blank');
//             $('#contact-emailError').show();
//             return true;
//         }else if(!validateEmail(email)){
//             $('#contact-emailError').text('Not a valid email address');
//             $('#contact-emailError').show();
//             return true;
//         }else{
//             $('#contact-emailError').hide();
//             return false;
//         }
//     }
//     function checkContactMessage(){
//         var message=$('#contact-lastname').val();
//        if(message==''||message==null){
//             $('#contact-messageError').text('Message cannot be blank');
//             $('#contact-messageError').show();
//             return true;
//         }else{
//             $('#contact-messageError').hide();
//             return false;
//         }
//     }
//     function checkContactCountry(){
//         var country=$('#contact-country option:selected').text();
        
//         if(country=='Country'){
            
//             $('#contact-selectError ').text('Please select country');
//             $('#contact-selectError').show();
//             return true;
//         }else{
//             $('#contact-selectError').hide();
//             return false;
//     }
//     }
//     function checkContactAge(){
//         var age=$('#contact-age').text();
//         if(age==''||age<1||age>100){
//             $('#contact-ageError').text('The age must be a number between 1 and 100 ');
//             $('#contact-ageError').show();
//             return true;
//         }else{
//             $('#contact-ageError').hide();
//             return false;
//     }
// }
// });


