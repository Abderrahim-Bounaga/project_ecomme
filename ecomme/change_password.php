

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
            <a class="list-group-item text-secondary stext-106 trans-04" href="confirm_user.php"> Confirm payment </a>
            <a class="list-group-item text-secondary stext-106 trans-04 " href="edit_account.php"> Settings </a>
			<a class="list-group-item  stext-106 trans-04 cl5 bg2" href="change_password.php"> Change password </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
		</nav>
	</aside> <!-- col.// -->
	<main class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="row" action="" method="post" >
                    <div class="col-md-9">
                    <br><br>
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Your Old Password:</label>
                                <input type="password" class="form-control" name="old_pass" >
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Your New Password:</label>
                                <input type="password" class="form-control" name="new_pass" >
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>Confirm Your New Password:</label>
                            <input type="password" class="form-control" name="new_pass_again" >
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <button name="change_pass" class="btn stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Save</button>

                        <br><br><br>

                    </div> <!-- col.// -->
                    
                </form>

                <?php 

                if(isset($_POST['change_pass'])){
                    
                    $c_id = $_SESSION['id'];
                    
                    $c_old_pass = $_POST['old_pass'];
                    
                    $c_new_pass = $_POST['new_pass'];
                    
                    $c_new_pass_again = $_POST['new_pass_again'];
                    $c_old_pass = password_hash($c_old_pass, PASSWORD_DEFAULT);

                   
                    
                    $sel_c_old_pass = "SELECT * FROM users WHERE password='$c_old_pass'";
                    
                    $run_c_old_pass = mysqli_query($db,$sel_c_old_pass);
                    
                    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

                   
                    
                    if($check_c_old_pass < 0){
                        
                        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
                        
                        exit();
                        
                    }
                    
                    if($c_new_pass!=$c_new_pass_again){
                        
                        echo "<script>alert('Sorry, your new password did not match')</script>";
                        
                        exit();
                        
                    }
                    $c_new_pass = password_hash($c_new_pass, PASSWORD_DEFAULT);
                    $update_c_pass = "UPDATE users SET password='$c_new_pass' WHERE id='$c_id'";
                    
                    $run_c_pass = mysqli_query($db,$update_c_pass);
                    
                    if($run_c_pass){
                        
                        echo "<script>alert('Your password has been updated')</script>";
                        
                        echo "<script>window.open('account_user.php','_self')</script>";
                        
                    }
                    
                }

                ?>
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

	