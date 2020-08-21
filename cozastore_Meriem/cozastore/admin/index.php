<?php ob_start(); ?>
<?php 
 session_start();
 if(isset($_SESSION['username'])) {
     $_SESSION['msg'] = "you nust log in first to view this page";
     
 
?>

<?php include "admin_header.php" ?>


            <!-- /.container-fluid -->
            <?php include "dashbord.php" ?>

        

    <?php include "admin_footer.php" ?>
    <?php 
}else{
    header('location: admin_login.php');
} ?>