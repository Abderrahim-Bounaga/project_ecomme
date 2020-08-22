

<?php

session_start();
?>

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

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop p-tb-30">
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
		<nav class="list-group">
			<a class="list-group-item stext-106 trans-04 cl5 bg2 " href="account_user.php"> Account overview  </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="order_user.php"> My Orders </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="confirm_user.php"> Confirm payment </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="edit_account.php"> Settings </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="change_password.php"> Change password </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
		</nav>
	</aside> <!-- col.// -->
	<main class="col-md-9">

		<article class="card mb-3">
			<div class="card-body">
			        <?php include "profil_user.php"?>
					<hr>
					<p>
						<i class="fa fa-map-marker text-muted"></i> &nbsp; My address:  
						<br>
						Tashkent city, Street name, Building 123, House 321 &nbsp 
						<a href="#" class="btn-link"> Edit</a>
					</p>
			  
				

				<article class="card-group card-stat">
					<figure class="card bg">
						<div class="p-3">
							 <h4 class="title">38</h4>
							<span>Orders</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h4 class="title">5</h4>
							<span>Wishlists</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h4 class="title">12</h4>
							<span>Awaiting delivery</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h4 class="title">50</h4>
							<span>Delivered items</span>
						</div>
					</figure>
				</article>
				

			</div> <!-- card-body .// -->
		</article> <!-- card.// -->
		
		<article class="card  mb-3">
			<div class="card-body">
				<h5 class="card-title mb-4">Recent orders </h5>	
				
				<div class="row">
				<?php 
				 if (isset($_SESSION['id'])) {
					$client_id = $_SESSION['id'];
				}
			
                            
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
					<div class="col-md-6">
						<figure class="itemside  mb-3">
							<div class="aside"><img src="admin/img/<?php echo $item_image ?>" alt="<?php echo $item_title ?> class="border img-sm" width="30%" height="10%" ></div>
							<figcaption class="info">
								<time class="text-muted"><i class="fa fa-calendar-alt"></i> 12.09.2019</time>
								<p></p>
								<span class="text-success">Order confirmed </span>
							</figcaption>
						</figure>
					</div> <!-- col.// -->
					<?php
							}
					?>
				</div> <!-- row.// -->
				

			<a href="#" class="btn btn-outline-primary btn-block"> See all orders <i class="fa fa-chevron-down"></i>  </a>
			</div> <!-- card-body .// -->
		</article> <!-- card.// -->

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

    	<!-- Footer -->

		<?php require_once 'footer.php'; ?>