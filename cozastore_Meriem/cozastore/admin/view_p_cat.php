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
                            $query = "SELECT * FROM product_categories  " ;
                            $load_p_cat = mysqli_query($db,$query);

                            if (!$load_p_cat) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_p_cat)) {
                                $p_cat_id = $row['p_cat_id'];
                                $p_cat_title = $row['p_cat_title'];
                                $p_cat_desc = $row['p_cat_desc'];
                                $p_cat_image = $row['p_cat_img'];


                                echo "<tr>";
                                echo "<td>$p_cat_id</td>"; 
                                echo "<td><img class= 'img-responsive' src='../images/product_categories/$p_cat_image' alt=''  width='30%' height='30%'></td>";
                                echo "<td>$p_cat_title</td>";
                                echo "<td>$p_cat_desc</td>";
                                echo "<td> <a href='edit_p_cat.php?edit=$p_cat_id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_p_cat.php?delete=$p_cat_id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";
                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_p_cat_id = $_GET['delete'];

                                $delete_query = "DELETE FROM product_categories WHERE p_cat_id = '$deleted_p_cat_id'";
                                $deleted_p_cat = mysqli_query($db,$delete_query);

                                header('Location: view_p_cat.php');
                            }  

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>