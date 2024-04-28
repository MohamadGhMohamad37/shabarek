<?php
include("condb.php");
$sqltitle_banier=mysqli_query($conn,"SELECT * FROM `layout` WHERE 1");
$i=0;
while($row_title_banier=mysqli_fetch_array($sqltitle_banier)){
$data[$i]=$row_title_banier['value'];
$i++;
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>SHABAREK Hoses</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>

<body>
  <style>
    .header-area .main-nav .logo img
 {
      width: 8%;
    }
.background-header .logo img {
  max-width: 100%;
  
}
@media (max-width: 992px) {
    .header-area .main-nav .logo img
 {
      width: 50%;
    }
}
  </style>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">


    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo" style="display: flex;">
                      <img src="admin/upload/<?php echo$data[13];?>" style=" " alt="" >  
                      
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="index.php" class="active">Home</a></li>
                      <li><a href="shop.php">Our Shop</a></li>
                      <li><a href="contact.php">Contact Us</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->