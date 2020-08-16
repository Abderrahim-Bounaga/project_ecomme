<?php include "admin_header.php" ?>
<?php include "db.php" ?>



<?php 

if (isset($_POST['add_categories'])) {
    $categories_title = $_POST['categories_title'];
   
    
   
    $categories_img = $_FILES['categories_img']['name'];
   
    $temp_name1 = $_FILES['categories_img']['tmp_name'];
   

    move_uploaded_file($temp_name1, "../img/categories/$categories_img");
   

    $add_product = "INSERT INTO categories (Category_title,Category_image) VALUES ('$categories_title','$categories_img')";
    $add_product_query = mysqli_query($db,$add_product);

    if($add_product_query){
        echo " <script>alert('categories has been added successfully')</script>";
        echo " <script>window.open('categories_product.php','_self')</script>";
    }

}


if (isset($_POST['add_sou_categories'])) {
    $sou_categories_title = $_POST['sou_categories_title'];
   
    $categories = $_POST['categories'];
    
   
    $sou_categories_img = $_FILES['sou_categories_img']['name'];
   
    $temp_name1 = $_FILES['sou_categories_img']['tmp_name'];


    move_uploaded_file($temp_name1, "../img/sou_categories/$sou_categories_img");
   

    $add_product = "INSERT INTO sou_categories (Sou_Category_title,Id,sou_categories_img) VALUES ('$sou_categories_title','$categories','$sou_categories_img')";
    $add_product_query = mysqli_query($db,$add_product);

    if($add_product_query){
        echo " <script>alert('sou_categories has been added successfully')</script>";
        echo " <script>window.open('categories_product.php','_self')</script>";
    }

}
?>








            <div class="container-fluid">

                <!-- Ajoute categories -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Ajoute categories
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <form action="categories_product.php" method="post" enctype="multipart/form-data">    

                <div class="form-group">
              
                        <label for="title">Title categories </label>
                        <input type="text" class="form-control" name="categories_title">
                    </div>
                    <div class="form-group">
                        <label for="product_image">categories Image </label>
                        <input type="file"  name="categories_img" class="form-control">
                    </div>
                <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_categories" value="Ajoute categories">
                    </div>
                    </form>

                                    <!-- /. Ajoute categories -->

                                    <!-- Ajoute sou_categories -->

                    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Ajoute sou_categories
                        </h1>
                        
                    </div>
                </div>
                    <div class="form-group">
                    
                    <div class="form-group">
                    <div class="form-group">
                        <label for="title">Title categories </label>
                        <input type="text" class="form-control" name="sou_categories_title">
                    </div>
                    <div class="form-group">
                        <label for="product_image">sou_categories Image </label>
                        <input type="file"  name="sou_categories_img" class="form-control">
                    </div>
                
                        <label for="title"> Select categories </label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="categories" class="form-control" >
                        
                        <option> Select a category </option>
                          
                          <?php 

                           $get_cat = "SELECT * FROM categories";
                           $run_cat = mysqli_query($db, $get_cat);
                           while($row_cat= mysqli_fetch_array($run_cat)){
                               $cat_id = $row_cat['Id'];
                               $cat_title = $row_cat['Category_title'];

                               echo "
                               <option value='$cat_id' > $cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>
                    </div>

                   

                    <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_sou_categories" value="Ajoute sou_categories ">
                    </div>

                      <!-- /. Ajoute sou_categories -->
                    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        categories List
                        </h1>
                        
                    </div>
                    </form>

                </div>
               
<?php include "db.php" ?>




<?php 
function categories()
{
	
	include "db.php";
	$sql = "SELECT * FROM categories ";
	$result = $db->query($sql);
	
	$categories = array();
	
	while($row = $result->fetch_assoc())
	{
		$categories[] = array(

			'cat_id ' => $row['cat_id '],
			'Category_image' => $row['Category_image'],


			
			'Category_title' => $row['Category_title'],
			'Id' => sub_categories($row['Id']),
		);
	}
	
	return $categories;
}


function sub_categories($id)
{	
	include "db.php";

	
	$sql = "SELECT p_cat_title  FROM product_categories  WHERE p_cat_id  = $id ";
	$result = $db->query($sql);
	
	$categories = array();
	
	while($row = $result->fetch_assoc())
	{
		$categories[] = array(
			
			'p_cat_title ' => ($row['p_cat_title ']),
		);
	}
	return $categories;
}
?>


<?php
function viewsubcat($categories)
{
	$html = '<ul> ';


	if (is_array($categories) || is_object($categories))
{
  // If yes, then foreach() will iterate over it.
  foreach($categories as $category){

	$html .= '<li>'.$category['Sou_Category_title'].'</li>';
	
	
}

	
	}
	$html .= '</ul>';
	
	return $html;
}
?>
 <table class="table table-bordered table-hover">
 <thead>
                    <tr>
                
                        
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>souCatigores</th>
                        
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>

<?php $categories = categories(); ?>

<?php foreach($categories as $category){
	?>


		


		
	<tr>
                               <td><?php echo $category['Category_title'] ?></td>
                               <td><img class= 'img-responsive' src='../img/<?php echo $category['Category_image'] ?>' alt='' width='100' height='100'></td>
                               <td>	<?php 
			if( ! empty($category['Id'])){
				echo viewsubcat($category['Id']);
			} 
		?></td>

<td><a href='edit_product.php?edit='>Edit</a></td>
<td><a href='edit_product.php?edit='>Edit</a></td>


	</tr>
<?php } ?>


            

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>