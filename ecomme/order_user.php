

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
    <?php include "profil_user.php"?> 
    <nav class="list-group">
			<a class="list-group-item text-secondary stext-106 trans-04" href="account_user.php"> Account overview  </a>
			<a class="list-group-item  stext-106 trans-04 cl5 bg2 " href="order_user.php"> My Orders </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="confirm_user.php"> Confirm payment </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="edit_account.php"> Settings </a>
            <a class="list-group-item text-secondary stext-106 trans-04" href="change_password.php"> Change password </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
		</nav> 
	</aside> <!-- col.// -->
	<main class="col-md-9">
            
		<article class="card mb-4">
        <?php 
        $user_session = $_SESSION['firstname'];
        $client_id = $_SESSION['id'];
            

        
        $get_orders = "SELECT * FROM customer_orders WHERE customer_id='$client_id'";
        
        $run_orders = mysqli_query($db,$get_orders);

        $row_orders = mysqli_fetch_array($run_orders);
        $invoice_no = $row_orders['invoice_no'];
        $order_date = substr($row_orders['order_date'],0,11);
        
        ?>
		<header class="card-header">
			
			<strong class="d-inline-block mr-3">Order ID: <?php echo $invoice_no; ?>  </strong>
			<span>Order Date: <?php echo $order_date; ?> </span>
		</header>
		<div class="card-body">
			<div class="row"> 
				<div class="col-md-8">
					<h6 class="text-muted">Delivery to</h6>
					<p>Michael Jackson <br>  
					Phone +1234567890 Email: myname@gmail.com <br>
			    	Location: Home number, Building name, Street 123, <br> 
			    	P.O. Box: 100123
			 		</p>
				</div>
				<div class="col-md-4">
					<h6 class="text-muted">Payment</h6>
					<span class="text-success">
						<i class="fab fa-lg fa-cc-visa"></i>
					    Visa  **** 4216  
					</span>
					<p>Subtotal: $356 <br>
					 Shipping fee:  $56 <br> 
					 <span class="b">Total:  $456 </span>
					</p>
				</div>
			</div> <!-- row.// -->
		</div> <!-- card-body .// -->
		<div class="table-responsive">
		<table class="table table-hover">
			<tbody>
            <?php 
            
            
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                $due_amount = $row_orders['due_amount'];
                $image_pro = $row_orders['image_pro'];
                $title_pro = $row_orders['title_pro'];
                $qty = $row_orders['qty'];
                $size = $row_orders['size'];
                $color = $row_orders['color'];
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
           

            <tr>
				<td width="65">
					<img src="images/<?php echo $image_pro; ?>" class="img-xs border" width="110%" height="120%">
				</td>
				<td> 
					<p class="title mb-0"><?php echo $title_pro; ?> </p>
					<var class="price text-muted"><?php echo $due_amount; ?> DH</var>
				</td>
				<td> <?php echo $size; ?> <br> <?php echo $color; ?> </td>
                <td> 
                    <p class="title mb-0"> <?php echo $qty.'Pièce'; ?> </p>
					<var class="price text-muted"> <?php echo $order_status; ?> </var>
				</td>
                
				<td width="250"> 
                    <a href="confirm_user.php?order_id=<?php echo $order_id; ?>" class="btn stext-101 cl2 bg8 bor13 hov-btn3 p-lr-15  pointer m-tb-10">Track order</a> 
					
				</td>
			</tr>
			<?php } ?>
			
		</tbody></table>
		</div> <!-- table-responsive .end// -->
        
		</article> <!-- card order-item .// -->
        

		
        <br> <br> <br> <br> <br>

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<?php require_once 'footer.php'; ?>