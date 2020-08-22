
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_cat'])) {
    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];
   
    $cat_img = $_FILES['cat_img']['name'];
    $temp_name = $_FILES['cat_img']['tmp_name'];

    move_uploaded_file($temp_name, "../images/categories/$cat_img");

    $add_cat = "INSERT INTO categories (cat_title,cat_desc,cat_img) VALUES ('$cat_title','$cat_desc','$cat_img')";
    $add_cat_query = mysqli_query($db,$add_cat);

    if($add_cat_query){
        echo " <script>alert('Product Categories has been added successfully')</script>";
        echo " <script>window.open('veiw_categories.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Categories
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_categories.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Categories Title</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>
      
                    <div class="form-group">
                        <label for="cat_img">Categories Image </label>
                        <input type="file"  name="cat_img" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="cat_desc"> Categories Description</label>
                        <textarea class="form-control "name="cat_desc" id="" cols="30" rows="5">
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_cat" value="Add Categories">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
