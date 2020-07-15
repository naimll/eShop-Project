<?php
    require './../../controller/ProductController.php';

    $product = new ProductController;

    if(isset($_GET['id'])) {
        $productId = $_GET['id'];
    }

    $product->destroy($productId);

     header('Location: ./../products.php');
?>