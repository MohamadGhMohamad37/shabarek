<?php
include("header.php");
?>
<form action="class/add_cat.php" method="post"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
  </div>
  <button type="submit" name="add_cat" class="btn btn-primary">Add</button>
</form>
<?php
include("footer.php");
?>