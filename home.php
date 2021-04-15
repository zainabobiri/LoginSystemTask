<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The landing page</title>
</head>
<body>
   
    <h1>
        <?php 
            if(isset($_SESSION['email'])) {
                echo $_SESSION['message'];
            }
            else{
                echo 'You are not logged in!';
            }
        ?>
    </h1>
    
    <p>
    <?php
     if(isset($_SESSION['email'])) {
        echo 'Your were registered with this email '.  $_SESSION['email'];
     }
    ?>
    </p>
    <?php
        if(isset($_SESSION['email'])) {
            echo '<a href="logout.php">Don you want to Logout</a>';
        }
        else{
            echo '<a href="login.php">Do you want to Login</a>';
        }
    ?>
</body>
</html>