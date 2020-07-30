<?php include "db.php"; ?>


<?php

session_start();
if (isset($_SESSION['id'])) {
    $fname = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];

    $full_name = $fname . " " . $lname;
?>

<?php 
    //getting the session id
    if (isset($_SESSION['id'])) {
        $client_id = $_SESSION['id'];
    }
    //getting the item id
    if (isset($_GET['item'])) {
        $item_id = $_GET['item'];
        //getting all items from cart table
    $cart_query = "SELECT * FROM cart WHERE item_id = $item_id AND client_id = $client_id";
    $cart_search_query = mysqli_query($db,$cart_query);
    if (!$cart_search_query) {
        die("QUERY FAILED" . mysqli_error($db));
    }
    while ($row = mysqli_fetch_array($cart_search_query)) {
        $item_title = $row['item_title'];
        $item_image = $row['item_image'];
        $item_price = $row['item_price'];
        $item_quantity = $row['item_quantity'];
    }
    $row_count = mysqli_num_rows($cart_search_query);

    if($row_count > 0){
        $update_query = "UPDATE cart SET item_quantity = item_quantity+1 WHERE item_id = $item_id AND client_id = $client_id";
        $update_item_query = mysqli_query($db,$update_query);
        header('Location: cart.php');

    }else{
         //getting the item infos from products table
        $item_query = "SELECT * FROM products WHERE product_id = $item_id";
        $item_search_query = mysqli_query($db,$item_query);

        while ($row = mysqli_fetch_array($item_search_query)) {
            $item_title = $row['product_title'];
            $item_image = $row['product_image'];
            $item_price = $row['product_price'];
            $promo_price = $row['promo_price'];
            
		}
		

        if (!$item_search_query) {
            die("QUERY FAILED" . mysqli_error($db));
        }

         //adding the item to cart if it doesn't already exist
        $add_query = "INSERT INTO cart(client_id,item_id,item_title,item_image,item_price,promo_price) VALUES ($client_id,$item_id,'$item_title','$item_image','$item_price','$promo_price')";
        $add_to_cart_query = mysqli_query($db,$add_query);

        if (!$add_to_cart_query) {
            die("QUERY FAILED" . mysqli_error($db));
        }

        header('Location: cart.php');
    }
    } 
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
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

<!-- <script>
	var product1=document
</script> -->
</head>
<body class="animsition">

<?php require_once 'navbar.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
							
						</tr>
						<?php 
                            
                            $cart_query = "SELECT * FROM cart WHERE client_id = $client_id";
							$cart_search_query = mysqli_query($db,$cart_query);
							$total_final= 0;
                            while ($row = mysqli_fetch_array($cart_search_query)) {
                                
                                $cart_id = $row['item_id'];
                                $item_title = $row['item_title'];
                                $item_image = $row['item_image'];
                                $item_price = $row['item_price'];
								$item_quantity = $row['item_quantity'];
								$promo_price = $row['promo_price'];
								if($promo_price > 0){
									$item_price = $promo_price;
								}
                                $total = $item_price * $item_quantity;
								$total_final=$total_final+$total;
                            

                            
?>
						<tr class="table-row">
						
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="images/<?php echo $item_image ?>" alt="<?php echo $item_title ?>">
								</div>
							</td>
							<td class="column-2"><?php  echo $item_title ?></td>
							<td class='column-3'>$<?php  echo $item_price ?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<a href='cart.php?reduce=<?php echo $cart_id ?>&user=<?php echo $client_id?>' class=" color1 flex-c-m size7 bg8 eff2">										
											<i class="fs-12 fa fa-minus" aria-hidden="true" name="reduce"></i>									
									</a>

									<input class="size8 m-text18 t-center num-product" type="number" id="num-product1" name="num-product1" value="<?php echo $item_quantity ?>">

									<a href='cart.php?add=<?php echo $cart_id?>&user=<?php echo $client_id ?>' class=" color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true" name="add"></i>
									</a>
								</div>
							</td>
							<td class="column-5">$<?php echo $total ?></td>
							<!-- <td><a href='cart.php?remove=$cart_id&user=$client_id'>Remove</a></td> -->
						</tr>
					<?php
						if (isset($_GET['remove'])) {
                                $removed_item_id = $_GET['remove'];

                                $remove_query = "DELETE FROM cart WHERE item_id = $removed_item_id AND client_id = $client_id";
                                $removed_item_query = mysqli_query($db,$remove_query);

                                header('Location: cart.php');
                            }
                            if (isset($_GET['add'])) {
                                $added_item_id = $_GET['add'];

                                $add_item_query = "UPDATE cart SET item_quantity = item_quantity + 1 WHERE item_id = $added_item_id AND client_id = $client_id";
                                $added_item_query = mysqli_query($db,$add_item_query);

                                header('Location: cart.php');
                            }

                            if (isset($_GET['reduce'])) {
                                $reduced_item_id = $_GET['reduce'];

                                $check_query = "SELECT * FROM cart WHERE item_id = $reduced_item_id AND client_id = $client_id ";
                                $check_quantity_query = mysqli_query($db,$check_query);
                                $check_row = mysqli_fetch_array($check_quantity_query);
                                $quantity = $check_row['item_quantity'];

                                if ($quantity == 1 ) {
                                    $reduce_item_query = "DELETE FROM cart WHERE item_id = $reduced_item_id AND client_id = $client_id";
                                    $reduced_item_query = mysqli_query($db,$reduce_item_query);
                                }else{
                                    $reduce_item_query = "UPDATE cart SET item_quantity = item_quantity - 1 WHERE item_id = $reduced_item_id AND client_id = $client_id";
                                    $reduced_item_query = mysqli_query($db,$reduce_item_query);
                                }

                                

                                header('Location: cart.php');
                            }
                            
						}
                            
                        ?>

						
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>

				<!-- <div class="size10 trans-0-4 m-t-10 m-b-10">
					
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Cart
					</button>
				</div> -->
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$<?php echo $total_final ?>
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							There are no shipping methods available. Please double check your address, or contact us if you need any help.
						</p>

						<span class="s-text19">
							Calculate Shipping
						</span>

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2" name="country">
								<option>Select a country...</option>
								<option>US</option>
								<option>UK</option>
								<option>Japan</option>
							</select>
						</div>

						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
						</div>

						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
						</div>

						<div class="size14 trans-0-4 m-b-10">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Update Totals
							</button>
						</div>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$<?php echo $total_final?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
				</div>
			</div>
		</div>
	</section>



	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
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