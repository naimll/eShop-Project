<?php
    require './../../controllers/SliderController.php';

    $slider = new SliderController;

    if(isset($_GET['id'])) {
        $sliderId = $_GET['id'];
    }

    $slider->destroy($sliderId);

    header('Location: ./../slider.php')
?>