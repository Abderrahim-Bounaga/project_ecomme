
<?php session_start() ?>

<?php 
    $_SESSION['id'] = null;
    $_SESSION['fname'] = null;
    $_SESSION['lname'] = null;
     $_SESSION['welcome']= null;
     $_SESSION['contor']= null;


    header('Location: index.php');
?>