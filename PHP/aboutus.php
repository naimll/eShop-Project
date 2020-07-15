<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="CSS/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/contact-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

</head>
<body>
    
    <?php
    require './controller/AboutUsController.php';

    $abouts = new AboutUsController;
    $about_us = $abouts->getById(1);
    
    ?>
    <div class="banner-contact" id="banner-about">
        <p><a href="home.php">Home</a> /About us</p>
    </div>
    <div class="about-content">
        <p><?php echo $about_us['a_welcome']?></p>
        <p><?php echo $about_us['a_description']?></p>
        <p><?php echo $about_us['a_message']?></p>
        </div>
        <footer>
            <p><strong><a href="https://github.com/naimll/Web-Project.git">@2020 - May</a></strong></p>
            <ul>
                <li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a> </li>
                <li><a href="https://www.instagram.com/"><i class="fab fa-instagram-square"></i></a> </li>
                <li><a href="https://twitter.com/?lang=en"><i class="fab fa-twitter-square"></i></a> </li>
                <li><a href="https://github.com/naimll/Web-Project.git"><i class="fab fa-github-square"></i></a> </li>
                <li><a href="https://aboutme.google.com/u/0/?referer=gplus"><i class="fab fa-google-plus-g"></i></a> </li>
            </ul>
            <h4>Contact Information</h4>
            <p>Tel: +38344122122</p>
            <p>Email: teslashop@gmail.com</p>
            <p>Location: Kosovo</p>
        </footer>
</body>
</html>