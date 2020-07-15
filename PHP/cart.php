<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="CSS/cart.css">
    <link href="CSS/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
</head>

<body>
    <?php
        require './controller/CartController.php';
        $cart = new CartController;
        $carts = $cart->getByUser($_SESSION['user_id']);
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
    <main>
        <div class="basket">
            <div class="cart-labels">
                <ul>
                    <li class="item">Item</li>
                    <li class="price">Price</li>
                    <li class="quantity">Quantity</li>
                    <li class="total">Total</li>
                </ul>
            </div>
            <?php foreach ($carts as $cart) : ?>
                <div class="cart-product">
                    <div class="item">
                        <div class="product-image">
                            <img src="images/<?php echo $cart['product_image']?>" alt="Product image" class="product-frame">
                        </div>
                        <div class="product-details">
                            <h1><?php echo $cart['title'] ?></h1>
                            <p><strong><?php echo $cart['p_performance']?></strong></p>
                            <p>Product Code - <?php echo $cart['pcode']?></p>
                        </div>
                     </div>
                        <div class="price"><?php echo $cart['price']?></div>
                        <div class="quantity">
                            <input type="number" value="1" min="1" class="quantity-field">
                        </div>
                   
                    <div class="subtotal"><?php echo $cart['price']?>$</div>
                    <div class="remove">
                    <a href="controller/delete-cart.php?id=<?php echo $cart['order_id'] ?>"> <button name="removebtn">Remove</button></a>
                   
                    </div>
                </div>
            <?php endforeach ?>
            
            
        </div>
        <div class="action-side">
            <div class="price-side">
                <h2> <span class="total-items"></span> item in your cart</h2>
                <h2 class="total-value">Total Price :<span id="basket-total">0</span>$</h2>
            </div>
            <div class="proceed">
                <button type="submit" name="checkoutbtn"><a href="checkout.php">Checkout</a></button>
               
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="JavaScript/cart1.js"></script>
</body>

</html>