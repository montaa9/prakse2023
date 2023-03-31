<?php
include_once 'connection.php';

if($_SESSION['role']==0){
    header("location:home.php");
    die();
}

$id=$_GET['uid'];
$query = "DELETE FROM users WHERE user_id = $id";
$result=mysqli_query($conn,$query);

header("location:allusers.php");




?>