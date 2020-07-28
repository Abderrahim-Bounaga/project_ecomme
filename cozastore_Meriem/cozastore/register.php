<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>About</title>
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


    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            About
        </h2>
    </section>


    <!--================Register Box Area =================-->
    <section class="bg0 p-t-104 p-b-116 ">
        <div class="container">
            <div class="flex-w d-flex justify-content-center">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-md w-full-md">
                    <form method="post" action="register.php">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Log In
                        </h4>

                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username"
                                placeholder="Your Username" required>
                        </div>

                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email"
                                placeholder="Your Email Address" required>
                        </div>

                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password_1"
                                placeholder="Your password" required>
                        </div>

                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password_2"
                                placeholder="Confirm your password" required>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="reg_user">
                            Submit
                        </button>
                        <button
                            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 m-tb-15 trans-04 pointer"><a
                                href="login.php" class="text-white"> Already A User? Login</a>

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