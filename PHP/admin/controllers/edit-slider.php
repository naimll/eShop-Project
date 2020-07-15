<?php
require './../../controller/SliderController.php';

$slider = new SliderController;

if (isset($_GET['id'])) {
    $sliderId = $_GET['id'];
}

$currentSlider = $slider->edit($sliderId);

if (isset($_POST['submitted'])) {
    $slider->update($sliderId, $_POST);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Slider</title>
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
            font-family: Arial, Helvetica, sans-serif;
            margin: 100px;
            padding: 50px;
            width: 900px;
            border: 1px solid black;
        }

        .addButton {
            background-color: #4CAF50;
            /* Green */
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
    <form action="" method="POST">
        <div class="form-group">
            <label id="title-contact-phone" class="contact-phone">Foto:</label>
            <input required type="file" name="slider_image" accept="image/*">
        </div>
        <button type="submit" name="submitted" class="addButton">Update</button>
        <button class="cancelButton" onclick="window.location.href='../slider.php';">Close</button>
    </form>
</body>

</html>