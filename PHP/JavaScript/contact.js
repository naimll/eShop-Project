   

//Contact validation
$(function(){
    $('#contact-nameError').hide();
    $('#contact-lastnameError').hide();
    $('#contact-emailError').hide();
    $('#contact-messageError').hide();
    $('#contact-selectError').hide();
    $('#contact-ageError').hide();

    $('#contact-name').focusout(function(){
        checkContactName();
    });
    $('#contact-lastname').focusout(function(){
        checkContactLastname();
    });
    $('#contact-email').focusout(function(){
        checkContactEmail();
        
    });
    $('#message-area').focusout(function(){
        checkContactMessage();
    });
    $('#contact-country').focusout(function(){
        checkContactCountry();
    });
    $('#contact-age').focusout(function(){
        checkContactAge();
    });
    $('#contact-area').focus(function(){
        checkContactCountry();
    });
    $('#c-form #contact-submit').click(function(e){
        e.preventDefault();
        if(checkContactName()||checkContactLastname()||checkContactEmail()||checkContactMessage()||checkContactCountry()||checkContactAge()){
            return;

        }else{
           $('#c-form').submit();
        }
    });
    var submitbtn=document.getElementById("contact-submit");
        submitbtn.addEventListener("click",function(e){
        e.preventDefault();
        if(checkContactName()||checkContactLastname()||checkContactEmail()||checkContactMessage()||checkContactCountry()||checkContactAge()){
            return;

        }else{
            $('#c-form').submit();
        }
        });

    function checkContactName(){
        var name=$('#contact-name').val();
      
        var letters = /^[A-Za-z]+$/;
        if(name==''||name==null){
            $('#contact-nameError').text('Name cannot be blank');
            $('#contact-nameError').show();
            return true;
        }else if(name.length<5||name.length>20){
            $('#contact-nameError').text('Name should be between 5-20 characters');
            $('#contact-nameError').show();
            return true;
        }else if(!name.match(letters))
        {
          $('#contact-lastnameError').text('Enter alphabets only');
          $('#contact-lastnameError').show();
          return true;
        }
        else{
            $('#contact-nameError').hide();
            return false;
        }
    };
    function checkContactLastname(){
        var lastname=$('#contact-lastname').val();
        var letters = /^[A-Za-z]+$/;
        if(lastname==''||lastname==null){
            $('#contact-lastnameError').text('LastName cannot be blank');
            $('#contact-lastnameError').show();
            return true;
        }else if(lastname.length<5||lastname.length>20){
            $('#contact-lastnameError').text('Lastname should be between 5-20 characters');
            $('#contact-lastnameError').show();
            return true;
        }else if(!lastname.match(letters))
        {
          $('#contact-lastnameError').text('Enter alphabets only');
         $('#contact-lastnameError').show();
         return true;
        }
        
else{
    $('#contact-lastnameError').hide();
    return false;
        }
    }
    function checkContactEmail(){
        let email=$('#contact-email').val();
if(email==''||email==null){
            $('#contact-emailError').text('Email cannot be blank');
            $('#contact-emailError').show();
            return true;
        }else if(!validateEmail(email)){
            $('#contact-emailError').text('Not a valid email address');
            $('#contact-emailError').show();
            return true;
        }else{
            $('#contact-emailError').hide();
            return false;
        }
    }
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    function checkContactMessage(){
        var message=$('#contact-lastname').val();
       if(message==''||message==null){
            $('#contact-messageError').text('Message cannot be blank');
            $('#contact-messageError').show();
            return true;
        }else{
            $('#contact-messageError').hide();
            return false;
        }
    }
    function checkContactCountry(){
        var country=$('#contact-country option:selected').text();
        
        if(country=='Country'){
            
            $('#contact-selectError ').text('Please select country');
            $('#contact-selectError').show();
            return true;
        }else{
            $('#contact-selectError').hide();
            return false;
    }
    }
    function checkContactAge(){
        var age=$('#contact-age').val();
        if(age<1||age>100){
            $('#contact-ageError').text('The age must be a number between 1 and 100 ');
            $('#contact-ageError').show();
            return true;
        }else{
            $('#contact-ageError').hide();
            return false;
    }
}
});
