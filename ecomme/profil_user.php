        <center>
        <?php 
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $get_user = "SELECT * FROM users WHERE firstname='$firstname' AND lastname='$lastname'";
        $run_user = mysqli_query($db,$get_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_img = $row_user['user_img'];
        $user_name = $row_user['firstname'];
        $userl_name = $row_user['lastname'];
        $user_email = $row_user['email'];
        if(!isset($_SESSION['firstname'])){

        }else{
            echo"
            <figure class='icontext'>
                <div class='icon'>
                    <img class='rounded-circle img-sm border' src='./customer/img/$user_img' width='30%' height='30%'>
                </div>
                <div class='text'>
                    <strong> $user_name  $userl_name </strong> <br> 
                    <p class='mb-2'> $user_email   </p>
                </div>
            </figure>
            ";
        }
        ?>

            
        </center>
		
        