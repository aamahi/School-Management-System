<?php 
$user= $_SESSION['user-login'];
$query = "SELECT * FROM `users` WHERE`username`= '{$user}' ";
$user_data= mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($user_data);

?>

<h1 class="text-primary"><i class="fa fa-user"></i> Profile <small class='sm'>Shahjalal islamic ideal school</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard /</a> <a href="index.php?page=all-user"><i class="fa fa-user"></i> All User / </a><i class="fa fa-user"> </i> Profile</li>
    </ol>
</nav>

<div class="row" >
    <div class="col-sm-6">
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <td>ID</td>
                <td><?php echo $row['id'];?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $row['name'];?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $row['email'];?></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><?php echo $row['username'];?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>Active</td>
            </tr>
            <tr>
                <td>Singup Date</td>
                <td><?php echo $row['datetime'];?></td>
            </tr>
        </table>
        <!-- <a href="index.php?page=edit-user&id=<?php 
        // echo base64_encode($row['id']); 
        ?>" class="btn btn-info btn-sm" style="margin-bottom:23px; float:right">Edit Profile</a> -->
    </div>
    <div class="col-sm-6">
        
    <?php 
        if(isset($_POST['update-picture'])){
            $photo = explode('.',$_FILES['profilepicture']['name']);
            $photo = end($photo);
            $photo_name = $user.".".$photo;
            $upload = mysqli_query($connection,"UPDATE `users` SET `photo`='{$photo_name}' WHERE `username`='{$user}' ");
            if($upload){
                move_uploaded_file($_FILES['profilepicture']['tmp_name'],"imge/{$photo_name}");
            }
        }



    ?>

        <a href="">
            <img src="imge/<?php echo $row['photo'] ?>" class='img-thumbnail' width="186px" height="180px">
        </a>
        <form action=""enctype="multipart/form-data" method ='post'>
            <label for="profilepicture">Profile Picture</label>
            <input type="file" id="profilepicture" name="profilepicture" required><br>
            <input style="margin-bottom:60px;"type="submit" value="Update Picture" name='update-picture' class="btn btn-info btn-sm">
        </form>
    </div>
</div>
<div style="margin-botton:90px;">

</div>