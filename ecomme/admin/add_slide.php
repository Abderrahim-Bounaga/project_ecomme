<?php include "admin_header.php"?>
<?php include "db.php" ?>

<?php 

if (isset($_POST['add_slide'])) {
    $slide_title = $_POST['slide_title'];
    $slide_desc = $_POST['slide_desc'];

   
    $slide_img1 = $_FILES['slide_img1']['name'];
   
    $temp_name1 = $_FILES['slide_img1']['tmp_name'];
   

    move_uploaded_file($temp_name1, "img/$slide_img1");
   

    $add_slide = "INSERT INTO slide (title_slide,image_slide,desc_slide) VALUES ('$slide_title','$slide_img1','$slide_desc')";
    $add_slide_query = mysqli_query($db,$add_slide);

    if($add_slide_query){
        echo " <script>alert('slide has been added successfully')</script>";
        echo " <script>window.open('add_slide.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add a slide
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_slide.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">slide Title</label>
                        <input type="text" class="form-control" name="slide_title">
                    </div>
                    

                    
                    
                   

      
                    <div class="form-group">
                        <label for="slide_image">slide Image </label>
                        <input type="file"  name="slide_img1" class="form-control">
                    </div>

                    

                    

                    

                    
                    <div class="form-group">
                        <label for="slide_desc">slide Description</label>
                        <textarea class="form-control "name="slide_desc" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_slide" value="Add slide">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
