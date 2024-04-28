<?php
include("header.php");
?>

<section class="" style="width: 100%;">
  <h2 class="cd-title">Search Table Record:</h2>
  <input type="text" class="cd-search table-filter" data-table="order-table" placeholder="Item to filter.." />
 <a href="add_product.php"><button type="button" class="btn btn-success">Add product</button></a> 
<style>
.cd-table-container{
  background: #fff;
  box-shadow: 1px 2px 26px rgba(0, 0, 0, 0.2);
  padding: 15px;
  max-width: 720px;
}
/* Table Design */
.cd-table{
  width: 100%;
  color: #666;
  margin: 10px auto;
  border-collapse: collapse;
}

.cd-table tr,
.cd-table td{
  border: 1px solid #ccc;
  padding: 10px;
}
.cd-table th{
  background: #017721;
  color: #fff;
  padding: 10px;
}

/* Search Box */
.cd-search{
  padding: 10px;
  border: 1px solid #ccc;
  width: 100%;
  box-sizing: border-box;
}

/* Search Title */
.cd-title{
  color: #666;
  margin: 15px 0;
}
table ul{
  margin: 0px;
  padding: 0px;
}
table ul li{
  display: inline-block;
  cursor: pointer;
  width: 100px;
  height: 100px;
}
table ul li img{
  width: 100%;
  height: 100%;
}
 #show_image_popup{
  width: 400px;
  height: 400px;
  border: 1px solid #333;
  box-sizing: border-box;
  padding: 5px;
  text-align: center;
  position: absolute;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #e5e5e5;
/*    */
  display: none;
}
 #show_image_popup img{
  max-width: 90%;
  height: auto;
}

 #all-images .active{
  filter: blur(5px);
}
 .close-btn-area{
  width: 100%;
  text-align: right;
  margin-bottom: 5px;
  
}
table .close-btn-area button{
  cursor: pointer;
}

</style>
  </style>
  <table class="cd-table order-table table" style="width: 100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>type</th>
        <th>Disc</th>
        <th>Abstract</th>
        <th>image</th>
        <th>images</th>
        <th>action</th>
      </tr>
    </thead>

    <tbody>
        <?php
            $sql=mysqli_query($conn,"SELECT * FROM `product` WHERE 1");
            if(mysqli_num_rows($sql)>0){
            while($row=mysqli_fetch_array($sql)){
              $sql_cat=mysqli_query($conn,"SELECT * FROM `cat` WHERE `id`='$row[type]'");
              $row_cat=mysqli_fetch_array($sql_cat);
        ?>
      <tr>
        <td><?php echo$row['name'];?></td>
        <td><?php echo$row_cat['name'];?></td>
        <td><?php echo$row['disc'];?></td>
        <td><?php echo$row['abstract'];?></td>

        <td>
        <ul id="all-images">
          <li>
          <img src="upload/<?php echo$row['image'];?>" class="small-image" alt=""></td>
          </li>
            </ul>
        <td>
          <ul id="all-images">
          <?php
          if(($row['imgs']!=="")AND($row['imgs']!==" ")){
            $imgs=$row['imgs'];
            if ((strpos($imgs, '[') !== false) || (strpos($imgs, ']') !== false) ) {
              if(strpos($imgs,',') !==false ){
              $new_name = str_replace("]","", $imgs);
              $new_name = str_replace("[","", $new_name);
              $new_name = str_replace('"',"", $new_name);
              $extensions = explode(",", $new_name);
          
          $i=0;
          
          foreach ($extensions as $extension) {
              $array[$i]=$extension;
              $i++;
            }
            foreach ($array as $arrayes) {
           
          ?>
    <li>
      <img class="small-image" src="upload/<?php echo$arrayes;?>" alt="">
    </li>
         
          <?php
            }
          
          }else{
            $new_name = str_replace("]","", $imgs);
            $new_name = str_replace("[","", $new_name);
            ?>
            <li>
              <img class="small-image" src="upload/<?php echo$new_name;?>" alt="">
            </li>

            <?php
          }
            }
          ?>
           </ul>
           <?php
          }?>
        </td>
        <td>
            <a href="class/delete.php?type=product&id=<?php echo$row['id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
            <a href="edit.php?edit_product=<?php echo$row['id'];?>"><button type="button" class="btn btn-warning">Edit</button></a>
        </td>
      </tr>
      <?php
            }
            }?>

    </tbody>
  </table>

<!-- // popup modal -->

<div id="show_image_popup">
  <div class="close-btn-area">

    <button id="close-btn">X</button> 
  </div>
  <div id="image-show-area">
    <img id="large-image" src="" alt="">
  </div>
</div>


</section>
<script>
    
(function() {
	'use strict';

var TableFilter = (function() {
 var Arr = Array.prototype;
		var input;
  
		function onInputEvent(e) {
			input = e.target;
			var table1 = document.getElementsByClassName(input.getAttribute('data-table'));
			Arr.forEach.call(table1, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, filter);
				});
			});
		}

		function filter(row) {
			var text = row.textContent.toLowerCase();
       //console.log(text);
      var val = input.value.toLowerCase();
      //console.log(val);
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = onInputEvent;
				});
			}
		};
 
	})();

  /*console.log(document.readyState);
	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
      console.log(document.readyState);
			TableFilter.init();
		}
	}); */
  
 TableFilter.init(); 
})();
$( document ).ready(function(){






// with animation  

  $("#close-btn").click(function(){
     // remove active class from all images
    $(".small-image").removeClass('active');
    $("#show_image_popup").slideUp();
  })

  $(".small-image").click(function(){
      // remove active class from all images
     $(".small-image").removeClass('active');
    // add active class
     $(this).addClass('active');

    var image_path = $(this).attr('src'); 
    $("#show_image_popup").fadeOut();
    // now st this path to our popup image src
    $("#show_image_popup").fadeIn();
    $("#large-image").attr('src',image_path);

  })

})


</script>
<?php
include("footer.php");
?>