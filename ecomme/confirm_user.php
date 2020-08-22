

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
<section class="section-pagetop  p-tb-30">
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
			<a class="list-group-item text-secondary stext-106 trans-04  " href="order_user.php"> My Orders </a>
			<a class="list-group-item  stext-106 trans-04 cl5 bg2" href="confirm_user.php"> Confirm payment </a>
			<a class="list-group-item text-secondary stext-106 trans-04 " href="edit_account.php"> Settings </a>
            <a class="list-group-item text-secondary stext-106 trans-04" href="change_password.php"> Change password </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
		</nav>
	</aside> <!-- col.// -->
	<main class="col-md-9">
          <?php 
           if(isset($_GET['order_id'])){
    
            $order_id = $_GET['order_id'];
            
        }
          
          ?>
        <div class="card">
            <div class="card-body">
                <form class="row" action="confirm_user.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-9">
                        <h4 class="card-title">Please confirm your payment</h4>
                        <br> 
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Invoice NO </label>
                                <input type="text" class="form-control" value="123456789" name="invoice_no">
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Amount Sent</label>
                                <input type="text" class="form-control" value="" name="amount_sent">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>Select Payement Mode </label>
                            <select id="inputState" class="form-control" name="payment_mode">
                                <option> Choose...</option>
                                <option>Back Code</option>
                                <option>UBL / Omni Paisa</option>
                                <option selected="">Easy Paisa</option>
                                <option>Western Union</option>
                            </select>
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                            <label>Transaction/ Reference ID</label>
                            <input type="text" class="form-control" name="ref_no">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>Omni Paisa/ East Paisa</label>
                            <input type="text" class="form-control" value="" name="code">
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                            <label>Payment Date</label>
                            <input type="text" class="form-control" value="+2126456789" name="date">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        <br>
                        <button class="btn stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="confirm_payment">Confirm Payment</button>	

                        <br><br>

                    </div> <!-- col.// -->
                    
                </form>
                <?php 
               
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "INSERT INTO payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) VALUES ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($db,$insert_payment);
                        
                        $update_customer_order = "UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($db,$update_customer_order);
                        
                        $update_pending_order = "UPDATE pending_orders SET order_status='$complete' WHERE order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($db,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                            
                            echo "<script>window.open('order_user.php','_self')</script>";
                            
                        }
                        
                    }
                   
                   ?>
                <br> 
            </div> <!-- card-body.// -->
        </div> <!-- card .// -->

        <br> <br> <br> <br> <br>

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


       	<!-- Footer -->
	<?php include "footer.php" ?>

