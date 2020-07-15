<?php
    require './CartController.php';

    $cart = new CartController();
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $product=$_GET['product'];
    }
    
    $cart->store($id,$product);
    header('Location: ../cart.php');
    
?>