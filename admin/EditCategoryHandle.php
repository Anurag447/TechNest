<?php

include 'connection.php';
$fileName = $_FILES['img']['name']; 

$sql="UPDATE category SET name='{$_POST['name']}',icon='{$fileName}' where id='{$_POST['id']}'";
$query=mysqli_query($conn,$sql);
if($query){
    header('location:MangeCategory.php');
}
else{
    mysqli_error($conn);
}
