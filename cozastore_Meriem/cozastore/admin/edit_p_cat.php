<?php 
session_start();
include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $p_cat_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM product_categories WHERE p_cat_id = $p_cat_id ";
$load_p_cat = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_p_cat)){
$pr_cat_id = $row['p_cat_id'];
$pr_cat_title = $row['p_cat_title'];
$pr_cat_image = $row['p_cat_img'];
$pr_cat_desc = $row['p_cat_desc'];

}

if (isset($_POST['edit_p_cat'])) {
    $pro_cat_title = $_POST['pro_cat_title'];
    $pro_cat_img = $_FILES['pro_cat_img']['name'];
    $temp_name = $_FILES['pro_cat_img']['tmp_name'];
    $pro_cat_desc = $_POST['pro_cat_desc'];
    
    move_uploaded_file($temp_name, "../images/product_categories/$pro_cat_img");

    $pro_cat_title = mysqli_real_escape_string($db,$pro_cat_title);
    $pro_cat_img = mysqli_real_escape_string($db,$pro_cat_img);
    $pro_cat_desc = mysqli_real_escape_string($db,$pro_cat_desc);

    $query = "UPDATE product_categories SET p_cat_title = '$pro_cat_title' ,p_cat_img ='$pro_cat_img ', p_cat_desc = '$pro_cat_desc'   WHERE p_cat_id = $pr_cat_id ";
    $edit_p_cat_query = mysqli_query($db,$query);

    if (!$edit_p_cat_query) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_p_cat_query){
        echo " <script>alert('product has been edit successfully')</script>";
        echo " <script>window.open('view_p_cat.php','_self')</script>";
    }
    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Product Categories
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_p_cat.php?edit=<?php echo $pr_cat_id ?>" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Product Title</label>
                        <input type="text" value = "<?php echo $pr_cat_title ?>" class="form-control" name="pro_cat_title">
                    </div>
      
                    <div class="form-group">
                        <label for="pro_cat_img">Product Image 1</label>
                        <input type="file" value = "<?php echo $pr_cat_image ?>"  name="pro_cat_img" class="form-control">
                    </div>

                    
                    <div class="form-group">
                        <label for="pro_cat_desc">Product Description</label>
                        <textarea class="form-control" name="pro_cat_desc" id="" cols="30" rows="5"><?php echo $pr_cat_desc ?></textarea>
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_p_cat" value="Edit product">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->


            <script src="js/tinymce/tinymce.min.js" ></script>
            <script>tinymce.init({selector: 'textarea'});</script> 
        

    <?php include "admin_footer.php" ?>