<?php
include("header.php");
?>
<form action="class/add_product.php" enctype="multipart/form-data" method="post"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">type</label>
    <select class="form-control" name="type" required id="exampleFormControlSelect1">
        <?php
        $sql=mysqli_query($conn,"SELECT * FROM `cat` WHERE 1");
        while($row=mysqli_fetch_array($sql)){
        ?>
      <option value="<?php echo$row['id'];?>"><?php echo$row['name'];?></option>
      <?php
        }?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Discription</label>
    <textarea class="form-control"name="disc" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Abstract</label>
    <textarea class="form-control" name="abst" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">image cover</label>
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">images</label>
    <input type="file" name="image[]" multiple class="form-control-file" id="exampleFormControlFile1">
  </div>
  <button type="submit" name="add_product" class="btn btn-primary">Add</button>
</form>
<?php
include("footer.php");
?>