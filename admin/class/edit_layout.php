<?php
include("../../condb.php");
if(isset($_POST['edit'])||isset($_FILES['value'])){
    $type=$_POST['type'];
    $id=$_POST['id'];
    if($type==='img'){
        
    $file_name=$_FILES['value']['name'];
    $tmp_name=$_FILES['value']['tmp_name'];
    $error = $_FILES['value']['error'];
    $target_dir='../upload/';
        
    if ($error === 0) {
        $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_ex_lc = strtolower($file_ex);
        
        $img_exs = array("png",'jpg','jpeg');
       
        if (in_array($file_ex_lc, $img_exs)) {
            
$letters = range('a', 'z'); // قائمة بالحروف الإنجليزية الصغيرة
shuffle($letters); // تخلط الحروف
$types = implode(array_slice($letters, 0, 3)); // يتم اختيار أول ثلاثة حروف

            $new_image_name = 'image-'.$types. '.'.$file_ex_lc;
            $image_file = $target_dir.$new_image_name;
            $upload=$image_file;
            $move1= move_uploaded_file($tmp_name, $upload);
        }
        $value=$new_image_name;
    }
    }else{
        $value=$_POST['value'];
    }
$sql=mysqli_query($conn,"UPDATE `layout` SET `value`='$value' WHERE `id`='$id'");
if($sql){
    header("Location: ../layout.php?success=edit success");
}else{
    header("Location: ../layout.php?error=No edit");

}
}