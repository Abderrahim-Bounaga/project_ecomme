        <center>
        <?php 
        $user_session = $_SESSION['username'];
        $get_user = "SELECT * FROM user WHERE username='$user_session'";
        $run_user = mysqli_query($db,$get_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_img = $row_user['user_img'];
        $user_name = $row_user['username'];
        $user_email = $row_user['email'];
        if(!isset($_SESSION['username'])){

        }else{
            echo"
            <figure class='icontext'>
                <div class='icon'>
                    <img class='rounded-circle img-sm border' src='customer/img/$user_img' width='30%' height='30%'>
                </div>
                <div class='text'>
                    <strong> $user_name </strong> <br> 
                    <p class='mb-2'> $user_email   </p>
                </div>
            </figure>
            ";
        }
        ?>

            
        </center>
		
        