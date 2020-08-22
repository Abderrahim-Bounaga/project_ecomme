<?php include "admin_header.php"?>
<?php include "db.php" ?>

<?php 

if (isset($_POST['add_cat'])) {
    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];
   
    
    $cat_img1 = $_FILES['cat_img1']['name'];
   
    $temp_name1 = $_FILES['cat_img1']['tmp_name'];


    move_uploaded_file($temp_name1, "./img/$cat_img1");


    $add_cat = "INSERT INTO categories (Category_title,Category_desc,Category_date,Category_image) VALUES ('$cat_title','$cat_desc',NOW(),' $cat_img1')";
    $add_cat_query = mysqli_query($db,$add_cat);

    if($add_cat_query){
        echo " <script>alert('cat has been added successfully')</script>";
        echo " <script>window.open('add_cat.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add a cat
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_cat.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">cat Title</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>
                    

                   

      
                    <div class="form-group">
                        <label for="cat_image">cat Image </label>
                        <input type="file"  name="cat_img1" class="form-control">
                    </div>

                    

                    
                    
                    <div class="form-group">
                        <label for="cat_desc">cat Description</label>
                        <textarea class="form-control "name="cat_desc" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_cat" value="Add cat">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
