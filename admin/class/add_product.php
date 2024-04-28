<?php
include("../../condb.php");
if(isset($_POST['add_product'])&&isset($_FILES['file'])||isset($_FILES['image'])){
    $namees=$_POST['name'];
    $type=$_POST['type'];
    $disc=$_POST['disc'];
    $abstract=$_POST['abst'];
    //add img
    
$letters = range('a', 'z'); // قائمة بالحروف الإنجليزية الصغيرة
shuffle($letters); // تخلط الحروف
$rr = implode(array_slice($letters, 0, 3)); // يتم اختيار أول ثلاثة حروف

    $file_name=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $target_dir='../upload/';
    if ($error === 0) {
        $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_ex_lc = strtolower($file_ex);
        
        $img_exs = array("png",'jpg','jpeg');
       
        if (in_array($file_ex_lc, $img_exs)) {
            
            $new_image_name = "image-".$rr. '.'.$file_ex_lc;
            $image_file = $target_dir.$new_image_name;
            $upload=$image_file;
            $move1= move_uploaded_file($tmp_name, $upload);
        }
        $upload_image=$new_image_name;
    }
    //add images
    
    if (!empty($_FILES['image']['name'][0])) {
    $upload_mult_img="[";

    foreach($_FILES['image']['name'] as $key=>$name){
        $letters = range('a', 'z'); // قائمة بالحروف الإنجليزية الصغيرة
        shuffle($letters); // تخلط الحروف
        $rr = implode(array_slice($letters, 0, 3)); // يتم اختيار أول ثلاثة حروف
        
        $tmp_name_mult=$_FILES['image']['tmp_name'][$key];
        $name_file_images="images-".$rr. '_'. basename($name);
        $target_file=$target_dir.$name_file_images;
        $move=move_uploaded_file($tmp_name_mult,$target_file);
        $upload_mult_img.=$name_file_images.",";
       
}

if (strpos($upload_mult_img, ',') !== false) {
    $upload_mult_img = rtrim($upload_mult_img, ','); // حذف الفاصلة في نهاية النص

}
$upload_mult_img.="]";
}else{
    $upload_mult_img="";
}
$sql=mysqli_query($conn,"INSERT INTO `product`(`name`, `image`, `imgs`, `type`, `disc`, `abstract`) VALUES ('$namees','$upload_image','$upload_mult_img','$type','$disc','$abstract')");
if($sql){
    header("Location: ../add_product.php?success=success add");
}else{
    header("Location: ../add_product.php?error=not add");
  
}
}