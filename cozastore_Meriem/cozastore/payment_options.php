<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<?php include "includes/store_nav2.php"?>

    <!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop p-tb-30">
<div class="container">
	<h2 class="title-page">My account</h2>
</div> <!-- container //  -->

</section>
<!-- ========================= SECTION PAGETOP END// ========================= -->
	
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-md-3">
            <?php include "profil_user.php"?>
                <nav class="list-group">
                    <a class="list-group-item text-secondary stext-106 trans-04 " href="account_user.php"> Account overview  </a>
                    <a class="list-group-item text-secondary stext-106 trans-04" href="order_user.php"> My Orders </a>
                    <a class="list-group-item text-secondary stext-106 trans-04" href="confirm_user.php"> Confirm payment </a>
                    <a class="list-group-item text-secondary stext-106 trans-04" href="edit_account.php"> Settings </a>
                    <a class="list-group-item text-secondary stext-106 trans-04" href="change_password.php"> Change password </a>
                    <a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
                </nav>
            </aside> <!-- col.// -->

            <main class="col-md-9">
                <?php 
    
                    $session_user = $_SESSION['username'];
                    
                    $select_user = "SELECT * FROM user WHERE username='$session_user'";
                    
                    $run_user = mysqli_query($db,$select_user);
                    
                    $row_user = mysqli_fetch_array($run_user);
                    
                    $user_id = $row_user['id'];
                    
                ?>
                <article class="card mb-3">
			        <div class="card-body">
                        <center>
                            <h4 class="card-title">Payment Option For You</h4> 
                            <br>
                                <p>
                                    <a href="payment_options.php?user_id=<?php echo $user_id; ?>" class="btn btn-light btn-md"> Offline Payment</a>
                                    <br><br>
                                    <a href="#" class="btn btn-light btn-md"> Paypall Payment</a>
                                </p>
                            
                            <hr>
                            <figure class="icontext">
                                    <div class="icon">
                                        <img class=" img-sm img-responsive" src="images/pngegg.png" width="40%" height="40%">
                                    </div>
                            </figure>
                            
                        </center>
                        <br> <br> <br> 
                    </div>
                    
                </article>
                <br> <br> <br> <br> <br>
            </main> <!-- col.// -->
        </div>

    </div> <!-- container .//  -->
</section>



     	<!-- Footer -->
	<?php include "store_footer.php" ?>

	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').php();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php 

    if(isset($_GET['user_id'])){
        
        $user_id = $_GET['user_id'];
        
    }

    $ip_add = getIpUser();
    $status = "pending";
    $invoice_no = mt_rand();
    $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_cart = mysqli_query($db,$select_cart);
    while($row_cart = mysqli_fetch_array($run_cart)){
        
        $pro_id = $row_cart['p_id'];
        $pro_size = $row_cart['size'];
        $pro_color = $row_cart['color'];
        $pro_qty = $row_cart['qty'];
        
        $get_products = "SELECT * FROM products WHERE product_id='$pro_id'";
        $run_products = mysqli_query($db,$get_products);
        
        while($row_products = mysqli_fetch_array($run_products)){
            
            $sub_total = $row_products['product_price']*$pro_qty;
            $pro_title = $row_products['product_title'];
            $pro_image = $row_products['product_img1'];
            
            $insert_customer_order = "INSERT INTO customer_orders (customer_id,due_amount,invoice_no,image_pro,title_pro,qty,color,size,order_date,order_status) VALUES ('$user_id ','$sub_total','$invoice_no','$pro_image','$pro_title','$pro_qty','$pro_color','$pro_size',NOW(),'$status')";
            
            $run_customer_order = mysqli_query($db,$insert_customer_order);
            
            $insert_pending_order = "INSERT INTO pending_orders (customer_id,invoice_no,product_id,color,qty,size,order_status) VALUES ('$user_id ','$invoice_no','$pro_id','$pro_color','$pro_qty','$pro_size','$status')";
            
            $run_pending_order = mysqli_query($db,$insert_pending_order);
            
            $delete_cart = "DELETE FROM cart WHERE ip_add='$ip_add'";
            
            $run_delete = mysqli_query($db,$delete_cart);
            
            echo "<script>alert('Your orders has been submitted, Thanks')</script>";
            
            echo "<script>window.open('order_user.php','_self')</script>";
            
        }
        
    }

?>