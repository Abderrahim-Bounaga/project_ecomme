
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
                                            $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from,$per_page";
                                            $run_products = mysqli_query($db,$get_products);
                                            
                                            while($row=mysqli_fetch_array($run_products)){
                                                $product_id = $row['product_id'];
                                                $product_title = $row['product_title'];
                                                $product_image = $row['product_image'];
                                                $product_desc = $row['product_desc'];
                                                $product_info = $row['product_info'];
                                                $product_date = $row['product_date'];
                                                $product_price = $row['product_price'];

                                ?>
                        
                                


<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
	<div class="block2">
		<div class="block2-img wrap-pic-w of-hidden pos-relative">
			<img src="images/<?php echo $product_image ?>" alt="<?php echo $product_image ?>">

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
			<a href="product-detail.php" class="block2-name dis-block s-text3 p-b-5">
                <?php echo $product_title ?>
			</a>

			<span class="block2-price m-text6 p-r-5">
				$<?php echo $product_price ?>
			</span>
		</div>
	</div>
</div>
                    
                    
<?php
    }

?>


<?php
				  
					
				
					if(isset($_GET['cat'])){
						$cat_id = $_GET['cat'];
						$get_cat = "SELECT * FROM categories WHERE Category_id='$cat_id'";
						$run_cat = mysqli_query($db, $get_cat);
						$row_cat =mysqli_fetch_array($run_cat);
						
						$get_products = "SELECT * FROM products WHERE Category_id='$cat_id'";
						$run_products = mysqli_query($db, $get_products);
						$count = mysqli_num_rows($run_products);
				
						while($row_products=mysqli_fetch_array($run_products)){
							$products_id = $row_products['product_id'];
							$products_title = $row_products['product_title'];
							$products_price = $row_products['product_price'];
							$products_img1 = $row_products['product_img1'];
				
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
					
											<span class='stext-105 cl3'>
											$products_price DH
											</span>
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
				
				
				/// end  function product by catego in page product sideBar///
				?>
				<?php
				
  
				
			
				if(isset($_GET['p_cat'])){
					$p_cat_id = $_GET['p_cat'];
					$get_p_cat = "SELECT * FROM sou_categories WHERE Sou_Category_id= '$p_cat_id'";
					$run_p_cat = mysqli_query($db, $get_p_cat);
					$row_p_cat =mysqli_fetch_array($run_p_cat);
					
					$get_products = "SELECT * FROM products WHERE Sou_Category_id= '$p_cat_id'";
					$run_products = mysqli_query($db, $get_products);
					$count = mysqli_num_rows($run_products);
			
					while($row_products=mysqli_fetch_array($run_products)){
						$products_id = $row_products['product_id'];
						$products_title = $row_products['product_title'];
						$products_price = $row_products['product_price'];
						$products_img1 = $row_products['product_img1'];
			
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
				
										<span class='stext-105 cl3'>
										$products_price DH
										</span>
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