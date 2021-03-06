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
<section class="section-pagetop  p-tb-30">
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
            <a class="list-group-item text-secondary stext-106 trans-04" href="account_user.php"> Account overview  </a>
            <a class="list-group-item text-secondary stext-106 trans-04  " href="order_user.php"> My Orders </a>
            <a class="list-group-item text-secondary stext-106 trans-04" href="confirm_user.php"> Confirm payment </a>
            <a class="list-group-item  stext-106 trans-04 cl5 bg2" href="edit_account.php"> Settings </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="change_password.php"> Change password </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
		</nav>
	</aside> <!-- col.// -->
	<main class="col-md-9">

        <?php 

        $user_session = $_SESSION['username'];
        $get_user = "SELECT * FROM user WHERE username='$user_session'";
        $run_user = mysqli_query($db,$get_user);

        $row_user = mysqli_fetch_array($run_user);
        $user_id = $row_user['id'];
        $user_name = $row_user['username'];
        $user_email = $row_user['email'];
        $user_city = $row_user['city'];
        $user_address = $row_user['address'];
        $user_contact = $row_user['contact'];
        $user_image = $row_user['user_img'];

        ?>

        <div class="card">
            <div class="card-body">
                <form class="row" action="edit_account.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-9">
                    <br><br>
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $user_name; ?>">
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $user_email; ?>">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" value="<?php echo $user_city; ?>">
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $user_address; ?>">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>Contact</label>
                            <input type="text" class="form-control" name="contact" value="<?php echo $user_contact; ?>">
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                            <label>Image Profil</label>
                            <input type="file" class="form-control" name="img" >
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <button name="update_compte" class="btn stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Save</button>	
                        <button ><a href="change_password.php" class="btn stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"> Change password </a></button>	

                        <br><br><br>

                    </div> <!-- col.// -->
                    
                </form>

                <?php 

                if(isset($_POST['update_compte'])){
                    
                    $update_id = $user_id;
                    $c_name = $_POST['username'];
                    $c_email = $_POST['email'];
                    $c_city = $_POST['city'];
                    $c_address = $_POST['address'];
                    $c_contact = $_POST['contact'];
                    $c_image = $_FILES['img']['name'];
                    $c_image_tmp = $_FILES['img']['tmp_name'];
                    
                    move_uploaded_file ($c_image_tmp,"customer/img/$c_image");

                    $update_customer = "UPDATE user SET username='$c_name',email='$c_email',city='$c_city',address='$c_address',contact='$c_contact',user_img='$c_image' WHERE id='$update_id' ";
                    $run_customer = mysqli_query($db,$update_customer);
                    if($run_customer){
                        
                        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
                        echo "<script>window.open('account_user.php','_self')</script>";
                        
                    }
                    
                }

                ?>

            </div> <!-- card-body.// -->
        </div> <!-- card .// -->

        <br> <br> <br> <br> <br>

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


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