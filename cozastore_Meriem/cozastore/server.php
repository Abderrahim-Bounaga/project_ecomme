<?php include "db.php" ?>
<?php

session_start();

//inistialising variables
$username = '';
$email = '';

$errors = array();

//connect to db


//register users
if(isset($_POST['reg_user'])){
$username = mysqli_real_escape_string($db, $_POST["username"]);
$email = mysqli_real_escape_string($db, $_POST["email"]);
$password_1 = mysqli_real_escape_string($db, $_POST["password_1"]);
$password_2 = mysqli_real_escape_string($db, $_POST["password_2"]);

// form validation
if(empty($username)){array_push($errors, "username is required");};
if(empty($email)) {array_push($errors, "email is required");};
if(empty($password_1)) {array_push($errors, "password is required");};
if($password_1 != $password_2) {array_push($errors, "passwords do not match");};
 
// check db for existing user with same username
$user_check = "SELECT * FROM user WHERE username='$username' OR email= '$email' LIMIT 1";
$result = mysqli_query($db, $user_check);
$user = mysqli_fetch_assoc($result);
if($user){
    if($user['username'] === $username) {array_push($errors, "username already exists");}
    if($user['email'] === $email) {array_push($errors, "this email id already has a registered username");}
};

//register the user if not error
if(count($errors) === 0) {
    $password = md5($password_1);// this will incrypt password
    $date_creation_compte = date('Y-m-d H:i:s');
    // print $password;
    $query = $db->prepare("INSERT INTO user (username, email, password, date_inscr) VALUES ( '$username', '$email', '$password', '$date_creation_compte')");
    $query->execute();

    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "you are now logged in";

    header('location: index.php');

}
}

//login user
if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);

    if(empty($username)){
        array_push($errors,'username is required');
    }
    if(empty($password)){
        array_push($errors,'password is required');
    }
    if(count($errors) == 0){
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $results = mysqli_query($db, $query);
        if(mysqli_num_rows($results)){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "logged in is successfully";
            header('location: index.php');
        }else{
            array_push($errors,'wrong username/password combination. please try again');
        }
    }
}

?>