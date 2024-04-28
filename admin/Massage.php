<?php
include("header.php");
$sql=mysqli_query($conn,"SELECT * FROM `countact` WHERE 1");
while($row=mysqli_fetch_array($sql)){
?>
<div class="card" style="width: 100%; margin-top:20px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo$row['firstname']." ".$row['lastname'];?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo$row['email']?></h6>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo$row['subject']?></h6>
    <p class="card-text"><?php echo$row['massage']?></p>
  </div>
</div>

<?php
}
include("footer.php");
?>