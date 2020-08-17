

<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <?php include "includes/store_nav2.php"?>
    <?php
    
if (isset($_POST['login_user'])) {
  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $select_user = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $run_user = mysqli_query($db,$select_user);

    $get_ip = getIpUser();
    $check_user = mysqli_num_rows($run_user);
    $row_user = mysqli_fetch_array($run_user);
    $user_id = $row_user['id'];
    $selsct_cart = "SELECT * FROM cart WHERE ip_add=' $get_ip'";
    $run_cart = mysqli_query($db, $selsct_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_user == 0){
        echo " <script>alert('this email or password is wrong')</script>";
        exit();
    }
    if($check_user==1 AND $check_cart==0){
        $_SESSION['id'] = $user_id;
        $_SESSION['username'] = $username;
        echo " <script>alert('Welcome $username')</script>";
        echo " <script>window.open('payment_options.php','_self')</script>";
    }
    

}
?>   

    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Login
        </h2>
    </section>


    <!--================Login Box Area =================-->
    <section class="bg0 p-t-104 p-b-116 ">
        <div class="container">
            <div class="flex-w d-flex justify-content-center">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-md w-full-md">
                    <form method="post" action="login.php">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Log In
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username"
                                placeholder="Username" required>
                            
                        </div>

                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password"
                                placeholder="Your password" required>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="login_user">
                            Submit
                        </button>
                        <button
                            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 m-tb-15 trans-04 pointer"><a
                                href="register.php" class="text-white"> Not A User? Create an Account</a>

                        </button>
                    </form>
                </div>

                
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->


    <!-- Footer -->
    <?php include "store_footer.php" ?>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function () {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function () {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>

