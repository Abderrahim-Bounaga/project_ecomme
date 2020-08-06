
<?php include "db.php" ?>
<?php
session_start();
include "admin_header.php"
 ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add admin data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <form method="post" action="admin_register.php" >
            <div class="modal-body">
                <div class="form-group">
                    <label >Username</label>
                    <input type="text"  name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confpassword" class="form-control" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="register_btn" class="btn btn-primary">Save</button>
            </div>  
        </form>
     
      
      </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header by-3">
            <h6 class="m-0 font-weight-bold text-primary"> Admin profile
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add admin profile 
                </button>
            </h6>
        </div>

        <div class="card-body" >

        <?php 
        
        if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
            echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
            echo "<div class='alert alert-danger'>".$_SESSION['status']."</div>";
            unset($_SESSION['status']);
        }

        ?>
            <div class="table-responsive">

            <?php 
            
            $query = "SELECT * FROM register_admin";
            $query_run = mysqli_query($db, $query);

            ?>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cillspacing="0">
                    <thead>
                        <tr>
                                
                            <th>Id</th>
                            <th>Username</th>                       
                            <th>Email</th>
                            <th>Password</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                                        
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    
                    if(mysqli_num_rows($query_run) > 0){
                        while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                        <tr>
                                
                            <th><?php echo $row['id']; ?></th>
                            <th><?php echo $row['username']; ?></th>                       
                            <th><?php echo $row['email']; ?></th>
                            <th><?php echo $row['password']; ?></th>
                            <th>
                            <form action="register_edit.php" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                            </form>
                            </th>
                            <th>
                            <form action="admin_register.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete_btn"  class="btn btn-danger">DELETE</button>
                            </form>
                            </th>
                                        
                        </tr>

                    <?php
                        }
                    }else{
                        echo "No record found";
                    }
                    
                    ?>
                    <tbody>

                </table>
            </div>
        </div>
    </div>
</div>



<?php include "admin_footer.php" ?>