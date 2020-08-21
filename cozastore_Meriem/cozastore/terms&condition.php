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
		<h2 class="title-page">Terms & Conditions</h2>
	</div> <!-- container //  -->

	</section>
<!-- ========================= SECTION PAGETOP END// ========================= -->
    <section class="section-content padding-y">
        <div class="container">

            <div class="row">
    
           
				<aside class="col-md-3"><!-- col-md-3 Begin -->
				
				    <nav id="navbar-example3" class="navbar navbar-light bg-light"><!-- box Begin -->
						<ul class="nav nav-pills "><!-- nav nav-pills nav-stacked Begin -->
						
							<?php 
							
							$get_terms = "SELECT * FROM terms LIMIT 0,1";
							$run_terms = mysqli_query($db,$get_terms);

							while($row_terms=mysqli_fetch_array($run_terms)){

								$term_title = $row_terms['term_title'];
								$term_link = $row_terms['term_link'];
							
							?>

								<a data-toggle="pill" class="nav-link" href="#<?php echo $term_link; ?>">
								
									<?php echo $term_title; ?>
								
								</a>

							<?php } ?>

							<?php 
							
								$count_terms = "SELECT * FROM terms";
								$run_count_terms = mysqli_query($db,$count_terms);
								$count = mysqli_num_rows($run_count_terms);
								$get_terms = "SELECT * FROM terms LIMIT 1,$count";
								$run_terms = mysqli_query($db,$get_terms);

								while($row_terms=mysqli_fetch_array($run_terms)){

									$term_title = $row_terms['term_title'];
									$term_link = $row_terms['term_link'];
							
							?>


								<a data-toggle="pill" class="nav-link" href="#<?php echo $term_link; ?>">
								
									<?php echo $term_title; ?>
								
								</a>

							<?php } ?>
						
						</ul><!-- /nav nav-pills nav-stacked Begin -->
					</nav><!-- /box Begin -->
				
				</aside><!-- /col-md-3 Finish -->

				<main class="col-md-9"><!-- col-md-9 Begin -->
				    <article class=" mb-3">
			            <div class="card-body">
						
						<?php 
						
							$get_terms = "SELECT * FROM terms LIMIT 0,1";
							$run_terms = mysqli_query($db,$get_terms);

							while($row_terms=mysqli_fetch_array($run_terms)){

								$term_title = $row_terms['term_title'];
								$term_desc = $row_terms['term_desc'];
								$term_link = $row_terms['term_link'];
						
						?> 

							<div id="<?php echo $term_link; ?>" class="tab-pane fade in active"><!-- tab-pane fade in active Begin -->
							
							<h1 class="tabTitle"><?php echo $term_title; ?></h1>
							<p class="tabDesc"><?php echo $term_desc; ?></p>
							
							</div><!-- tab-pane fade in active Finish -->

						<?php } ?>

						<?php 

							$count_terms = "SELECT * FROM terms";
							$run_count_terms = mysqli_query($db,$count_terms);
							$count = mysqli_num_rows($run_count_terms);
							$get_terms = "SELECT * FROM terms LIMIT 1,$count";
							$run_terms = mysqli_query($db,$get_terms);

							while($row_terms=mysqli_fetch_array($run_terms)){

								$term_title = $row_terms['term_title'];
								$term_desc = $row_terms['term_desc'];
								$term_link = $row_terms['term_link'];

						?>

							<div id="<?php echo $term_link; ?>" class="tab-pane fade in active"><!-- tab-pane fade in active Begin -->
							
							<h1 class="tabTitle"><?php echo $term_title; ?></h1>
							<p class="tabDesc"><?php echo $term_desc; ?></p>
							
							</div><!-- tab-pane fade in active Finish -->

						<?php } ?>
						
						</div><!-- tab-content Finish -->
					</article><!-- /box Finish -->
				</main>
            </div><!-- /col-md-9 Finish -->
	    </div><!-- #content Finish -->
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