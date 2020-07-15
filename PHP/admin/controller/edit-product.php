<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="apple-touch-icon" sizes="57x57" href="../../images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../../images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../../images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../../images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../../images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/favicon-16x16.png">
    <link rel="manifest" href="../../images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../../images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <style>
        body {
            padding: 10px 50% 0 10px;
        }

        #selectors {
            width: 30%;
            box-sizing: border-box;
            padding: 20px;
            margin-bottom: 25px;
            border: 2px solid #065b91;
            color: #3e3e40;
            font-size: 14px;
            outline: none;
            transition: all 0.5s ease;
        }

        .addButton {
            background-color: #4CAF50;
            border: none;
            color: white;
            margin-left: 30%;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .cancelButton {
            background-color: red;
            border: none;
            color: white;
            margin-left: 5%;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    require './../../controllers/ProductController.php';
    require './../../controllers/CategoryController.php';

    $product = new ProductController;
    $category = new CategoryController;

    $categories = $category->all();

    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
    }

    $currentProduct = $product->edit($productId);

    if (isset($_POST['submitted'])) {
        $product->update($productId, $_SESSION['id'], $_POST);
    }
    ?>

    <form action="" method="POST">
        <div id="contact-form-group" class="form-group">
            <label id="heading-contact-phone" class="contact-phone">Name:</label>
            <input id="inputButtons" type="text" value="<?php echo $currentProduct['product_name']; ?>" name="product_name">
        </div>
        <div class="form-group">
            <label id="title-contact-phone" class="contact-phone">Kodi:</label>
            <input id="inputButtons" type="text" value="<?php echo $currentProduct['product_code']; ?>" name="product_code">
        </div>
        <div class="form-group">
            <label id="title-contact-phone" class="contact-phone">Kategoria:</label>
            <select id="selectors" name="product_category" required>
                <option value="<?php echo $currentProduct['category_id'] ?>" selected hidden><?php echo $currentProduct['category'] ?></option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category["category_id"] ?>"><?php echo $category["category_name"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label id="title-contact-phone" class="contact-phone">Çmimi:</label>
            <input required id="inputButtons" value="<?php echo $currentProduct['product_price'] ?>" type="text" name="product_price" style="position:relative;left:5px;">
        </div>
        <div class="form-group">
            <label id="title-contact-phone" class="contact-phone">Përshkrimi i shkurtër:</label>
            <input required id="inputButtons" value="<?php echo $currentProduct['product_short_description'] ?>" type="text" name="product_short_description" style="position:relative;left:5px;">
        </div>
        <div class="form-group">
            <label id="title-contact-phone" class="contact-phone">Përshkrimi:</label>
            <input required id="inputButtons" value="<?php echo $currentProduct['product_description'] ?>" type="text" name="product_description" style="position:relative;left:5px;">
        </div>
        <div class="form-group">
            <label id="title-contact-phone" class="contact-phone">Sasia:</label>
            <input required id="inputButtons" value="<?php echo $currentProduct['product_quantity'] ?>" type="text" name="product_quantity" style="position:relative;left:5px;">
        </div>
        <div class="form-group">
            <label id="title-contact-phone" class="contact-phone">Foto:</label>
            <input type="file" name="product_image" accept="image/*">
        </div>
        <button type="submit" name="submitted" class="addButton">Update</button>
        <button type="button" onclick="window.location.href = '../products.php';" class="cancelButton">Cancel</button>
    </form>
</body>

</html>