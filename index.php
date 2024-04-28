

<?php

include("heade.php");
?>
<style>
  #video-bg {
    position: absolute;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 120vh;
  
  border-radius: 0px 0px 150px 150px;
}
.right-image img{
  width: 100%;
}
@media (max-width: 767px) {
  
  #video-bg {
    height: 499vh;
  }
}
</style>
  <div class="main-banner">
  <video autoplay muted loop id="video-bg">
  <source src="banner-bg copy_2.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            
            <h2>
              <?php echo$data[2]; ?>
          <p style="font-weight: 100;"><?php echo$data[3]; ?></p>
          </h2>
        
           
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="admin/upload/<?php echo$data[0];?>" alt="">
            
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>TOP Product</h6>
            <h2>Most Product</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.php">View All</a>
          </div>
        </div>
        
        <div class="card__container swiper">
          <div class="card__content">
             <div class="swiper-wrapper">
              <?php
              $sql=mysqli_query($conn,"SELECT * FROM `product` WHERE 1");
              if(mysqli_num_rows($sql)>0){
              while($row=mysqli_fetch_array($sql)){
              ?>
              <article class="card__article swiper-slide">
                 <div class="card__image">
                    <img src="admin/upload/<?php echo$row['image'];?>" style="height:250px;" alt="image" class="card__img">
                    <div class="card__shadow"></div>
                 </div>
  
                 <div class="card__data">
                    <h3 class="card__name"><?php echo$row['name'];?></h3>
                    <p class="card__description">
                       <?php 
                       echo$row['disc'];
                       ?>
                    </p>
  
                    <a href="product-details.php?id=<?php echo$row['id'];?>" class="card__button">View More</a>
                 </div>
              </article>
    <?php
              }
              }?>
             </div>
          </div>

          <!-- Navigation buttons -->
          <div class="swiper-button-next">
             <i class="ri-arrow-right-s-line"></i>
          </div>
          
          <div class="swiper-button-prev">
             <i class="ri-arrow-left-s-line"></i>
          </div>

          <!-- Pagination -->
          <div class="swiper-pagination"></div>
       </div>
      </div>
    </div>
  </div>
  
  <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Our Product</h6>
                  <h2><?php echo$data[4]; ?></h2>
                </div>
                <p><?php echo$data[5]; ?></p>
                <div class="main-button">
                  <a href="shop.php">view all</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  
                  <h2>
                  <?php echo$data[6]; ?>
                    <em>SHABAREK Hoses</em></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include("footer.php");
?>