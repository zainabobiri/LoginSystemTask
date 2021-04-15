<?php
$erroremail="";
$loginerror="";
$email="";

    if(isset($_POST['submit'])){
    
        $email=$_POST['email'];
      
        if(empty($email))
        {
            $erroremail="Enter email";
        }
        else{
            $userslist=file('data.txt');
            $login=false;
            foreach($userslist as $user)
            {
                $details= explode(',', $user);
                if($details[0]==$email)
                {
                    $login=true;
                    break;
                }
            }
            if($login==true){
              session_start();
              $_SESSION['email']=$email;
                header("Location: newpassword.php");
            }
            else{
                $loginerror="We could not find your email in our records.";
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
    <title></title>
</head>
<body>
    <form action="reset.php" method="post">

        <p><?php echo $loginerror?></p>
        <p><?php echo $erroremail?></p>
        <p>Your email is needed to reset the password</p>
        <label for="email">Email</label><br>
        <input type="text" name="email" id=""><br>

        <button type="submit" name="submit">Reset Password </button>
    </form>
</body>
</html>