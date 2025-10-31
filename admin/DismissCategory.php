<?php

session_start();
include 'connection.php';

if($_SESSION['user']['email']=="admin@gmail.com"){
$sql="UPDATE category  SET status='Dismissed by Admin' where id='{$_GET['id']}'";
}
else{
    $sql="DELETE FROM category where id='{$_GET['id']}'";
}

$query=mysqli_query($conn,$sql);
if($query){
    header('location:MangeCategory.php');
}
else{
    mysqli_error($conn);
}