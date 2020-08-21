
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_p_cat'])) {
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_desc = $_POST['p_cat_desc'];
   
    $p_cat_img = $_FILES['p_cat_img']['name'];
    $temp_name = $_FILES['p_cat_img']['tmp_name'];

    move_uploaded_file($temp_name, "../images/product_categories/$p_cat_img");

    $add_p_cat = "INSERT INTO product_categories (p_cat_title,p_cat_desc,p_cat_img) VALUES ('$p_cat_title','$p_cat_desc','$p_cat_img')";
    $add_p_cat_query = mysqli_query($db,$add_p_cat);

    if($add_p_cat_query){
        echo " <script>alert('Product Categories has been added successfully')</script>";
        echo " <script>window.open('veiw_p_cat.php.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Product Categories
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_p_cat.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Product Categories Title</label>
                        <input type="text" class="form-control" name="p_cat_title">
                    </div>
      
                    <div class="form-group">
                        <label for="p_cat_img">Product Categories Image </label>
                        <input type="file"  name="p_cat_img" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="p_cat_desc">Product Categories Description</label>
                        <textarea class="form-control "name="p_cat_desc" id="" cols="30" rows="5">
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_p_cat" value="Add Product Categories">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
