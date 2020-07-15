<?php
include_once "controller/contactController.php";
include_once "model/contactModel.php";

$con = new contactController();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['Message'];
    $country = $_POST['country'];
    $age = $_POST['age'];
    $cn=new Contact($name,$lastname,$email,$message,$country,$age);
    $con->create($cn);
    
}
$cart = '';
     if (isset($_SESSION['user_id'])) {
	if(!empty($_POST['name'])&& !empty($_POST['lastname'])&& !empty($_POST['email'])){
        $cart = 'cart.php';
	}
	else{

	echo "All fields are required!";
	}
    } else {
        $cart = 'login-register.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/contact-style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <title>Contact</title>
</head>
<body>
    <div class="header">
        <h1>TESLA SHOP</h1>
        <div class="nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="<?php echo $cart?>"><i class="fas fa-shopping-cart"></i></a></li>
                <?php if(isset($_SESSION['name'])) : ?>
                <li style="width:200px">Welcome, <?php echo $_SESSION['name']?><a href="logout.php">Logout</a></li>
                <?php else : ?>
                <li><a href="login-register.php">Login</a></li>
                <?php endif ?>

            </ul>
        </div>
    </div>
    <div class="b-side">
        <div class="banner-contact">
            <p>Home/Contact</p>
        </div>
    </div>
    <div class="contact-content">
        <h3 class="title">Contact Information</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <div class="contact-form">
            <form action="" method="POST" id="c-form">
                
                <input type="text" name="name" id="contact-name" placeholder="Name">
                <span id="contact-nameError">test</span>
                <input type="text" name="lastname" id="contact-lastname" placeholder="Last Name">
                <span id="contact-lastnameError">test</span>
                <input type="email" name="email" id="contact-email" placeholder="Email">
                <span id="contact-emailError">test</span>
                <textarea name="Message" id="message-area" cols="10" rows="6" placeholder="Message" ></textarea>
                <span id="contact-messageError">test</span>
                <div class="country-and-age">
                    <div class="col-span">
                <select name="country" id="contact-country">
                    <option value="">Country</option>
                    <option value="">Kosovo</option>
                    <option value="">Albania</option>
                    <option value="">USA</option>
                    <option value="">Germany</option>
                    <option value="">Italy</option>
                    <option value="">UK</option>
                    <option value="">France</option>
                </select>
                <span id="contact-selectError">test</span>
            </div>
            <div class="col-span">
                <input type="number" name="age" id="contact-age" placeholder="Age">
                <span id="contact-ageError" class="col-span1">test</span>
            </div>
            </div>
            <input type="submit" value="Submit" name="submited" id="contact-submit">
            
            </form>
        </div>
    </div>
    <script type="text/javascript" src="JavaScript/contact.js"></script>
    
</body>
</html>
