<?php
session_start();

include "admin_header.php"
 ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header by-3">
            <h6 class="m-0 font-weight-bold text-primary"> Edit Admin profile </h6>
        </div>
        <?php 
        $db = mysqli_connect('localhost', 'root', '', 'fashion') ;
        if(isset($_POST['edit_btn'])){
           $id = $_POST['edit_id'];

           $query = "SELECT * FROM register_admin WHERE id='$id' ";
            $query_run = mysqli_query($db, $query);

            foreach($query_run as $row){
        
        ?>
        

        <div class="card-body" >
            <form action="admin_register.php" method="post">
                 <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>" >
                <div class="form-group">
                    <label >Username</label>
                    <input type="text"  name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" aria-describedby="emailHelp" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" >
                </div>

                <a href="add_admin.php" class="btn btn-danger"> CANCEL </a>
                <button class="btn btn-primary" type="submit" name="updateBtn"> UPDATE </button>
            </form>
            <?php
              }
            }

            ?>
        </div>
    </div>
</div>


<?php include "admin_footer.php" ?>