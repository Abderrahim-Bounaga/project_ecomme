<?php include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $pro_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM products WHERE product_id = $pro_id ";
$load_product_query = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_product_query)){
$p_id = $row['product_id'];
$p_title = $row['product_title'];
$p_image1 = $row['product_img1'];
$p_image2 = $row['product_img2'];
$p_image3 = $row['product_img3'];
$p_desc = $row['product_desc'];
$p_info = $row['product_info'];
$p_price = $row['product_price'];
}

if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    $product_desc = $_POST['product_desc'];
    $product_info = $_POST['product_info'];
    $product_price = $_POST['product_price'];
    
    move_uploaded_file($temp_name1, "../images/$product_img1");
    move_uploaded_file($temp_name2, "../images/$product_img2");
    move_uploaded_file($temp_name3, "../images/$product_img3");

    $product_title = mysqli_real_escape_string($db,$product_title);
    $product_img1 = mysqli_real_escape_string($db,$product_img1);
    $product_img2 = mysqli_real_escape_string($db,$product_img2);
    $product_img3 = mysqli_real_escape_string($db,$product_img3);
    $product_desc = mysqli_real_escape_string($db,$product_desc);
    $product_info = mysqli_real_escape_string($db,$product_info);

    $query = "UPDATE products SET product_title = '$product_title' ,product_img1 ='$product_img1',product_img2 ='$product_img2',product_img3 ='$product_img3', product_desc = '$product_desc', product_info = '$product_info', product_price = '$product_price'  WHERE product_id = $p_id ";
    $edit_product_query = mysqli_query($db,$query);

    if (!$edit_product_query) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_product_query){
        echo " <script>alert('product has been edit successfully')</script>";
        echo " <script>window.open('add_product.php','_self')</script>";
    }
    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit product
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_product.php?edit=<?php echo $p_id ?>" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Product Title</label>
                        <input type="text" value = "<?php echo $p_title ?>" class="form-control" name="product_title">
                    </div>

                    <!-- <div class="form-group">
                        <select name="post_status" id="">
                            <option value="draft">Post Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div> -->
      
      
      
                    <div class="form-group">
                        <label for="product_image">Product Image 1</label>
                        <input type="file" value = "<?php echo $p_image1 ?>"  name="product_img1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="product_image">Product Image 2</label>
                        <input type="file" value = "<?php echo $p_image2 ?>" name="product_img2" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="product_image">Product Image 3</label>
                        <input type="file" value = "<?php echo $p_image3 ?>" name="product_img3" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="number" value = "<?php echo $p_price ?>" class="form-control" name="product_price">
                    </div>

                    <div class="form-group">
                        <label for="product_info">Product Infos</label>
                        <textarea class="form-control" name="product_info" id="" cols="30" rows="5"><?php echo $p_info ?></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="product_desc">Product Description</label>
                        <textarea class="form-control" name="product_desc" id="" cols="30" rows="5"><?php echo $p_desc ?></textarea>
                    </div>
                   

                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="number" value = "<?php echo $p_price ?>" class="form-control" name="product_price">
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_product" value="Edit product">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->


            <script src="js/tinymce/tinymce.min.js" ></script>
            <script>tinymce.init({selector: 'textarea'});</script> 
        

    <?php include "admin_footer.php" ?>