<?php
    require './../../controller/userController.php';

    $user = new UserController;

    if(isset($_GET['id'])) {
        $userId = $_GET['id'];
    }

    $user->destroy($userId);

    header('Location: ./../users.php')
?>
