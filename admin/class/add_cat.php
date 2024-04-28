<?php
include("../../condb.php");
if(isset($_POST['add_cat'])){
    $name=$_POST['name'];

$letters = range('a', 'z'); // قائمة بالحروف الإنجليزية الصغيرة
shuffle($letters); // تخلط الحروف
$type = implode(array_slice($letters, 0, 3)); // يتم اختيار أول ثلاثة حروف



    $sql=mysqli_query($conn,"INSERT INTO `cat`(`name`, `type`) VALUES ('$name','$type')");
    if($sql){
        header("Location: ../add_catogary.php?success=add items");
    }else{
        header("Location: ../add_catogary.php?error=Not add error");
    }
}