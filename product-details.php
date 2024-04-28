
<?php
include("heade.php");
$id=$_GET['id'];
$sql=mysqli_query($conn,"SELECT * FROM `product` WHERE `id`='$id'");
$row=mysqli_fetch_array($sql);
?>
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Hoses</h3>
          <span class="breadcrumb"><a href="#">Home</a>  >  <a href="#">Shop</a>  >  Hoses</span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="admin/upload/<?php echo$row['image'];?>" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4><?php echo$row['name'];?> : 
        <?php
        $sql_cat=mysqli_query($conn,"SELECT * FROM `cat` WHERE `id`='$row[type]'");
        $row_cat=mysqli_fetch_array($sql_cat);
        echo$row_cat['name'];
        ?>
        </h4>
          <p><?php echo$row['abstract'];?></p>
          
        </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <?php echo$row['disc'];?>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section most-played">
    <div class="container">
      <div class="row">
        
        <div class="card__container swiper">
          <div class="card__content">
             <div class="swiper-wrapper">
              
          <?php
          if(($row['imgs']!=="")AND($row['imgs']!==" ")){
            $imgs=$row['imgs'];
            if ((strpos($imgs, '[') !== false) || (strpos($imgs, ']') !== false) ) {
    
              $new_name = str_replace("]","", $imgs);
              $new_name = str_replace("[","", $new_name);
              $new_name = str_replace('"',"", $new_name);
              $extensions = explode(",", $new_name);
          }
          $i=0;
          
          foreach ($extensions as $extension) {
              $array[$i]=$extension;
              $i++;
            }
            foreach ($array as $arrayes) {
           
          ?>
              <article class="card__article swiper-slide">
                 <div class="card__image">
                    <img src="admin/upload/<?php echo$arrayes;?>" alt="image" class="card__img">
                    <div class="card__shadow"></div>
                 </div>
  
                 
              </article>
              <?php
            }
          }
          
          ?>
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
  
<?php
include("footer.php");
?>