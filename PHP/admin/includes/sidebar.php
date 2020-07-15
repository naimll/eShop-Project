<!-- <?php
if (isset($_SESSION['user_id'])) { } else {
    header("Location: ../../login-register.php");
}
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/styles.css">
</head>

<body>
    <nav id="dashboard-sidebar">
    
        <h2 style="margin-left: 40px;color:#fff;margin-top: -10px;"><?php echo $_SESSION['name']; ?></h2>
        <ul>
            <li><span>Navigation</span></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contacts.php">Contacts</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="slider.php">Slider</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <span>
                <li></li>
            </span>
            <li><a href="adminlogout.php">Logout</a></li>
        </ul>
    </nav>
</body>

</html>