<?php

include 'connection.php';
$fileName = $_FILES['img']['name']; 

$sql="UPDATE product SET name='{$_POST['name']}',image='{$fileName}',description='{$_POST['msg']}', price='{$_POST['price']}'  where id='{$_POST['id']}'";
$query=mysqli_query($conn,$sql);
if($query){
    header('location:MangeProduct.php');
}
else{
    mysqli_error($conn);
}
