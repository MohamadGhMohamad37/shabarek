<?php
include('header.php');
include('../condb.php');
?>

<section class="">
  <h2 class="cd-title">Search Table Record:</h2>
  <input type="text" class="cd-search table-filter" data-table="order-table" placeholder="Item to filter.." />
<style>
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
</style>
  </style>
  <table class="cd-table order-table table" style="width: 100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>type</th>
        <th>value</th>
        <th>action</th>
      </tr>
    </thead>

    <tbody>
        <?php
            $sql=mysqli_query($conn,"SELECT * FROM `layout` WHERE 1");
            if(mysqli_num_rows($sql)>0){
            while($row=mysqli_fetch_array($sql)){
        ?>
      <tr>
        <td><?php echo$row['name'];?></td>
        <td><?php echo$row['type'];?></td>
        <td>
            <?php
            if($row['type']==='img'){
            ?>
            <img width="100%" src="upload/<?php echo$row['value'];?>" alt="">
            <?php
            }elseif($row['type']==='map'){
                ?>
                <iframe src="<?php echo$row['value'];?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <?php
            }else{
                echo$row['value'];
            }?>
        </td>
        <td>
            <a href="edit_layout.php?id=<?php echo$row['id'];?>&type=<?php echo$row['type'];?>"><button type="button" class="btn btn-warning">Edit</button></a>
        </td>
      </tr>
      <?php
            }
            }?>

    </tbody>
  </table>

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
</script>
<?php
include('footer.php');
?>
