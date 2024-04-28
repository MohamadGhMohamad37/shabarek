<?php
include("header.php");
if(isset($_GET['edit_cat'])){
    $sql=mysqli_query($conn,"SELECT * FROM `cat` WHERE `id`='$_GET[edit_cat]'");
    $row=mysqli_fetch_array($sql);
?>
<form action="class/edit_cat.php" method="post"> 
    <input type="text" name="id" value="<?php echo$_GET['edit_cat'];?>" hidden>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" value="<?php echo$row['name'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
  </div>
  <button type="submit" name="add_cat" class="btn btn-primary">Edit</button>
</form>
<?php
}elseif(isset($_GET['edit_product'])){
    $sql=mysqli_query($conn,"SELECT * FROM `product` WHERE `id`='$_GET[edit_product]'");
    $row=mysqli_fetch_array($sql);
    $sql_cat=mysqli_query($conn,"SELECT * FROM `cat` WHERE `id`='$row[type]'");
    $row_cat=mysqli_fetch_array($sql_cat);
?>
<form action="class/edit_product.php" enctype="multipart/form-data" method="post"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" value="<?php echo$row['name']?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
  </div>
  <input type="text" value="<?php echo$row['id'];?>" name="id" hidden>
  <div class="form-group">
    <label for="exampleFormControlSelect1">type</label>
    <select class="form-control" name="type" required id="exampleFormControlSelect1">
        <?php
        $sqles=mysqli_query($conn,"SELECT * FROM `cat` WHERE 1");
        while($rowes=mysqli_fetch_array($sqles)){
            if($rowes['id']===$row['type']){
        ?>
      <option value="<?php echo$rowes['id'];?>" selected><?php echo$rowes['name'];?></option>
      <?php
            }else{
                ?>
      <option value="<?php echo$rowes['id'];?>" ><?php echo$rowes['name'];?></option>

                <?php
            }
        }?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Discription</label>
    <textarea class="form-control"name="disc"  id="exampleFormControlTextarea1" rows="3" required><?php echo$row['disc'];?></textarea>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Abstract</label>
    <textarea class="form-control" name="abst" id="exampleFormControlTextarea1" rows="3" required><?php echo$row['abstract'];?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">image cover</label>
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">images</label>
    <input type="file" name="image[]" multiple class="form-control-file" id="exampleFormControlFile1">
  </div>
  <button type="submit" name="add_product" class="btn btn-primary">Edit</button>
</form>

<?php

}

include("footer.php");
?>