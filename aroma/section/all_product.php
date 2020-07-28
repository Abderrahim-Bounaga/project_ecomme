
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">

            <?php 
               $per_page = 5;
              
               if(isset($_GET['page'])){
                $page = $_GET['page'];
              }else{
                $page = 1;
              }

            if (isset($_GET['item_ctgry'])) {
              $item_ctgry = $_GET['item_ctgry'];
            
             $start_from = ($page-1) * $per_page;

              $query = "SELECT * FROM products  LEFT JOIN categories ON products.product_CategoryId = categories.Id  WHERE product_CategoryId =$item_ctgry AND product_archif=0 ORDER BY 1 DESC LIMIT $start_from,$per_page  
                ";   
              $load_products_query = mysqli_query($connection,$query);

            }
            elseif  (isset($_GET['sub_ctgry'])) {
              $sub_ctgry = $_GET['sub_ctgry'];
            
             $start_from = ($page-1) * $per_page;

              $query = "SELECT * FROM products  LEFT JOIN sou_category ON products.Sou_CategoryId = sou_category.Id  WHERE Sou_CategoryId =$sub_ctgry AND product_archif=0 ORDER BY 1 DESC LIMIT $start_from,$per_page  
                ";   
              $load_products_query = mysqli_query($connection,$query);

            }
            
            
            
            
            
            
            
            
            
            else{
             

              $start_from = ($page-1) * $per_page;
                            $query = "SELECT * FROM products WHERE product_archif=0 ORDER BY 1 DESC LIMIT $start_from,$per_page";
                            $load_products_query = mysqli_query($connection,$query);

                          }

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_image = $row['product_image'];
                                $product_desc = $row['product_desc'];
                                
								$product_info = $row['product_info'];
								$product_price = $row['product_price'];

								
                                ?>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                  <img src="img/product/<?php echo $product_image ?>" alt="<?php echo $product_image ?>">
                    <ul class="card-product__imgOverlay">
                      <li><button><a href = "single-product.php?item=<?php echo $product_id ?>"  data-dismiss="modal"><i class="ti-search"></i></a></button></li>
                      <li><button> <a href = "cart.php?item=<?php echo $product_id ?>"  data-dismiss="modal"><i class="ti-shopping-cart"></a></i></button>
                      </li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Accessories</p>
                    <h4 class="card-product__title"><a href="#"><?php echo $product_title ?></a></h4>
                    <p class="card-product__price"><?php echo $product_price ?></p>
                  </div>
                </div>
              </div>
              <?php
                            }
                        ?>
			 </ul>
			
             
            </div>
          </section>

          <!-- Load more -->
				<div class="flex-c-m flex-w w-full p-t-45">
						<ul class="pagination">
						<?php 

						$view_products = "SELECT * FROM products";
						$result = mysqli_query($connection,$view_products);
						$total_records = mysqli_num_rows($result);
						$total_page = ceil($total_records /$per_page);

						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='category.php?page=1'>".'First page'."</a>
							</li>
						";

						for ($i=1; $i <= $total_page; $i++) { 
						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='category.php?page=".$i."'>".$i."</a>
							</li>
						";

						}
						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='category.php?page=$total_page'>".'Last page'."</a>
							</li>
						";

							
						
						
						?>

						<!-- <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
							Load More
						</a> -->
						</ul>
				</div>

				
			</div>
		</div>
	</div>