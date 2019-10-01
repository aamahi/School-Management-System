<?php
session_start();
if(isset($_SESSION['user-login'])){
    header("location:index.php");
}
require_once "config.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usernameChalk = mysqli_query($connection,"SELECT * FROM `users` WHERE `username` ='{$username}'");
    if( mysqli_num_rows($usernameChalk)>0){
        $row = mysqli_fetch_assoc($usernameChalk);
        $_password = $row['password'];
            if(password_verify($password,$_password)){
                $_SESSION['user-login'] = $username;
                header("location:index.php");
            }else{
            $passIncorrect ="incorreectPass";
            }
    }else{
        $incorrect ="incorrect";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Shahjalal Islamic Ideal School</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <?php
                                 if(isset($incorrect)){ 
                                     echo '<script> alert("Username Incorrect")   </script>' ;
                                     }
                                 if(isset($passIncorrect)){
                                    echo '<script> alert("Password Incorrect")   </script>' ;

                                 }
                                 ?>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" value ="<?php if(isset($username)){echo $username;} ?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-info btn-md" value="Login"><br> <br>
                                <label class="text-info"><span>Don't have an account?</span> <span><a href="reg.php">Register Account</a></span></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>