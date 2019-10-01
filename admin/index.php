<?php 
session_start();
if(!isset($_SESSION['user-login'])){
    header("location:login.php");
}
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="script.js"></script>
    <style>
       .sm{
            font-family: Verdana,arial !important;
        }
        .f10{
            float: right;
            font-size:45px;
        }
        .allstd{
            float:right;
        }
        .ftr{
            /* margin-top:320px; */
            background:#337ab7;
            color:#fff;
            padding:10px 0;
            text-align:center;
            font-size:15px;
        }
        .ftr p{
            margin:0;
        }
        .content{
            min-height:500px;
        }
        .img{
            height:96px;
            width:96px;
        }
        .d{
            font-weight:bold;
            letter-spacing:1.5px;
        }
        .error{
            text-align:center;
            color:red;
        }
        .right{
            float:right;
            margin-bottom : 10px;
        }
        label{
            color:#337ab7;
        }
    </style>
    <title>School Managment Admin Dashboad</title>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="#">Shahjalal Islamic ideal school</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php?page=dashboard"><span class="glyphicon glyphicon-home"></span> Wellcome</a></li>
      <li><a href="reg.php"><span class="glyphicon glyphicon-user"></span> Add user</a></li>
      <li><a href="index.php?page=profile"><span class="glyphicon glyphicon-plus"></span> Profile</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group">
                <a href="index.php?page=dashboard"class="list-group-item active d"><i class="fa fa-dashboard"></i> Dashboard</a>
                <a href="index.php?page=all-student"class="list-group-item d"><i class="fa fa-user"> </i>  All Student</a>
                <a href="index.php?page=add-student"class="list-group-item d"><i class="fa fa-user-plus"></i>  Add Student</a>
                <a href="index.php?page=all-user"class="list-group-item d"><i class="fa fa-user"> </i>  All User</a>
                <a href="logout.php"class="list-group-item d"><i class="fa fa-power-off"> </i> Log out</a>
            </ul>
        </div>
        <div class="col-sm-9">

       <?php 
            if(isset($_GET['page'])){
                $page = "{$_GET['page']}.php";
            }else{
                $page='dashboard.php';
            }
            if(file_exists($page)){
                require_once $page;
            }else{
                require_once "error.php";
            }

       ?>


        </div>
    </div>
</div>
<footer class='ftr'>
            <p>All Rights Reserved © Shahjalal islamic ideal school | By Mahi's Technologies</p>
</footer>
</body>
</html>