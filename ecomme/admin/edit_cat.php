<?php include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $pro_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM categories WHERE Category_id = $pro_id ";
$load_product_query = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_product_query)){
$p_id = $row['Category_id'];
$p_title = $row['Category_title'];
$p_desc = $row['Category_desc'];
}

if (isset($_POST['edit_Category'])) {
    $Category_title = $_POST['Category_title'];
    $Category_desc = $_POST['Category_desc'];


    $Category_title = mysqli_real_escape_string($db,$Category_title);
    $Category_desc = mysqli_real_escape_string($db,$Category_desc);

    $query = "UPDATE categories SET Category_title = '$Category_title' , Category_desc = '$Category_desc',  WHERE Category_id = $p_id ";
    $edit_product_query = mysqli_query($db,$query);

    if (!$edit_product_query) {
        die("QUERY FAILED". mysqli_error($db));
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
             <form action="edit_cat.php?edit=<?php echo $p_id ?>" method="post" enctype="multipart/form-data">    
     
     
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
                        <label for="product_desc">Product Description</label>
                        <textarea class="form-control" name="product_desc" id="" cols="30" rows="5"><?php echo $p_desc ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_product" value="Edit product">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>