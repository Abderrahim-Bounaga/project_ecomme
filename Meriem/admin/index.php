<?php ob_start(); ?>
<?php 
 session_start();
 if(isset($_SESSION['username'])) {
     $_SESSION['msg'] = "you nust log in first to view this page";
     
 
?>

<?php include "admin_header.php" ?>



            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
    <?php 
}else{
    header('location: admin_login.php');
} ?>