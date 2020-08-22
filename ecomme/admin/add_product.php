<?php include "admin_header.php"?>
<?php include "db.php" ?>

<?php 

if (isset($_POST['add_product'])) {
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $categories = $_POST['categories'];
    $product_price = $_POST['product_price'];
    $product_info = $_POST['product_info'];
    $product_desc = $_POST['product_desc'];
    $trend_product = $_POST['trend_product'];
    $promotion = $_POST['promotion'];
    $promo_price = $_POST['promo_price'];
    $promo_date = $_POST['promo_date'];

   
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
   
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "./img/$product_img1");
    move_uploaded_file($temp_name2, "./img/$product_img2");
    move_uploaded_file($temp_name3, "./img/$product_img3");
   

   

    $add_product = "INSERT INTO products (Sou_Category_id,trend_product,Category_id,product_date,product_title,product_image,product_price,product_info,product_desc,product_image2,product_image3,promotion,promo_price,promo_date) VALUES ('$product_cat','$trend_product','$categories',NOW(),'$product_title','$product_img1','$product_price','$product_info','$product_desc','$product_img2','$product_img3',' $promotion','$promo_price','$promo_date')";
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
                        <label for="title"> Product categories </label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="categories" class="form-control" >
                        
                        <option> Select a category </option>
                          
                          <?php 

                           $get_cat = "SELECT * FROM categories";
                           $run_cat = mysqli_query($db, $get_cat);
                           while($row_cat= mysqli_fetch_array($run_cat)){
                               $cat_id = $row_cat['Category_id'];
                               $cat_title = $row_cat['Category_title'];

                               echo "
                               <option value='$cat_id' > $cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Product sou_categories </label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="product_cat" class="form-control" >
                        
                        <option> Select a category product </option>
                          
                          <?php 

                           $get_p_cats = "SELECT * FROM Sou_Category";
                           $run_p_cats = mysqli_query($db, $get_p_cats);
                           while($row_p_cat= mysqli_fetch_array($run_p_cats)){
                               $p_cat_id = $row_p_cat['Sou_Category_id'];
                               $p_cat_title = $row_p_cat['Sou_Category_title'];

                               echo "
                               <option value=' $p_cat_id' > $p_cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">trend product</label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="trend_product" class="form-control" >
                        
                        <option value=0> non </option>
                        <option value=1 >oui </option>
                          
                          

                        </select>
                    </div>
                    


                   

      
                    <div class="form-group">
                        <label for="product_image">Product Image </label>
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
                        <label for="title">Promotion</label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="promotion" class="form-control" >
                        
                        <option value=0> non </option>
                        <option value=1 >oui </option>
                          
                          

                        </select>
                    </div>
                   <div class="form-group">
                        <label for="product_price">Promotion Price</label>
                        <input type="number" class="form-control" name="promo_price">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Promotion Date</label>
                        <input type="datetime-local" class="form-control" name="promo_date">
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
   
