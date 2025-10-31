<?php
session_start();
include 'connection.php';

$user_name=$_SESSION['user']['name'];

$name = $_POST['name'];
$fileTmpPath = $_FILES['img']['tmp_name'];

$fileName = $_FILES['img']['name']; 




move_uploaded_file($fileTmpPath, '../assests/' . $fileName);

if($_SESSION['user']['email']=="admin@gmail.com"){
    $added_by="admin";
}
else{
    $added_by= $user_name;
}


$sql = "INSERT INTO category (name, icon,added_by) VALUES ('$name', '$fileName','{$added_by}')";
if(mysqli_query($conn,$sql)){
    header('location:MangeCategory.php');
}


exit;
