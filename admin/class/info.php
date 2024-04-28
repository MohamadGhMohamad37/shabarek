<?php
include("../../condb.php");
if(isset($_POST['edit_info'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql=mysqli_query($conn,"UPDATE `user` SET `email`='$email',`password`='$password' WHERE `id`='1'");
    if($sql){
        header("Location: ../profile.php?success=edit info");
    }else{
header("Location: ../profile.php?error=not edit");
    }
}