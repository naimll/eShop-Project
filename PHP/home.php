<!DOCTYPE html>
<html>

<head>
    <title>Tesla Shop</title>
    <link href="CSS/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    </head>


<body>
    <?php
     require './controller/SliderController.php';
     require './controller/ProductController.php';
 
     $slider = new SliderController;
     $product = new ProductController;
 
     $sliders = $slider->all();
     $products = $product->getProducts();
     $count = $slider->count();
     $cart = '';
     if (isset($_SESSION['user_id'])) {
        $cart = 'cart.php';
    } else {
        $cart = '#';
    }

    ?>
    <div class="header-parent">
    <div class="header">
        <h1>TESLA SHOP</h1>
        <div class="nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href='<?php echo $cart?>'><i class="fas fa-shopping-cart"></i></a></li>
                <?php if(isset($_SESSION['name'])) : ?>
                <li style="width:200px">Welcome, <?php echo $_SESSION['name']?><a href="logout.php">Logout</a></li>
                <?php else : ?>
                <li><a href="login-register.php">Login</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>
    <div class="side">
        <div class="in-side">
            <div class="image-slider">
            <?php foreach ($sliders as $slider) : ?>
                
                    <img src="<?php echo "images/" . $slider['s_image'] ?>">
               
            <?php endforeach ?>
            </div>
           
               
                    <!-- <ul class="bullet-points">
                        <?php foreach ($count as $counter) : ?>
                            <span onclick="moveSlide(<?php echo $counter-1 ?>)"></span>
                        <?php endforeach ?>
                    </ul> -->
            <i class="fas fa-long-arrow-alt-left btn" id="prevbtn"></i>
            <i class="fas fa-long-arrow-alt-right btn " id="nextbtn"></i>
           
        </div>
    </div>
    <div class="banner">
        <h3>Product</h3>
    </div>
    <div class="article-side">
        <?php foreach ($products as $product) : ?>
            
        <div class="article">
            <a href="product.php?id=<?php echo $product['p_id'] ?>">
            <img src="images/<?php echo $product['p_image'] ?>" alt="Telefon">
             </a>
            <p><?php echo $product['p_name']?></p>
            <p><?php echo $product['p_description']?></p>
            <h3><?php echo $product['p_price']?>$</h3>
           
            <a href="controller/addCart.php?id=<?php echo $_SESSION['user_id'] ?>&product=<?php echo $product['p_id']?>"> <button><i class="fas fa-cart-plus"></i>ADD TO CART</button></a>

        </div>
        <?php endforeach ?>
        
       

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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="JavaScript/slider1.js"></script>

</body>

</html>