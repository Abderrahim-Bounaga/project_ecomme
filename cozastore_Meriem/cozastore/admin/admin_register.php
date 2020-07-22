
<?php include "db.php" ?>
<?php 
 session_start();

if(isset($_POST['register_btn'])){

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["confpassword"]; 

    if($password === $cpassword){

        $query = "INSERT INTO register_admin (username, email, password) VALUES ( '$username', '$email', '$password')";
        $query_run = mysqli_query($db, $query);

        if($query_run){
            $_SESSION['success'] = "admin profile add";

            header('location: add_admin.php');
        }else{
            $_SESSION['status'] = "admin profile not add";
            header('location: add_admin.php');
        }
    }else{
        $_SESSION['status'] = "Password and confirm password does not match";
        header('location: add_admin.php');
    }
}




if(isset($_POST['updateBtn'])){
    
    $id = $_POST["edit_id"];
    $username = $_POST["edit_username"];
    $email = $_POST["edit_email"];
    $password = $_POST["edit_password"];
   
    $query ="UPDATE register_admin SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run){
        $_SESSION['success'] = "Your Data is Updated";

        header('location: add_admin.php');
    }else{
        $_SESSION['status'] = "Your Data is Not Updated";
        header('location: add_admin.php');
    }
}


if(isset($_POST['delete_btn'])){
    
    $id = $_POST["delete_id"];

    $query ="DELETE FROM register_admin WHERE id='$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run){
        $_SESSION['success'] = "Your Data is Delete";

        header('location: add_admin.php');
    }else{
        $_SESSION['status'] = "Your Data is Not Delete";
        header('location: add_admin.php');
    }

}

?>