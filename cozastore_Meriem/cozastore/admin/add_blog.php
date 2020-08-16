
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_blog'])) {
    $blog_title = $_POST['blog_title'];
    $blog_desc = $_POST['blog_descrp'];
   
    $blog_img = $_FILES['blog_imag']['name'];
    $temp_name = $_FILES['blog_imag']['tmp_name'];

    move_uploaded_file($temp_name, "../images/blog/$blog_img");

    $add_blog = "INSERT INTO Blog (blog_title,blog_img,blog_date,blog_desc) VALUES ('$blog_title','$blog_img',NOW(),'$blog_desc')";
    $add_blog_query = mysqli_query($db,$add_blog);

    if($add_blog_query){
        echo " <script>alert('Blog has been added successfully')</script>";
        echo " <script>window.open('add_blog.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Blog
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_blog.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="blog_title">Blog Title</label>
                        <input type="text" class="form-control" name="blog_title">
                    </div>

                    <div class="form-group">
                        <label for="blog_image">Blog Image </label>
                        <input type="file"  name="blog_imag" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="blog_descrp">Blog Description</label>
                        <textarea class="form-control "name="Blog_descrp" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_blog" value="Add blog">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
