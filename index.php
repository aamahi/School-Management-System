<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>School Managment Project</title>
</head>

<body>
    <div class="container">
        <a href="admin/login.php"><button type="button" class="btn btn-primary login">Login</button></a>
        <a href="admin/reg.php"><button type="button" class="btn btn-success login">Register</button></a>
        <br>
        <h2 class='header'>Shahjala islamic ideal school</h2>
        <hr>
        <form action="" method='post'>
            <div class="row">
                <div class="col-sm-6 align-self-center tbl">
                    <table class="table table-dark table-bordered">
                        <tr>
                            <td colspan='2' class='text-center'><label>Student Informatio</label></td>
                        </tr>
                        <tr>
                            <td><label for="chose">Select Class</label></td>
                            <td>
                                <select name="class" id="chose" class='form-control' required>
                                    <option value='' selected disabled>Select class</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Foure</option>
                                    <option value="5">Five</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="roll">Roll</label></td>
                            <td><input class='form-control' type="text" id="roll" placeholder='Roll' name='roll' required></td>
                        </tr>
                        <tr>
                            <td colspan='2' class="text-center"><input class="btn btn-primary" type="submit" value='show info' name='show_info'></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
        <?php
        include "./admin/config.php";
        if (isset($_POST['show_info'])) {
            $class = $_POST['class'];
            $roll = $_POST['roll'];
            $query = "SELECT * FROM `stuinfo` WHERE `class`= '{$class}' AND `roll`= '{$roll}'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2 align-self-center tbl">
                        <br>
                        <h2 class='header'>Studnet Information</h2>
                        <hr>
                        <table class='table table-bordered table-dark  '>
                            <tr class="">
                                <td rowspan="5"><img src="./admin/stdimg/<?php echo $row['photo']; ?>" class="image-thumbnail" style="width:135px;"></td>
                                <td>Name</td>
                                <td><?php echo $row['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Roll</td>
                                <td><?php echo $row['roll']; ?></td>
                            </tr>
                            <tr>

                                <td>Class</td>
                                <td><?php echo $row['class']; ?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><?php echo $row['city']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
        <?php
            } else {
                echo "<h2 class='header'> No Information was Found ! </h2>";
            }
        }
        ?>
    </div>
    <br><br> <br>

</body>

</html>