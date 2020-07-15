<?php
 session_start();
if (!isset($_SESSION['user_id'])) { 
     header("Location: ../login-register.php");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/styles.css">
    <script src="../JavaScript/jquery-1.11.3.min.js"></script>
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
    <style>
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 7%;
            top: 5%;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 60%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        .modal-header {
            padding: 2px 16px;
            background-color: #ffff;
            color: white;
        }

        .modal-body {
            padding: 27px 16px;
        }

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
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

    <?php
    require './../controller/userController.php';

    $user = new UserController;
    $users = $user->all();

    if (isset($_POST['submitted'])) {
        $user->storeAdmin($_POST);
    }
    ?>
    <!-- Content -->

    <div class="dashboard-wrapper">

        <?php include 'includes/sidebar.php' ?>

        <div id="dashboard-container">
            <div class="content-title">
                <h1 class="page-title"><a href="users.php">Dashboard - Users</a></h1>
            </div>
            <div class="main-content">
                <table class="table">
                    <tr class="table-head">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Admin</th>
                        
                        <th><button id="myBtn" class="button1" style="float: right">ADD USER</button></th>
                    </tr>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['u_id'] ?></td>
                            <td><?php echo $user['u_name'] ?></td>
                            <td><?php echo $user['u_lastname'] ?></td>
                            <td><?php echo $user['u_email'] ?></td>
                            <td><?php echo $user['u_isAdmin'] == 1 ? "Yes" : "No" ?></td>
                            
                            <td><a href="controllers/delete-user.php?id=<?php echo $user["u_id"] ?>">Remove</a></td>
                        </tr>
                    <?php endforeach ?>
                    
                </table>

            </div>

            <!-- Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div id="contact-form-group" class="form-group">
                                <label id="heading-contact-phone" class="contact-phone">Name:</label>
                                <input id="inputButtons" type="text" name="name" style="position:relative;left:5px;">
                            </div>
                            <div class="form-group">
                                <label id="title-contact-phone" class="contact-phone">Last Name:</label>
                                <input id="inputButtons" type="text" name="lastname" style="position:relative;left:19px;">
                            </div>
                            <div class="form-group">
                                <label id="title-contact-phone" class="contact-phone">Email:</label>
                                <input id="inputButtons" type="email" name="email" style="position:relative;left:-3px;">
                            </div>
                            <div class="form-group">
                                <label id="title-contact-phone" class="contact-phone">Password:</label>
                                <input id="inputButtons" type="password" name="password" style="position:relative;left:5px;">
                            </div>
                            <div class="form-group">
                                <label id="title-contact-phone" class="contact-phone">Admin:</label>
                                <input type="checkbox" name="is_admin" style="height: 20px; width: 20px;">
                            </div>
                            <button type="submit" name="submitted" class="addButton">Create</button>
                            <button type="button" class="cancelButton">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("cancelButton")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
</body>

</html>