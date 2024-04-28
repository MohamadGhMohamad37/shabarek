<?php
include("../condb.php");
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $last=$_POST['surname'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $massage=$_POST['message'];
    $sql=mysqli_query($conn,"INSERT INTO `countact`(`firstname`, `lastname`, `email`, `subject`, `massage`) VALUES ('$name','$last','$email','$subject','$massage')");
    if($sql){
        header("Location: ../contact.php?success=send massage");
    }else{
        header("Location: ../contact.php?error=not send massage");

    }
}