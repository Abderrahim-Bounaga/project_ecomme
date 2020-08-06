<?php 
session_start();
include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $edit_coupon_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM coupons WHERE coupon_id = '$edit_coupon_id' ";
$load_coupon_query = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_coupon_query)){
$coupon_id = $row['coupon_id'];
$coupon_title = $row['coupon_title'];
$coupon_price = $row['coupon_price'];
$coupon_code = $row['coupon_code'];
$coupon_limit = $row['coupon_limit'];
$coupon_used = $row['coupon_used'];

}

if (isset($_POST['edit_coupon'])) {
    $coup_title = $_POST['coupon_title'];
    $coup_price = $_POST['coupon_price'];
    $coup_code = $_POST['coupon_info'];
    $coup_limit = $_POST['coupon_price'];

    $coup_title = mysqli_real_escape_string($db,$coupon_title);
    $coup_desc = mysqli_real_escape_string($db,$coupon_desc);
    $coup_info = mysqli_real_escape_string($db,$coupon_info);

    $query = "UPDATE coupons SET coupon_title = '$coupon_title' ,coupon_img1 ='$coupon_img1',coupon_img2 ='$coupon_img2',coupon_img3 ='$coupon_img3', coupon_desc = '$coupon_desc', coupon_info = '$coupon_info', coupon_price = '$coupon_price', promotion = '$promotion' , promo_price = '$promo_price'  WHERE coupon_id = $p_id ";
    $edit_coupon_query = mysqli_query($db,$query);

    if (!$edit_coupon_query) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_coupon_query){
        echo " <script>alert('coupon has been edit successfully')</script>";
        echo " <script>window.open('add_coupon.php','_self')</script>";
    }
    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit coupon
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_coupon.php?edit=<?php echo $coupon_id ?>" method="post" enctype="multipart/form-data">    
                     
                <div class="form-group">
                        <label for="title">coupons Title</label>
                        <input type="text" class="form-control" name="coupons_title">
                    </div>

                    <div class="form-group">
                        <label for="coupons_price">coupons Price</label>
                        <input type="number" class="form-control" name="coupons_price">
                    </div>

                    <div class="form-group">
                        <label for="coupons_price">coupons Limit</label>
                        <input type="number" class="form-control" name="coupons_limit" value="1">
                    </div>

                    <div class="form-group">
                        <label for="title"> Select Product </label>
                        <select name="product_id" class="form-control" required>
                        
                        <option selected disabled> Select Product For Coupon </option>
                        <?php 
                        $get_pro = "SELECT * FROM products";
                        $run_pro = mysqli_query($db, $get_pro);
                        while($row_pro = mysqli_fetch_array($run_pro)){
                            $pro_id = $row_pro['product_id'];
                            $pro_title = $row_pro['product_title'];
                            echo "<option value='$pro_id'> $pro_title </option> ";
                        }
                        
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="coupons_info">coupons Code</label>
                        <input type="number" class="form-control" name="coupons_code">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_coupons" value="Add coupons">
                    </div>


                    <div class="form-group">
                        <label for="coupon_price">coupon Price</label>
                        <input type="number" value = "<?php echo $p_price ?>" class="form-control" name="coupon_price">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->


            <script src="js/tinymce/tinymce.min.js" ></script>
            <script>tinymce.init({selector: 'textarea'});</script> 
        

    <?php include "admin_footer.php" ?>