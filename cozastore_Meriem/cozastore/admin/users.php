<?php 
session_start();
include "admin_header.php"
 ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Username</th>                       
                        <th>Profil</th>                       
                        <th>Email</th>                       
                        <th>City</th>                       
                        <th>Adress</th>                       
                        <th>Contact</th>                       
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM user";
                            $load_users_query = mysqli_query($db,$query);

                            if (!$load_users_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_users_query)) {
                                $user_id = $row['id'];
                                $user_name = $row['username'];
                                $user_email = $row['email'];
                                $user_city = $row['city'];
                                $user_adress = $row['address'];
                                $user_contact = $row['contact'];
                                $user_image = $row['user_img'];
                                $user_date = $row['date_inscr'];
                                
                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$user_name</td>";
                                echo "<td><img class= 'img-responsive' src='../customer/img/$user_image' alt=''  width='30%' height='30%'></td>";
                                echo "<td>$user_email</td>";
                                echo "<td>$user_city</td>";
                                echo "<td>$user_adress</td>";
                                echo "<td>$user_contact</td>";
                                echo "<td>$user_date</td>";                               
                                echo "<td><a href='users.php?delete=$user_id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";
                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_user_id = $_GET['delete'];

                                $delete_query = "DELETE FROM user WHERE id = $deleted_user_id";
                                $deleted_user_query = mysqli_query($db,$delete_query);

                                header('Location: users.php');
                            }
                            

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

    <?php include "admin_footer.php" ?>