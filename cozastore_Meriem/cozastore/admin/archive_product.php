<?php 
session_start();
include "admin_header.php" 
?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Archive Product 
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>Description</th>
                        <th>Info</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Add product</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM products  WHERE product_archive = '1'" ;
                            $load_products_query = mysqli_query($db,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_image = $row['product_img1'];
                                $product_desc = $row['product_desc'];
                                $product_info = $row['product_info'];
                                $product_price = $row['product_price'];
                                $product_date = $row['date'];


                                echo "<tr>";
                                echo "<td>$product_id</td>";
                                echo "<td>$product_title</td>";
                                echo "<td><img class= 'img-responsive' src='../images/$product_image' alt=''></td>";
                                echo "<td>$product_desc</td>";
                                echo "<td>$product_info</td>";
                                echo "<td>$product_price</td>";
                                echo "<td>$product_date</td>";
                                echo "<td> <a href='edit_product.php?edit=$product_id'>Edit</a></td>";
                                echo "<td><a href='archive_product.php?add=$product_id'>add to products</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['add'])) {
                                $add_product_id = $_GET['add'];

                                $query_added = "UPDATE products SET product_archive = '0' WHERE product_id = $add_product_id";
                                $edit_product_query = mysqli_query($db,$query_added);

                                header('Location: archive_product.php');
                            }


                           

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>