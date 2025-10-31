<?php
// print_r($_POST);
// exit;

include 'connection.php';
$enc_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$sql="INSERT INTO user (name,email,password) values ('{$_POST['name']}','{$_POST['email']}','{$enc_password}')";

$query=mysqli_query($conn,$sql);

if($query){
    echo "true";
    // header('location:/project/login.php');
}
else{
    echo mysqli_error($conn);
}
