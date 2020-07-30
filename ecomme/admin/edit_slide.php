<?php include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $pro_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM slide WHERE id_slide = $pro_id ";
$load_slide_query = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_slide_query)){
$p_id = $row['id_slide'];
$p_title = $row['title_slide'];
$p_image = $row['image_slide'];
$p_desc = $row['desc_slide'];
}

if (isset($_POST['edit_slide'])) {
    $slide_title = $_POST['slide_title'];
    $slide_image = $_FILES['image']['name'];
    $slide_image_temp = $_FILES['image']['tmp_name'];
    $slide_desc = $_POST['slide_desc'];


    move_uploaded_file($slide_image_temp, "/img/$slide_image");

    $slide_title = mysqli_real_escape_string($db,$slide_title);
    $slide_image = mysqli_real_escape_string($db,$slide_image);
    $slide_desc = mysqli_real_escape_string($db,$slide_desc);
    $trend_slide = mysqli_real_escape_string($db,$trend_slide);
    $slide_info = mysqli_real_escape_string($db,$slide_info);

    $query = "UPDATE slide SET title_slide = '$slide_title' ,image_slide ='$slide_image', desc_slide = '$slide_desc'  WHERE id_slide = $p_id ";
    $edit_slide_query = mysqli_query($db,$query);

    if (!$edit_slide_query) {
        die("QUERY FAILED". mysqli_error($db));
    }

    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit slide
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_slide.php?edit=<?php echo $p_id ?>" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">slide Title</label>
                        <input type="text" value = "<?php echo $p_title ?>" class="form-control" name="slide_title">
                    </div>

                    <!-- <div class="form-group">
                        <select name="post_status" id="">
                            <option value="draft">Post Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div> -->
      
      
      
                    <div class="form-group">
                        <label for="slide_image">slide Image</label>
                        <input type="file"  name="image">
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="slide_desc">slide Description</label>
                        <textarea class="form-control" name="slide_desc" id="" cols="30" rows="5"><?php echo $p_desc ?></textarea>
                    </div>
                   

                    
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_slide" value="Edit slide">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>