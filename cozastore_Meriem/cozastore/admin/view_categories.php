<?php 
session_start();
include "admin_header.php"
 ?>


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Product Categories
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>                      
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM categories  " ;
                            $load_cat = mysqli_query($db,$query);

                            if (!$load_cat) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_cat)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                $cat_desc = $row['cat_desc'];
                                $cat_image = $row['cat_img'];


                                echo "<tr>";
                                echo "<td>$cat_id</td>"; 
                                echo "<td><img class= 'img-responsive' src='../images/categories/$cat_image' alt=''  width='30%' height='30%'></td>";
                                echo "<td>$cat_title</td>";
                                echo "<td>$cat_desc</td>";
                                echo "<td> <a href='edit_categories.php?edit=$cat_id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_categories.php?delete=$cat_id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";
                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_cat_id = $_GET['delete'];

                                $delete_query = "DELETE FROM categories WHERE cat_id = '$deleted_cat_id'";
                                $deleted_cat = mysqli_query($db,$delete_query);

                                header('Location: view_categories.php');
                            }  

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>