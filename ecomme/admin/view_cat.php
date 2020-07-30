<?php include "admin_header.php" ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Product List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM categories  WHERE Category_archif = '0'" ;
                            $load_products_query = mysqli_query($db,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $Category_id = $row['Category_id'];
                                $Category_title = $row['Category_title'];
                                $Category_desc = $row['Category_desc'];
                               $Category_date = $row['Category_date'];


                                echo "<tr>";
                                echo "<td>$Category_id</td>";
                                echo "<td>$Category_title</td>";
                                echo "<td>$Category_desc</td>";
                                echo "<td>$Category_date</td>";
                                echo "<td> <a href='edit_cat.php?edit=$Category_id'>Edit</a></td>";
                                echo "<td><a href='view_cat.php?delete=$Category_id'>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_product_id = $_GET['delete'];

                                $query_UPDATE = "UPDATE categories SET Category_archif = '1' WHERE Category_id = $deleted_product_id";
                                $edit_product_query = mysqli_query($db,$query_UPDATE);

                                header('Location: view_cat.php');
                            }


                           

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>