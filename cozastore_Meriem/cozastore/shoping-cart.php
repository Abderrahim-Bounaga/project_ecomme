<?php

session_start();
if (isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<?php include "includes/store_nav2.php"?>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="shoping-cart.php" method="post" enctype="multipart/form-data">
		<div class="container">

		<?php 
		 $ip_add = getIpUser();
		 $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
		 $run_cart = mysqli_query($db,  $select_cart);
		 $count = mysqli_num_rows($run_cart);
		?>
			<div class="row">
				<div class="col-lg-7 col-xl-10 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<thead>
									<tr class="table_head">
										<th class="column-1">Product</th>
										<th class="column-2"></th>
										<th class="column-3">Quantity</th>
										<th class="column-4">Price</th>
										<th class="column-5">Size</th>
										<th class="column-6">Color</th>
										<th class="column-7">Delete</th>
										<th class="column-8">Sub-Total</th>
									</tr>
								</thead>

								<tbody>
								<?php 
								
								$total = 0;
								while($row_cart= mysqli_fetch_array($run_cart)){
                                    $pro_id = $row_cart['p_id'];
									$pro_size = $row_cart['size'];
									$pro_color = $row_cart['color'];
									$pro_qty = $row_cart['qty'];
									$get_product = "SELECT * FROM products WHERE product_id= '$pro_id'";
									$run_product = mysqli_query($db, $get_product);
									while($row_product= mysqli_fetch_array($run_product)){
                                        $product_title = $row_product['product_title'];
									    $product_img1 = $row_product['product_img1'];
										$product_price = $row_product['product_price'];
										$sub_total = $row_product['product_price']*$pro_qty;
										$total += $sub_total;
								?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="images/<?php echo $product_img1; ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2">
											<?php echo $product_title; ?>
										</td>
										<td class="column-3">
											<?php echo $pro_qty; ?> 
										</td>
										<td class="column-4">
											<?php echo $product_price; ?> DH
										</td>
										<td class="column-5">
											<?php echo $pro_size; ?>
										</td>
										<td class="column-6">
											<?php echo $pro_color; ?>
										</td>
										<td class="column-7">
										<input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
										</td>
										<td class="column-8">
											<?php echo $sub_total; ?> DH
										</td>
									</tr>

									<?php 
									   }	
									}
									?>
								</tbody>

								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="code" placeholder="Coupon Code">
									
								
								<button type="submit" name="apply_coupon" value="Apply coupon" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
									Apply coupon
							    </button>
							</div>
							<button type="submit" name="update" value="update cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</button>
							
								
							
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-10 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $total; ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>
						<div class="flex-w p-l-163 m-l-163">
						<button >
							<a class="flex-c-m stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="payment_options.php">
							Proceed to Checkout
							</a>
						</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php 
	if(isset($_POST['apply_coupon'])){
		$code = $_POST['code'];
		if($code == ""){

		}else{
			$get_coupons = "SELECT * FROM coupons WHERE coupon_code ='$code'";
			$run_coupons = mysqli_query($db, $get_coupons);
			$check_coupons = mysqli_num_rows($run_coupons);
			if($check_coupons == "1"){
				$row_coupons = mysqli_fetch_array($run_coupons);
				$coupon_pro_id = $row_coupons['product_id'];
				$coupon_price = $row_coupons['coupon_price'];
				$coupon_limit = $row_coupons['coupon_limit'];
				$coupon_used = $row_coupons['coupon_used'];

				if($coupon_limit == $coupon_used){
				    echo " <script>alert('Your Coupon Already Expired')</script>";	
				}else{
					$get_cart = "SELECT * FROM cart WHERE p_id='$coupon_pro_id' AND ip_add ='$ip_add'";
					$run_cart = mysqli_query($db, $get_cart);
					$check_cart = mysqli_num_rows($run_cart);

					if($check_cart == "1"){
						$add_used = "UPDATE coupons SET coupon_used=coupon_used+1 WHERE coupon_code ='$code'";
						$run_used = mysqli_query($db, $add_used);
						$update_cart = "UPDATE cart SET p_price='$coupon_price' WHERE p_id='$coupon_pro_id' AND ip_add ='$ip_add'";
						$run_update_cart = mysqli_query($db, $update_cart);
						echo " <script>alert('Your Coupon Has Been Applied')</script>";
						echo " <script>window.open('shoping-cart.php','_self')</script>";
					}else{
						echo " <script>alert('Your Coupon Didnt Match With your Product in your cart )</script>";
					}
				}
			}else{
				echo " <script>alert('Your Coupon is Not Valid')</script>";
			}
		}
	}
	
	?>
	<?php 
	function update_cart(){
		global $db;
		if(isset($_POST['update'])){
			foreach($_POST['remove'] as $remove_id){
				$delate_product ="DELETE FROM cart WHERE p_id='$remove_id'";
				$run_delete = mysqli_query($db, $delate_product);
				if($run_delete){
					echo " <script>window.open('shoping-cart.php','_self')</script>";
				}
			}		
		}
	}
	 
	echo @$up_cart = update_cart();
	?>
		

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
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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

}
else {
    header("location:login.php");
}

?>