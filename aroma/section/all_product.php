
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">

            <?php 
                            $query = "SELECT * FROM products";
                            $load_products_query = mysqli_query($connection,$query);

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
                  <img src="img/<?php echo $product_image ?>" alt="<?php echo $product_image ?>">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
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