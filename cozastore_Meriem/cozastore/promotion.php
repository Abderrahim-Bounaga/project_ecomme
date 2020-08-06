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

	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
		    <?php include "side_bar.php"?>

			<div class="row isotope-grid">
				
				<?php 
				
				if(!isset($_GET['cat'])){
					if(!isset($_GET['p_cat'])){
						$per_page = 8;
						if(isset($_GET['page'])){
							$page = $_GET['page'];
						}else{
							$page = 1;
						}

							$start_from = ($page-1) * $per_page;
                            $get_products = "SELECT * FROM products WHERE product_archive = '0' AND promotion = '1' ORDER BY 1 DESC LIMIT $start_from,$per_page";
                            
                            $run_products = mysqli_query($db,$get_products);
							
							while($row_products=mysqli_fetch_array($run_products)){
								$products_id = $row_products['product_id'];
								$products_title = $row_products['product_title'];
								$products_price = $row_products['product_price'];
                                $products_img1 = $row_products['product_img1'];
                                $promotion = $row_products['promotion'];
                                $promo_price = $row_products['promo_price'];
						
								echo " 
								<div  class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women'>
									<div class='block2'>
										<div class='block2-pic hov-img0'>
											<a href='product-detail.php?products_id=$products_id'>
													<img class='img-responsive' src='images/$products_img1' >
											</a>
											<a href='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
											View Details
											</a>
										</div>
										<div class='block2-txt flex-w flex-t p-t-14'>
											<div class='block2-txt-child1 flex-col-l '>
												<a href='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
												$products_title
                                                </a>
                                                
                                                <p class='card-text'><strong class='text-danger'>$promo_price DH</strong>  <del>$products_price DH</del></p>
					
											</div>
										</div>
										<div class='block2-txt-child1 flex-col-l p-lr-90'>
									   
										<a href='product-detail.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
										Add To Cart
										</a>
										</div>
									</div>
								</div>
								
								";
							}
						
				
				
				?>

				</div>
			

				<!-- Load more -->
				<div class="flex-c-m flex-w w-full p-t-45">
						<ul class="pagination">
						<?php 

						$view_products = "SELECT * FROM products WHERE product_archive = '0' AND promotion = '1'";
						$result = mysqli_query($db,$view_products);
						$total_records = mysqli_num_rows($result);
						$total_page = ceil($total_records /$per_page);

						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='promotion.php?page=1'>".'First page'."</a>
							</li>
						";

						for ($i=1; $i < $total_page; $i++) { 
						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='promotion.php?page=".$i."'>".$i."</a>
							</li>
						";

						}
						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='promotion.php?page=$total_page'>".'Last page'."</a>
							</li>
						";

							}
						}
						
						?>

						</ul>
				</div>

				<?php

				if(isset($_GET['cat'])){
                    $cat_id = $_GET['cat'];
                    $get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";
                    $run_cat = mysqli_query($db, $get_cat);
                    $row_cat =mysqli_fetch_array($run_cat);
                    
                    $get_products = "SELECT * FROM products WHERE cat_id='$cat_id'  AND product_archive = '0' AND promotion = '1' LIMIT 0,6";
                    $run_products = mysqli_query($db, $get_products);
                    $count = mysqli_num_rows($run_products);
            
                    while($row_products=mysqli_fetch_array($run_products)){
                        $products_id = $row_products['product_id'];
                        $products_title = $row_products['product_title'];
                        $products_price = $row_products['product_price'];
                        $products_img1 = $row_products['product_img1'];
                        $promotion = $row_products['promotion'];
                        $promo_price = $row_products['promo_price'];
            
                        echo " 
                        <div  class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item center-responsive' >
                            <div class='block2' >
                                <div class='block2-pic hov-img0'>
                                    <a href='product-detail.php?products_id=$products_id'>
                                            <img class='img-responsive' src='images/$products_img1'>
                                    </a>
                                    <a href='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                                    View Details
                                    </a> 
                                </div>
                                <div class='block2-txt flex-w flex-t p-t-14'>
                                    <div class='block2-txt-child1 flex-col-l '>
                                        <a href='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                                        $products_title
                                        </a>
                
                                        <p class='card-text'><strong class='text-danger'>$promo_price DH</strong>  <del>$products_price DH</del></p>
            
                                    </div>
                                </div>
                                <div class='block2-txt-child1 flex-col-l p-lr-90'>
                               
                                <a href='shoping-cart.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
                                Add To Cart
                                </a>
                                </div>
                            </div>
                        </div>
                        
                        ";
                    }
            
                } 
				 
				?>
                <?php 
                if(isset($_GET['p_cat'])){
                    $p_cat_id = $_GET['p_cat'];
                    $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id= '$p_cat_id'";
                    $run_p_cat = mysqli_query($db, $get_p_cat);
                    $row_p_cat =mysqli_fetch_array($run_p_cat);
                    
                    $get_products = "SELECT * FROM products WHERE p_cat_id= '$p_cat_id' AND product_archive = '0'  AND promotion = '1'";
                    $run_products = mysqli_query($db, $get_products);
                    $count = mysqli_num_rows($run_products);
            
                    while($row_products=mysqli_fetch_array($run_products)){
                        $products_id = $row_products['product_id'];
                        $products_title = $row_products['product_title'];
                        $products_price = $row_products['product_price'];
                        $products_img1 = $row_products['product_img1'];
                        $promotion = $row_products['promotion'];
                        $promo_price = $row_products['promo_price'];
            
                        echo " 
                        <div  class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item center-responsive' >
                            <div class='block2' >
                                <div class='block2-pic hov-img0'>
                                    <a href='product-detail.php?products_id=$products_id'>
                                            <img class='img-responsive' src='images/$products_img1'>
                                    </a>
                                    <a href='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                                    View Details
                                    </a> 
                                </div>
                                <div class='block2-txt flex-w flex-t p-t-14'>
                                    <div class='block2-txt-child1 flex-col-l '>
                                        <a href='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                                        $products_title
                                        </a>
                
                                        <p class='card-text'><strong class='text-danger'>$promo_price DH</strong>  <del>$products_price DH</del></p>
                                        
                                    </div>
                                </div>
                                <div class='block2-txt-child1 flex-col-l p-lr-90'>
                               
                                <a href='product-detail.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
                                Add To Cart
                                </a>
                                </div>
                            </div>
                        </div>
                        
                        ";
                    }
            
                }
                ?>
			</div>
		</div>
	</div>
		

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