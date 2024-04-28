<?php
include("../../condb.php");
if(isset($_POST['add_cat'])){
    $name=$_POST['name'];
    $id=$_POST['id'];

    $sql=mysqli_query($conn,"UPDATE `cat` SET `name`='$name' WHERE `id`='$id'");
    if($sql){
        header("Location: ../catogary.php?success=edit items");
    }else{
        header("Location: ../catogary.php?error=Not edit error");
    }
}