<?php
session_start();
require_once "config.php";
if(isset($_POST['reg'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $cpassword = $_POST['cpassword'];
    $password = $_POST['rpassword'];
   
    $photo = explode('.',$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.".".$photo;
    
    $input_error = array();
        if(empty($name)){
            $input_error['name'] = "This field is required";
        }
        if(empty($email)){
            $input_error['email'] = "This field is required";
        }
        if(empty($username)){
            $input_error['username'] = "This field is required";
        }
        if(empty($cpassword)){
            $input_error['cpassword'] = "This field is required";
        }
        if(empty($password)){
            $input_error['rpassword'] = "This field is required";
        }

        if(count($input_error)==0){
            $emailquery ="SELECT * FROM `users` WHERE `email` ='{$email}'";
            $userQuery ="SELECT * FROM `users` WHERE `username` ='{$username}'";
            $emailChalk = mysqli_query($connection,$emailquery);
            $userChalk = mysqli_query($connection,$userQuery);
            
            if(mysqli_num_rows($emailChalk)==0){
                if(mysqli_num_rows($userChalk)==0){
                    if($cpassword == $password){
                        $password = password_hash($password,PASSWORD_BCRYPT);
                       
                        $query ="INSERT INTO `users`(`name`,`email`,`username`,`password`,`photo`) VALUES ('{$name}','{$email}','{$username}','{$password}','{$photo_name}')";
                        $result = mysqli_query($connection,$query);
                            if($result){
                                move_uploaded_file($_FILES['photo']['tmp_name'],"imge/{$photo_name}");
                                header("location:login.php");
                                
                            }else{
                               echo "Data Inset Failed ! try Agein.";
                            }

                    }else{
                       $passwordNOtMatch ="Password didn't match !";
                    }
                }else{
                    $username_Error ="Usernmae already token";
                }
            }else{
               $email_error ="Email already token!";
            }
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registation Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="reg.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <style>
        .error{
            color:red;
            font-size:20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Shahjalal Islamic ideal shcool</h4>
        <p class="text-center">User Registation Form</p>
        <form action='reg.php' method='post' enctype="multipart/form-data">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" class="form-control" placeholder="Full name" type="text" value="<?php if(isset($name)){echo $name;} ?>">
            </div>
            <label class="error">
                    <?php if(isset($input_error['name'])){ echo $input_error['name'];}  ?>
            </label>
            
             <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email"value="<?php if(isset($email)){echo $email;} ?>">
                
            </div>
            <label class="error">
                    <?php if(isset($input_error['email'])){ echo $input_error['email'];}  ?>
            </label>
            <label class="error">
                    <?php
                     if(isset($email_error)){ echo $email_error;}
                     ?>
            </label>
           
              <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="username" class="form-control" placeholder="User Name" type="text"value="<?php if(isset($username)){echo $username;} ?>">
            </div>
            <label class="error">
                    <?php if(isset($input_error['username'])){ echo $input_error['username'];}  ?>
            </label>
            <label class="error">
                    <?php
                     if(isset($username_Error)){ echo $username_Error;}
                     ?>
            </label>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name='cpassword' class="form-control" placeholder="Create password" type="password"value="<?php if(isset($cpassword)){echo $cpassword;} ?>">
            </div>
            <label class="error">
                    <?php if(isset($input_error['cpassword'])){ echo $input_error['cpassword'];}  ?>
            </label>
            
             <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name='rpassword' class="form-control" placeholder="Repeat password" type="password" value="<?php if(isset($rpassword)){echo $rpassword;} ?>">
            </div>
            <label class="error">
                    <?php if(isset($input_error['rpassword'])){ echo $input_error['rpassword'];}  ?>
            </label>
            <label class="error">
                    <?php if(isset($passwordNOtMatch)){ echo $passwordNOtMatch;}  ?>
            </label>
            
             <!-- form-group// -->     
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="photo" class="form-control"type="file">
            </div>                                 
            <div class="form-group">
                <button type="submit" name="reg" value="reg" class="btn btn-primary btn-block"> Create Account  </button>
            </div> <!-- form-group// -->      
            <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
    </form>
    </article>
    </div> <!-- card.// -->

    </div> 
</body>
</html>