<?php

session_start();
include 'connection.php';


$sql="DELETE FROM product  where id='{$_GET['id']}'";

$query=mysqli_query($conn,$sql);
if($query){
    header('location:MangeProduct.php');
}
else{
    mysqli_error($conn);
}

?>

<H1>DELETED</H1>