<?php
$errorfirstname=$errorlastname=$erroremail=$errorpass=$errorcpass="";
$fname="";
$lname="";
$email="";
$pass="";
$cpass="";
$errors=array();
    if(isset($_POST['register'])){
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $cpass=$_POST['confirm'];
        if(empty($fname))
        {
            $errorfirstname="Enter first name";
        }
        else if(empty($lname))
        {
            $errorlastname="Enter last name";
        }
        else if(empty($email))
        {
            $erroremail="Enter email";
        }
        else if(empty($pass))
        {
            $errorpass="Enter password";
        }
        else if(empty($cpass))
        {
            $errorcpass="Enter confirm password";
        }
        else if($pass!=$cpass)
        {
            $errorcpass="Enter the same password";
            $errorpass="Enter the same password";
        }
        else{
            $fp= fopen('users.txt','a');
            fwrite($fp, $email . "," .$pass. "\n");
            fclose($fp);
            session_start();
            $_SESSION['email']=$email;
            $_SESSION['message']="Hurray! Your were registered successfully";
            header("Location: home.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Site</title>
</head>
<body>
    <form action="register.php" method="post">
        <p><?php echo $errorfirstname ?></p>
        <p> <?php echo $errorlastname ?></p>
        <p><?php echo $erroremail ?></p>
        <p><?php echo $errorpass ?></p>
        <p><?php echo $errorcpass ?></p>
        <label for="">Enter your First Name</label><br>
        <input type="text" name="firstname" id="" value="<?php echo $fname ?>"><br>
        <label for="">Enter your Last Name</label><br>
        <input type="text" name="lastname" id="" value="<?php echo $lname ?>"><br>
        <label for="">Enter your Email</label><br>
        <input type="email" name="email" id="" value="<?php echo $email ?>"><br>
        <label for="">Enter your Password</label><br>
        <input type="password" name="password" id="" value=""><br>
        <label for=""> Confirm your Password</label><br>
        <input type="password" name="confirm" id=""><br>
        <button type="submit" name="register">Register</button> <br>
        <a href="login.php">Are you already Registered?</a>
    </form>
</body>
</html>