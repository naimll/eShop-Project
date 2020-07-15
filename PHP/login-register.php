
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="CSS/Login-Register-style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
</head>

<body>
    <?php
     require 'controller/loginController.php';
     require 'controller/userController.php';

     $user = new LoginController();
     $userReg = new UserController;
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
         $user->login($_POST);
        
     }
    //  if(isset($_POST['submitedlogin'])){
    //     $user->create($_POST);
    //  }
    ?>
    <div class="main-content" id="main">
        <div class="box1">
            <header>
                <button id="h4-1">Login</button>
                <button id="h4-2">Register</button>
            </header>
            <div class="box1-content" id="login-form">
                <form action="" method="POST" id="Login-form">
                <input type="email" name="email" placeholder="Email" id="emailL"/>
                <span id="loginEmailError">asdas</span>
                <input type="password" name="password" placeholder="Password" id="passwordL">
                <span id="loginPasswordError">asdas</span>
                <input type="submit" name="submitedlogin" placeholder="Login" value="Login" id="submitLogin" >
               </form>
            </div>
            <!-- <script>
                 var x=document.getElementById("submit");
                x.addEventListener('click',function(e){
                 e.preventDefault();
                  alert("asfasgf");
                });
            </script> -->
         
            <div id="register-form" class=" box1-content">
                <input type="text" name="name" placeholder="Name" id="nameR" >
                <span  id="nameError">asd</span>
                <input type="text" name="lastname" placeholder="Last Name" id="lastnameR" >
                <span id="lastnameError">asd</span>
                <input type="email" name="email" placeholder="Email" id="emailR">
                <span id="emailError">asdasd</span>
                <input type="password" name="password" placeholder="Password" id="passwordR">
                <span id="passwordError">asd</span>
                <input type="submit" name="submitedregister" value="Register" id="submit" onclick="formvalidation()">

            </div>
        </div>
    </div>
    <script src="Javascript/script1.js" type="text/javascript"></script>
    <script src="Javascript/jQuery.js" type="text/javascript"></script>
</body>

</html>