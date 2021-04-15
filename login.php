<?php
$erroremail=$errorpass="";
$loginerror="";
$email="";
$pass="";

    if(isset($_POST['submit'])){
    
        $email=$_POST['email'];
        $pass=$_POST['password'];
      
      
        if(empty($email))
        {
            $erroremail="Enter email";
        }
        else if(empty($pass))
        {
            $errorpass="Enter password";
        }
        else{
            $userslist=file('users.txt');
            $login=false;
            foreach($userslist as $user)
            {
                $details= explode(',', $user);
                if($details[0]==$email && $details[1]==$pass)
                {
                    $login=true;
                    break;
                }
            }
            if($login==true){
                session_start();
                $_SESSION['email']=$email;
                $_SESSION['message']="Login success";
                header("Location: home.php");
            }
            else{
                $loginerror="Incorrect login details.";
            }
        }
        
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Login Page</title>
</head>
<body>
    <form action="login.php" method="post">

        <p><?php echo $loginerror?></p>
        <p><?php echo $erroremail?></p>
        <p><?php echo  $errorpass?></p>
        <label for="email">Enter your Email</label><br>
        <input type="text" name="email" id=""><br>
        <label for="password">Enter your Password</label><br>
        <input type="password" name="password" id=""><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <a href="register.php">Are you a new member?</a> <br><span><a href="reset.php">Do you want to reset your Password</a></span>
</body>
</html>
