<?php
include("header.php");
$id=$_GET['id'];
$type=$_GET['type'];
$sql=mysqli_query($conn,"SELECT * FROM `layout` WHERE `id`='$id'");
$row=mysqli_fetch_array($sql);
?>

<form action="class/edit_layout.php" enctype="multipart/form-data" method="post"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" value="<?php echo$row['name'];?>" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required disabled>
  </div>
  <input type="text" name="type" value="<?php echo$type;?>" hidden>
  <input type="text" name="id" value="<?php echo$row['id'];?>" hidden>
  <?php
  if($type==='img'){
    ?>
    <div class="form-group">
      <label for="exampleFormControlFile1">image cover</label>
      <input type="file" name="value" class="form-control-file" id="exampleFormControlFile1" required>
    </div>

    <?php

  }elseif($type==='map'){
    ?>

<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="url" name="value" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required >
  </div>
    <?php

  }else{
    ?>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Discription</label>
      <textarea class="form-control"name="value" id="exampleFormControlTextarea1" rows="3" required></textarea>
    </div>

    <?php
  }
  ?>
  <button type="submit" name="edit" class="btn btn-primary">Edit</button>

</form>

<?php
include("footer.php");
?>