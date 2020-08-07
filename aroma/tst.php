<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="example";
	$conn = mysqli_connect('Localhost','root','','beauty_store');
?>




<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="example";
$conn = mysqli_connect('Localhost','root','','beauty_store');


$result = mysqli_query($conn,"SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<form  method="post">
		<div class="form-group">
		  <label for="sel1">Category</label>
		  <select name="category_id" class="form-control" id="category">
		  <option value="">Select Category</option>
		    <?php
			while($row = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $row["Id"];?>"><?php echo $row["Category_title"];?></option>
			<?php
			}
			?>
			
		  </select>
		</div>
		<div class="form-group">
		  <label for="sel1">Sub Category</label>
		  <select class="form-control" id="sub_category">
			
		  </select>
		</div>
	</form>
</div>
<script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "get_subcat.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
				}
			});
		
		
	});
});
</script>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="example";
$conn = mysqli_connect('Localhost','root','','beauty_store');


  $category_id=$_POST["category_id"];
  


	$result = mysqli_query($conn,"SELECT * FROM sou_category where  Id =$category_id");
?>
<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["id"];?>"><?php echo $row["Sou_Category_title"];?></option>
<?php
}
?>