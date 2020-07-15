<?php
    require './CartController.php';

    $product = new CartController;
    
    if(isset($_GET['id'])) {
        $cartId = $_GET['id'];
    }
    
    $product->destroy($cartId);
    header('Location: ../cart.php');
    
?>