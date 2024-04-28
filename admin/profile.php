<?php
include("header.php");
$sql=mysqli_query($conn,"SELECT * FROM `user` WHERE `id`='1'");
$row=mysqli_fetch_array($sql);
?>
<form method="post" action="class/info.php">
  <div class="form-group" >
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" required value="<?php echo$row['email'];?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" required name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="edit_info" class="btn btn-primary">Submit</button>
</form>
<?php
include("footer.php");

?>