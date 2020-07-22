
<?php
 session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_product'])) {
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $categories = $_POST['categories'];
    $product_price = $_POST['product_price'];
    $product_info = $_POST['product_info'];
    $product_desc = $_POST['product_desc'];
   
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "../images/$product_img1");
    move_uploaded_file($temp_name2, "../images/$product_img2");
    move_uploaded_file($temp_name3, "../images/$product_img3");

    $add_product = "INSERT INTO products (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_info,product_desc) VALUES ('$product_cat','$categories',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_info','$product_desc')";
    $add_product_query = mysqli_query($db,$add_product);

    if($add_product_query){
        echo " <script>alert('product has been added successfully')</script>";
        echo " <script>window.open('add_product.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add a product
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_product.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Product Title</label>
                        <input type="text" class="form-control" name="product_title">
                    </div>

                    <div class="form-group">
                        <label for="title">Product categories </label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="product_cat" class="form-control" >
                        
                        <option> Select a category product </option>
                          
                          <?php 

                           $get_p_cats = "SELECT * FROM product_categories";
                           $run_p_cats = mysqli_query($db, $get_p_cats);
                           while($row_p_cat= mysqli_fetch_array($run_p_cats)){
                               $p_cat_id = $row_p_cat['p_cat_id'];
                               $p_cat_title = $row_p_cat['p_cat_title'];

                               echo "
                               <option value=' $p_cat_id' > $p_cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title"> categories </label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="categories" class="form-control" >
                        
                        <option> Select a category </option>
                          
                          <?php 

                           $get_cat = "SELECT * FROM categories";
                           $run_cat = mysqli_query($db, $get_cat);
                           while($row_cat= mysqli_fetch_array($run_cat)){
                               $cat_id = $row_cat['cat_id'];
                               $cat_title = $row_cat['cat_title'];

                               echo "
                               <option value=' $cat_id' > $cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>

      
                    <div class="form-group">
                        <label for="product_image">Product Image 1</label>
                        <input type="file"  name="product_img1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="product_image">Product Image 2</label>
                        <input type="file"  name="product_img2" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="product_image">Product Image 3</label>
                        <input type="file"  name="product_img3" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="number" class="form-control" name="product_price">
                    </div>

                    <div class="form-group">
                        <label for="product_info">Product Infos</label>
                        <textarea class="form-control "name="product_info" id="" cols="30" rows="5">
                        </textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="product_desc">Product Description</label>
                        <textarea class="form-control "name="product_desc" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_product" value="Add product">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
