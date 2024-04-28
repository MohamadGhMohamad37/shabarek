<?php
include("../../condb.php");
if(isset($_GET['type'])){
    if($_GET['type']==='cat'){
        $sql=mysqli_query($conn,"DELETE FROM `cat` WHERE `id`='$_GET[id]'");
        $sql_product=mysqli_query($conn,"DELETE FROM `product` WHERE `type`='$_GET[id]'");
        
    if($sql){
        header("Location: ../catogary.php?success=delete item");
    }else{

        header("Location: ../catogary.php?error=not delete");
    }
    }elseif($_GET['type']==='product'){
        $sql=mysqli_query($conn,"DELETE FROM `product` WHERE `id`='$_GET[id]'");
   
        if($sql){
            header("Location: ../product.php?success=delete item");
        }else{
    
            header("Location: ../product.php?error=not delete");
        }
    }
}