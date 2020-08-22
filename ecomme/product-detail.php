<?php include "db.php" ?>
<?php session_start(); ?>
<?php 
if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $get_product ="SELECT * FROM products WHERE product_id = '$product_id'";
    $run_product = mysqli_query($db, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    $cat_id = $row_product['Category_id'];
    $p_cat_id = $row_product['Sou_Category_id'];
    $pro_title = $row_product['product_title'];
    $pro_price = $row_product['product_price'];
    $promotion = $row_product['promotion'];
    $promo_price = $row_product['promo_price'];
    $pro_desc = $row_product['product_desc'];
    $pro_info = $row_product['product_info'];
    $pro_img1 = $row_product['product_image'];
    $pro_img2 = $row_product['product_image2'];
    $pro_img3 = $row_product['product_image3'];
    $get_cat ="SELECT * FROM categories WHERE Category_id = '$cat_id'";
    $run_cat = mysqli_query($db, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['Category_title'];
    $get_p_cat ="SELECT * FROM sou_category WHERE Sou_Category_id = '$p_cat_id'";
    $run_p_cat = mysqli_query($db, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['Sou_Category_title'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

<?php require_once 'navbar.php'; ?>


	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.php" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a  href="product.php?cat=<?php echo $cat_id; ?>" class="s-text16">
		<?php echo $cat_title; ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.php?p_cat=<?php echo $p_cat_id; ?>" class="s-text16">
		<?php echo $p_cat_title; ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
		<?php echo $pro_title; ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="admin/img/<?php echo $pro_img1;?>">
							<div class="wrap-pic-w">
								<img src="admin/img/<?php echo $pro_img1;?>" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="admin/img/<?php echo $pro_img2;?>">
							<div class="wrap-pic-w">
								<img src="admin/img/<?php echo $pro_img2;?>" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="admin/img/<?php echo $pro_img3;?>">
							<div class="wrap-pic-w">
								<img src="admin/img/<?php echo $pro_img3;?>" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
				<?php echo $pro_title; ?>
				</h4>
				
				<form action="product-detail.php?add_cart=<?php echo $product_id; ?>" method="post">
				<?php 
								if($promo_price > 0){
									echo "<span class='block2-oldprice m-text7 p-r-5 m-text17'>";
									echo "$$pro_price";
									echo "</span>";
									echo "<span class='block2-newprice m-text8 p-r-5 m-text17'>";
									echo "$$promo_price";
									echo "</span>";
								}else{
									
									echo "<span class='m-text17'>";
									echo "$$pro_price";
									echo "</span>";
									
								}
								
								?>
					

					<p class="s-text8 p-t-10">
					<?php echo $pro_info; ?>
					</p>

					<!--  -->
					<div class="p-t-33 p-b-60">
						<div class="flex-m flex-w p-b-10">
							<div class="s-text15 w-size15 t-center">
								Size
							</div>

							<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
								<select class="selection-2" name="size">
									<option>Choose an option</option>
									<option>Size S</option>
									<option>Size M</option>
									<option>Size L</option>
									<option>Size XL</option>
								</select>
							</div>
						</div>

						<div class="flex-m flex-w">
							<div class="s-text15 w-size15 t-center">
								Color
							</div>

							<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
								<select class="selection-2" name="color">
									<option>Choose an option</option>
									<option>Gray</option>
									<option>Red</option>
									<option>Black</option>
									<option>Blue</option>
								</select>
							</div>
						</div>

						<div class="flex-r-m flex-w p-t-10">
							<div class="w-size16 flex-m flex-w">
								<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>

								<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
									<!-- Button -->
									<a href="cart.php?item=<?php echo $product_id ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
										Add to Cart
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="p-b-45">
						<span class="s-text8 m-r-35">SKU: MUG-01</span>
						<span class="s-text8">Categories: Mug, Design</span>
					</div>

					<!--  -->
					<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
						<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
							Description
							<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
							<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
						</h5>

						<div class="dropdown-content dis-none p-t-15 p-b-23">
							<p class="s-text8">
							<?php echo $pro_desc; ?>							</p>
						</div>
					</div>

					<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
						<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
							Additional information
							<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
							<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
						</h5>

						<div class="dropdown-content dis-none p-t-15 p-b-23">
							<p class="s-text8">
								Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
							</p>
						</div>
					</div>

					<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
						<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
							Reviews (0)
							<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
							<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
						</h5>

						<div class="dropdown-content dis-none p-t-15 p-b-23">
							<p class="s-text8">
							<?php echo $pro_desc; ?>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					
				<?php 
							$query = "SELECT * FROM products WHERE trend_product = 1 ";
                            $load_products_query = mysqli_query($db,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_image = $row['product_image'];
                                $product_desc = $row['product_desc'];
                                $product_info = $row['product_info'];
                                $product_date = $row['product_date'];
                                $product_price = $row['product_price'];

                                ?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->

						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
							<img src="admin/img/<?php echo $product_image ?>" alt="<?php echo $product_image ?>" width='90' height='360'>

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a href="cart.php?item=<?php echo $product_id ?>"><button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button></a>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href='product-detail.php?product_id=<?php echo $product_id?>' class="block2-name dis-block s-text3 p-b-5">
								<?php echo $product_title ?>
								</a>
								
								<span class="block2-price m-text6 p-r-5">
									$<?php echo $product_price?>
								</span>
								<!-- <span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>

								<span class="block2-newprice m-text8 p-r-5">
									$15.90
								</span> -->
							</div>
						</div>
						
					</div>
					<?php
							}
						?>
				</div>
			</div>

		</div>
	</section>

	<?php require_once 'footer.php'; ?>