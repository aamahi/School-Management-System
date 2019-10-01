<?php 
if(isset($_POST['add-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $photo = explode('.',$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $roll.".".$photo;
    
    $query = "INSERT INTO `stuinfo`(`name`, `roll`, `class`, `city`, `phone`, `photo`) VALUES ('{$name}','{$roll}','{$class}','{$city}','{$phone}','{$photo_name}')";
    $result =mysqli_query($connection,$query);
    // echo $query;
    if($result){
        move_uploaded_file($_FILES['photo']['tmp_name'],"stdimg/{$photo_name}");
        echo "<script> alert('Data Insert Sucessfully')</script>";
        
    }else{
        echo "<script> alert('Data Insert Failed')</script>";       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small class='sm'>Shahjalal islamic ideal school</small></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard </a>/ <i class="fa fa-user"></i> Add Student</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-sm-6">
        <form action="" method='post' enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" id='name' name='name' placeholder="Student Name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="number" id='roll' name='roll' placeholder="Student Roll" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required>
                    <option value="" selected disabled>Select class</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id='city' name='city' placeholder="City Name" class="form-control"required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" id='phone' name='phone' placeholder="Phone Number" class="form-control"required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id='photo' name='photo'required >
            </div>
            <div class="form-group">
                <input type="submit" name='add-student' value="Add student" class='btn btn-primary right' >
            </div>
        </form>
    </div>
</div>
</body>
</html>