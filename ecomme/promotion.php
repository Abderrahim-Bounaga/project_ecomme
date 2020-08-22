<?php session_start(); ?>

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
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

<?php require_once 'navbar.php'; ?>


	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
		Product
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Product Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="promotion.php" class="s-text13 active1">
									All
								</a>
							</li>
							<?php 
								

								$get_cate = "SELECT * FROM categories WHERE Category_archif = '0'";
								$run_cate = mysqli_query($db, $get_cate);
								while($row_cate=mysqli_fetch_array($run_cate)){
									$cate_id = $row_cate['Category_id'];
									$cate_title = $row_cate['Category_title'];
									echo"
									<li class='p-t-4'>
										<a href='promotion.php?cat=$cate_id' class='s-text13 active1'>
											$cate_title						
										</a>
										
									</li>
									
									";
								}  
								?>
<!-- 
							<li class="p-t-4">
								<a href="#" class="s-text13">
									Women
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Men
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Kids
								</a>
							</li>

							<li class="p-t-4">
								<a href="#" class="s-text13">
									Accesories
								</a>
							</li> -->
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
								
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>

					<!-- Product -->
					<div class="row">
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
											$get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from,$per_page ";
											$query = "SELECT * FROM products  WHERE product_archif = '0' AND promotion = '1'" ;
                                            $run_products = mysqli_query($db,$query);
                                           
                                            while($row=mysqli_fetch_array($run_products)){
                                                $product_id = $row['product_id'];
                                                $product_title = $row['product_title'];
                                                $product_image = $row['product_image'];
                                                $product_desc = $row['product_desc'];
                                                $product_info = $row['product_info'];
                                                $product_date = $row['product_date'];
                                                $product_price = $row['product_price'];
                                                $promotion = $row['promotion'];
												$promo_price = $row['promo_price'];
												$promo_date = $row['promo_date'];
												


                                ?>
                        
                                


									<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
																<!-- Block2 -->
										<div class="block2">
											<div class="block2-img wrap-pic-w of-hidden pos-relative">
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

												<span class="block2-oldprice m-text7 p-r-5">
													$<?php echo $product_price ?>
												</span>

												<span class="block2-newprice m-text8 p-r-5">
													$<?php echo $promo_price ?>
												</span>
											</div>
										</div>
									</div>
														
														
									<?php
									$date_creation_compte = date('Y-m-d H:i:s');
									if($promo_date == $date_creation_compte){
										$update_pro = "UPDATE products WHERE promotion='0' AND promo_price='0' AND promo_date ='0'";
										$run_update_pro = mysqli_query($db, $update_pro);
									}
										}

									?>
					</div>

					<!-- Pagination -->
					<div class="flex-c-m flex-w w-full p-t-45">
						<ul class="pagination">
						<?php 

						$view_products = "SELECT * FROM products";
						$result = mysqli_query($db,$view_products);
						$total_records = mysqli_num_rows($result);
						$total_page = ceil($total_records /$per_page);

						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='product.php?page=1'>".'First page'."</a>
							</li>
						";

						for ($i=1; $i < $total_page; $i++) { 
						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='product.php?page=".$i."'>".$i."</a>
							</li>
						";

						}
						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='product.php?page=$total_page'>".'Last page'."</a>
							</li>
						";

							}
						}
						
						?>

						<!-- <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
							Load More
						</a> -->
						</ul>
				</div>
				<div class="row">
				<?php
				  
				  
				
					if(isset($_GET['cat'])){
						$cat_id = $_GET['cat'];
						$get_cat = "SELECT * FROM categories WHERE Category_id='$cat_id' ";
						$run_cat = mysqli_query($db, $get_cat);
						$row_cat =mysqli_fetch_array($run_cat);
						
						$get_products = "SELECT * FROM products WHERE Category_id='$cat_id' AND product_archif = '0' AND promotion = '1'";
						$run_products = mysqli_query($db, $get_products);
						$count = mysqli_num_rows($run_products);
						
				
						while($row=mysqli_fetch_array($run_products )){
							    $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_image = $row['product_image'];
                                $product_desc = $row['product_desc'];
                                $product_info = $row['product_info'];
                                $product_date = $row['product_date'];
								$product_price = $row['product_price'];
								$promotion = $row['promotion'];
								$promo_price = $row['promo_price'];
								$promo_date = $row['promo_date'];

								
							
				
				/// end  function product by catego in page product sideBar///
				
				?>
				<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
																<!-- Block2 -->
										<div class="block2">
											<div class="block2-img wrap-pic-w of-hidden pos-relative">
												<img src="admin/img/<?php echo $product_image ?>" alt="<?php echo $product_image ?>"width='90' height='360'>

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
												<a href='product-detail.php?products_id=<?php echo $products_id?>' class="block2-name dis-block s-text3 p-b-5">
													<?php echo $product_title ?>
												</a>

												<span class="block2-oldprice m-text7 p-r-5">
													$<?php echo $product_price ?>
												</span>

												<span class="block2-newprice m-text8 p-r-5">
													$<?php echo $promo_price ?>
												</span>
											</div>
										</div>
									</div>
														
														
									<?php
										}
									}
									?>
				<?php
				
  
				
			
				if(isset($_GET['p_cat'])){
					$p_cat_id = $_GET['p_cat'];
					$get_p_cat = "SELECT * FROM product_categories WHERE Sou_Category_id= '$p_cat_id'";
					$run_p_cat = mysqli_query($db, $get_p_cat);
					$row_p_cat =mysqli_fetch_array($run_p_cat);
					
					$get_products = "SELECT * FROM products WHERE SouCategory_id= '$p_cat_id' AND product_archif = '0' AND promotion = '1'";
					$run_products = mysqli_query($db, $get_products);
					$count = mysqli_num_rows($run_products);
			
					while($row=mysqli_fetch_array($run_products)){
						$product_id = $row['product_id'];
						$product_title = $row['product_title'];
						$product_image = $row['product_image'];
						$product_desc = $row['product_desc'];
						$product_info = $row['product_info'];
						$product_date = $row['product_date'];
						$product_price = $row['product_price'];
						$promotion = $row['promotion'];
                        $promo_price = $row['promo_price'];
                        $promo_date = $row['promo_date'];
		
					
		
		/// end  function product by catego in page product sideBar///
		?>
		
		<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
														<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
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
										<a href='product-detail.php?products_id=<?php echo $products_id?>' class="block2-name dis-block s-text3 p-b-5">
											<?php echo $product_title ?>
										</a>

										<span class="block2-oldprice m-text7 p-r-5">
											$<?php echo $product_price ?>
										</span>

										<span class="block2-newprice m-text8 p-r-5">
											$<?php echo $promo_price ?>
										</span>
									</div>
								</div>
							</div>
												
												
							<?php
								}
							}
							?>
							</div>
				</div>
			</div>
		</div>
	</section>

	<?php require_once 'footer.php'; ?>