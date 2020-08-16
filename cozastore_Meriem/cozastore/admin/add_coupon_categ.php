
<?php
session_start();
 include "admin_header.php"
?>
<?php 

if (isset($_POST['add_coupons'])) {
    $coupon_title = $_POST['coupons_title'];
    $coupon_porcent = $_POST['coupons_porcent'];
    $coupon_limit = $_POST['coupons_limit'];
    $coupon_pro_id = $_POST['product_id'];
    $coupon_used = 0;
    $coupon_code = mt_rand();
    $git_coupons = "SELECT * FROM coupons WHERE product_id='$coupon_pro_id' or coupon_code='$coupon_code'";
    $run_coupons = mysqli_query($db,$git_coupons);
    $check_coupons = mysqli_num_rows($run_coupons);

    if($check_coupons == 1){
        echo " <script>alert('Coupons Code/ Product Already Added. Choose Another Coupon Code ')</script>";
        
    }else{
        $insert_coupon = "INSERT INTO coupons (product_id, coupon_title, coupon_price, coupon_code, coupon_limit, coupon_used) VALUES ('$coupon_pro_id', '$coupon_title', '$coupon_porcent', '$coupon_code', '$coupon_limit', '$coupon_used')";
        $run_coupon = mysqli_query($db, $insert_coupon);
        if($run_coupon){
            echo " <script>alert('Your Coupons Has Been Created')</script>";
            echo " <script>window.open('view_coupon.php','_self')</script>";
        }
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add categorie coupons
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_coupon_categ.php" method="post" >    
     
     
                    <div class="form-group">
                        <label for="title">coupons Title</label>
                        <input type="text" class="form-control" name="coupons_title">
                    </div>

                    <div class="form-group">
                        <label for="coupons_porcent">coupon pourcentage réduction</label>
                        <input type="number" class="form-control" min="0" max="100" name="coupons_porcent">
                    </div>

                    <div class="form-group">
                        <label for="coupons_price">coupons Limit</label>
                        <input type="number" class="form-control" name="coupons_limit" value="1">
                    </div>

                    <div class="form-group">
                        <label for="title"> Select categorie </label>
                        <select name="product_id" class="form-control" required>
                        
                        <option selected disabled> Select categorie For Coupon </option>
                        <?php 
                        $get_p_cat = "SELECT * FROM product_categories";
                        $run_p_cat = mysqli_query($db, $get_p_cat);
                        while($row_p_cat = mysqli_fetch_array($run_p_cat)){
                            $p_cat_id = $row_p_cat['p_cat_Id'];
                            $p_cat_title = $row_p_cat['p_cat_title'];
                            echo "<option value='$p_cat_id'> $p_cat_title </option> ";
                        }
                        
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_coupons" value="Add coupons">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
