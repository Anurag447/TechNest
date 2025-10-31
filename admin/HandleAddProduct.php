<?php
session_start();
include 'connection.php';

$user_name=$_SESSION['user']['name'];

$name = $_POST['name'];
$description = $_POST['msg'];
$price = $_POST['price'];
$category = $_POST['category'];

$fileTmpPath = $_FILES['img']['tmp_name'];

$fileName = $_FILES['img']['name']; 




move_uploaded_file($fileTmpPath, '../assests/' . $fileName);

if($_SESSION['user']['email']=="admin@gmail.com"){
    $added_by="admin";
}
else{
    $added_by= $user_name;
}


$sql = "INSERT INTO product (name,description,price,category_name,image,added_by) VALUES ('$name','$description', '$price','$category', '$fileName','{$added_by}')";
// echo $sql;
// exit;
if(mysqli_query($conn,$sql)){

    header('location:MangeProduct.php');
}


exit;
