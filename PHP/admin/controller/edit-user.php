<?php
require './../../controllers/UserController.php';

$user = new UserController;

if (isset($_GET['id'])) {
  $userId = $_GET['id'];
}

$currentUser = $user->edit($userId);

if (isset($_POST['submitted'])) {
  $user->update($userId, $_POST);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit User</title>
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
    }

    #contact-form-group {
      padding-top: 1%;
    }

    .contact-phone {
      font-family: 'Open Sans', sans-serif;
      font-size: 18px;
      color: #292929;
      margin-right: 5%;
      line-height: 30px;
      font-weight: 300;
      padding-left: 1%;
    }

    #heading-contact-phone {
      margin-right: 5%;
    }

    #title-contact-phone {
      margin-right: 7%;
    }

    #description-contact-phone {
      margin-right: 3.5%;
    }

    #inputButtons {
      width: 50%;
      box-sizing: border-box;
      padding: 20px;
      margin-bottom: 25px;
      border: 2px solid #e9eaea;
      color: #3e3e40;
      font-size: 14px;
      outline: none;
      transition: all 0.5s ease;
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
    <div id="contact-form-group" class="form-group">
      <label id="heading-contact-phone" class="contact-phone">Name:</label>
      <input id="inputButtons" type="text" value="<?php echo $currentUser['name']; ?>" name="name">
    </div>
    <div class="form-group">
      <label id="title-contact-phone" class="contact-phone">Surname:</label>
      <input id="inputButtons" type="text" value="<?php echo $currentUser['surname']; ?>" name="surname">
    </div>
    <div class="form-group">
      <label id="title-contact-phone" class="contact-phone">Email:</label>
      <input id="inputButtons" type="email" value="<?php echo $currentUser['email']; ?>" name="email">
    </div>
    <div class="form-group">
      <label id="title-contact-phone" class="contact-phone">Admin:</label>
      <input id="inputButtons" type="text" value="<?php echo $currentUser['is_admin']; ?>" name="is_admin">
    </div>
    <button type="submit" name="submitted" class="addButton">Update</button>
    <button class="cancelButton">Close</button>
  </form>
</body>

</html>