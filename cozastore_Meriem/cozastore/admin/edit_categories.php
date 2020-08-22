<?php 
session_start();
include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
$load_cat = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_cat)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
$cat_image = $row['cat_img'];
$cat_desc = $row['cat_desc'];

}

if (isset($_POST['edit_cat'])) {
    $categ_title = $_POST['categ_title'];
    $categ_img = $_FILES['categ_img']['name'];
    $temp_name = $_FILES['categ_img']['tmp_name'];
    $categ_desc = $_POST['categ_desc'];
    
    move_uploaded_file($temp_name, "../images/categories/$categ_img");

    $categ_title = mysqli_real_escape_string($db,$categ_title);
    $categ_img = mysqli_real_escape_string($db,$categ_img);
    $categ_desc = mysqli_real_escape_string($db,$categ_desc);

    $query = "UPDATE categories SET cat_title = '$categ_title' , cat_desc = '$categ_desc' ,cat_img ='$categ_img '  WHERE cat_id = $cat_id ";
    $edit_cat_query = mysqli_query($db,$query);

    if (!$edit_cat_query) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_cat_query){
        echo " <script>alert('The Categories has been edit successfully')</script>";
        echo " <script>window.open('view_categories.php','_self')</script>";
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
             <form action="edit_categories.php?edit=<?php echo $cat_id ?>" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="categ">Product Title</label>
                        <input type="text" value = "<?php echo $cat_title ?>" class="form-control" name="categ_title">
                    </div>
      
                    <div class="form-group">
                        <label for="categ_img">Product Image 1</label>
                        <input type="file" value = "<?php echo $cat_image ?>"  name="categ_img" class="form-control">
                    </div>

                    
                    <div class="form-group">
                        <label for="categ_desc">Product Description</label>
                        <textarea class="form-control" name="categ_desc" id="" cols="30" rows="5"><?php echo $cat_desc ?></textarea>
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_cat" value="Edit product">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->


            <script src="js/tinymce/tinymce.min.js" ></script>
            <script>tinymce.init({selector: 'textarea'});</script> 
        

    <?php include "admin_footer.php" ?>