<?php
session_start();
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM user where email = '{$email}'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user']=$row;
        if (password_verify($password, $row['password'])) {
            header('location:../dashboard.php');
        } else {
            echo 'Invalid Password entered';
            header('location:../login.php');
        }
    } else {
        echo 'Email not Found';
        header('location:../login.php');
    }
} else {
    $_SESSION['error'] = 'Please Try again';
    header('location:../login.php');
}
