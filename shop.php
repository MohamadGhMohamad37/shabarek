
<?php
include("heade.php");
?>

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <?php
        $sql_cat=mysqli_query($conn,"SELECT * FROM `cat` WHERE 1");
        while($row_cat=mysqli_fetch_array($sql_cat)){
        ?>
        <li>
          <a href="#!" data-filter=".<?php echo$row_cat['type']?>"><?php echo$row_cat['name'];?></a>
        </li>
        <?php
        }
        ?>
      </ul>
      <div class="row trending-box">
        <?php
        $sql=mysqli_query($conn,"SELECT * FROM `product` WHERE 1");
        while($row=mysqli_fetch_array($sql)){
          $sql_cat=mysqli_query($conn,"SELECT * FROM `cat` WHERE `id`='$row[type]'");
        $row_cat=mysqli_fetch_array($sql_cat);
        ?>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 <?php echo$row_cat['type'];?>">
          <div class="item">
            <div class="thumb">
              <a href="product-details.php?id=<?php echo$row['id'];?>"><img style="height: 250px;" src="admin/upload/<?php echo$row['image'];?>" alt=""></a>
             
            </div>
            <div class="down-content">
              <span class="category"><?php echo$row_cat['name'];?></span>
              <h4><?php echo$row['name'];?></h4>
              <a href="product-details.php?id=<?php echo$row['id'];?>"><i class="fa-solid fa-eye"></i></a>
            </div>
          </div>
        </div>
        <?php
        }?>
      </div>
    </div>
  </div>
  
<?php
include("footer.php");
?>