<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="CSS/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/product.css">
</head>

<body>
    <?php 
     require './controller/ProductController.php';
     require './controller/cartController.php';
    
     $product = new ProductController;
     $cart = new CartController;

     if (isset($_GET['id'])) {
        $productId = $_GET['id'];
    }

    if (isset($_POST['submitted'])) {
        $cart->store($_SESSION['id'], $productId);
    }

    $currentProduct = $product->edit($productId);

    $cart = '';
    if (isset($_SESSION['user_id'])) {
       $cart = 'cart.php';
   } else {
       $cart = 'login-register.php';
   }
    ?>

    <div class="header-parent">
        <div class="header">
            <h1>TESLA SHOP</h1>
            <div class="nav">
                <ul>
                    <li><a href="home-page.html">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="aboutus-form.html">About Us</a></li>
                    <li><a href="<?php echo $cart?>"><i class="fas fa-shopping-cart"></i></a></li>
                    <?php if(isset($_SESSION['name'])) : ?>
                    <li style="width:200px">Welcome, <?php echo $_SESSION['name']?><a href="logout.php">Logout</a></li>
                    <?php else : ?>
                    <li><a href="login-register.php">Login</a></li>
                    <?php endif ?>

                </ul>
            </div>
        </div>
    </div>
    <div class="wraper">
        <div class="product-image">
            <section class="main-image">
            <img src="images/<?php echo $currentProduct['product_image']?>" alt="Product photo">
            </section>

            <div class="nav-image">
                <ul class="nav">
                    <li> <img src="https://www.neptun-ks.com/2020/03/10/artikl869050695.jpeg?width=100" alt=""></li>
                    <li><img src="https://www.neptun-ks.com/2020/03/13/ultra.b.jpg?width=100" alt=""></li>
                    <li> <img src="https://www.neptun-ks.com/2020/03/13/ultra.b1.jpg?width=100" alt=""></li>
                    <li><img src="https://www.neptun-ks.com/2020/03/13/ultra.b3.jpg?width=100" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="main-side">
            <div class="description">
            <h2><?php echo $currentProduct["product_name"] ?></h2>
            <h4>Product Code: <?php echo $currentProduct["product_code"] ?></h4>
            <p><?php echo $currentProduct["product_description"] ?></p>

                <ul>
                    <li><?php echo $currentProduct["product_performance"] ?></li>
                    
                </ul>
            </div>
            <div class="action-side">
                <div class="price-side">
                <h2>Total Price : <?php echo $currentProduct["product_price"] ?>$</h2>
                </div>
                <div class="proceed">
                    <button>Checkout</button>
                    <button>Add to Cart</button>
                </div>
            </div>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="JavaScript/product.js"></script>
</body>

</html>