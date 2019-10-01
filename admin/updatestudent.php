<?php 
    $id= base64_decode($_GET['id']);
    $query = "SELECT * FROM `stuinfo` WHERE `id`='{$id}'";
    $result= mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['update-student'])){
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $class = $_POST['class'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        
    $query = "UPDATE `stuinfo` SET `name`='{$name}',`roll`= '{$roll}',`class`='{$class}',`city`= '{$city}',`phone`= '{$phone}' WHERE `id`= '{$id}' ";
        $result =mysqli_query($connection,$query);
        if($result){
            echo "<script> alert('Data Insert Sucessfully')</script>";
            header("location:index.php?page=all-student");
        }else{
            echo "<script> alert('Data Insert Failed')</script>";       
        }
    }

?>
<h1 class="text-primary"><i class="fa fa-user-plus"></i> Update Student <small class='sm'>Shahjalal islamic ideal school</small></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard /</a> <a href="index.php?page=add-student"><i class="fa fa-user"></i> Add Student / </a><i class="fa fa-pencil-square-o"></i>Update Student</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-sm-6">
        <form action="" method='post' enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" id='name' name='name' placeholder="Student Name" class="form-control" value="<?echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="number" id='roll' name='roll' placeholder="Student Roll" class="form-control"value="<?echo $row['roll']; ?>" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control"value="<? echo $row['class']; ?>" required>
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
                <input type="text" id='city' name='city' placeholder="City Name" class="form-control" value="<?echo $row['city']; ?>"required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" id='phone' name='phone' placeholder="Phone Number" class="form-control" value="<?echo $row['phone']; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" name='update-student' value="Update student" class='btn btn-primary right' >
            </div>
        </form>
    </div>
</div>