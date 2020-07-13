$(function(){
    $('#name-error').hide();
    $('#email-error').hide();
    $('#address-error').hide();
    $('#city-error').hide();
    $('#zip-error').hide();

    $('#name-ch').focusout(function(){
        checkName();
    });
    $('#email-ch').focusout(function(){
        checkEmail();
    });
    $('#address-ch').focusout(function(){
        checkAddress();
    });
    $('#city-ch').focusout(function(){
        checkCity();
    });
    $('#zip-code-ch').focusout(function(){
        checkZip();
    });
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function checkName(){
        
        var fullname=$('#name-ch').val();
        var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
        if(!fullname.match(regName)){
            
            $('#name-error').text('Please enter your full name (first & last name).');
            $('#name-error').show();

        }else{
            $('#name-error').hide();
        }
    }
    function checkEmail(){
        let email=$('#email-ch').val();
        if(email==''||email==null){
            $('#email-error').text('Email cannot be blank');
            $('#email-error').show();
        }else if(!validateEmail(email)){
            $('#email-error').text('Not a valid email address');
            $('#email-error').show();
        }else{
            $('#email-error').hide();
        }
    }
    function checkAddress(){
        let address=$('#address-ch').val();
        
        if(address==''){
            $('#address-error').text('Not a valid address');
            $('#address-error').show();
        }else{
            $('#address-error').hide();
        }
    }
    function checkCity(){
        let city=$('#city-ch').val();
        var regName=/^[a-zA-z] ?([a-zA-z]|[a-zA-z] )*[a-zA-z]$/;
        if(!city.match(regName)){
            $('#city-error').text('Not a valid city');
            $('#city-error').show();
        }else{
            $('#city-error').hide();
        }
    }
    function  checkZip(){
        let zip=$('#zip-code-ch').val();
        regName =/^[0-9]{5}(?:-[0-9]{4})?$/;
        if(!zip.match(regName)){
            $('#zip-error').text('Please enter zip code correctly');
            $('#zip-error').show();
        }else{
            $('#zip-error').hide();
        }
    }

});