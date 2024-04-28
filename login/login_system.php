<?php
include("../condb.php");
session_start();

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $check_email=mysqli_query($conn,"SELECT * FROM `user` WHERE `email`='$email'");
    if(mysqli_num_rows($check_email)>0){
        $row=mysqli_fetch_array($check_email);
        if($password===$row['password']){
            $_SESSION['user_id_SHABAREK']=$row['id'];
            header("Location: ../admin/index.php");
        }else{
            header("Location: index.php?error=The password not corect $password");
        }
    }else{
        header("Location: index.php?error=The email not corect ");
    }
}