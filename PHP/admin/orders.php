<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css">
    <script src="../javascript/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="57x57" href="../images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
    <link rel="manifest" href="../images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>

    <?php
    require './../controllers/CartController.php';

    $cart = new CartController;
    $carts = $cart->all();
    ?>

    <!-- Content -->

    <div class="dashboard-wrapper">

        <?php include 'includes/sidebar.php' ?>

        <div id="dashboard-container">
            <div class="content-title">
                <h1 class="page-title"><a href="users.php">Dashboard</a></h1>
            </div>
            <div class="main-content">
                <table class="table">
                    <tr class="table-head">
                        <th>Order ID</th>
                        <th>Client Name</th>
                        <th>Client Email</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                    <?php foreach ($carts as $cart) : ?>
                        <tr>
                            <td><?php echo $cart['order_id'] ?></td>
                            <td><?php echo $cart['client_name'] ?></td>
                            <td><?php echo $cart['client_email'] ?></td>
                            <td><?php echo $cart['pcode'] ?></td>
                            <td><?php echo $cart['title'] ?></td>
                            <td><?php echo $cart['price'] ?></td>
                            <td><?php echo $cart['date'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    <!-- <tr>
                            <td>123456</td>
                            <td>Client</td>
                            <td>client@gmail.com</td>
                            <td>PC0</td>
                            <td>Product</td>
                            <td>$000</td>
                            <td>Date</td>
                        </tr> -->
                </table>

            </div>
        </div>
    </div>
</body>

</html>