<?php 
require_once("config.php");
$id= base64_decode($_GET['id']);
$dbdel = "DELETE FROM `stuinfo` WHERE `id`='{$id}'";
$res = mysqli_query($connection,$dbdel);
header("location:index.php?page=all-student");
