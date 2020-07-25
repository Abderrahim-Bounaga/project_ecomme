<?php include "admin_header.php" ?>
<?php include "db.php" ?>



<?php 

if (isset($_POST['add_categories'])) {
    $categories_title = $_POST['categories_title'];
   
    
   
    $categories_img = $_FILES['categories_img']['name'];
   
    $temp_name1 = $_FILES['categories_img']['tmp_name'];
   

    move_uploaded_file($temp_name1, "../img/categories/$categories_img");
   

    $add_product = "INSERT INTO categories (Category_title,Category_image) VALUES ('$categories_title','$categories_img')";
    $add_product_query = mysqli_query($db,$add_product);

    if($add_product_query){
        echo " <script>alert('categories has been added successfully')</script>";
        echo " <script>window.open('categories_product.php','_self')</script>";
    }

}


if (isset($_POST['add_sou_categories'])) {
    $sou_categories_title = $_POST['sou_categories_title'];
   
    $categories = $_POST['categories'];
    
   
    $sou_categories_img = $_FILES['sou_categories_img']['name'];
   
    $temp_name1 = $_FILES['sou_categories_img']['tmp_name'];


    move_uploaded_file($temp_name1, "../img/sou_categories/$sou_categories_img");
   

    $add_product = "INSERT INTO sou_categories (Sou_Category_title,Id,sou_categories_img) VALUES ('$sou_categories_title','$categories','$sou_categories_img')";
    $add_product_query = mysqli_query($db,$add_product);

    if($add_product_query){
        echo " <script>alert('sou_categories has been added successfully')</script>";
        echo " <script>window.open('categories_product.php','_self')</script>";
    }

}
?>








            <div class="container-fluid">

                <!-- Ajoute categories -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Ajoute categories
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <form action="categories_product.php" method="post" enctype="multipart/form-data">    

                <div class="form-group">
              
                        <label for="title">Title categories </label>
                        <input type="text" class="form-control" name="categories_title">
                    </div>
                    <div class="form-group">
                        <label for="product_image">categories Image </label>
                        <input type="file"  name="categories_img" class="form-control">
                    </div>
                <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_categories" value="Ajoute categories">
                    </div>
                    </form>

                                    <!-- /. Ajoute categories -->

                                    <!-- Ajoute sou_categories -->

                    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Ajoute sou_categories
                        </h1>
                        
                    </div>
                </div>
                    <div class="form-group">
                    
                    <div class="form-group">
                    <div class="form-group">
                        <label for="title">Title categories </label>
                        <input type="text" class="form-control" name="sou_categories_title">
                    </div>
                    <div class="form-group">
                        <label for="product_image">sou_categories Image </label>
                        <input type="file"  name="sou_categories_img" class="form-control">
                    </div>
                
                        <label for="title"> Select categories </label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="categories" class="form-control" >
                        
                        <option> Select a category </option>
                          
                          <?php 

                           $get_cat = "SELECT * FROM categories";
                           $run_cat = mysqli_query($db, $get_cat);
                           while($row_cat= mysqli_fetch_array($run_cat)){
                               $cat_id = $row_cat['Id'];
                               $cat_title = $row_cat['Category_title'];

                               echo "
                               <option value='$cat_id' > $cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>
                    </div>

                   

                    <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_sou_categories" value="Ajoute sou_categories ">
                    </div>

                      <!-- /. Ajoute sou_categories -->
                    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        categories List
                        </h1>
                        
                    </div>
                    </form>

                </div>
                <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>souCatigores</th>
                        
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                             $query = "SELECT * FROM categories " ;  

                            $load_products_query = mysqli_query($db,$query);
                            
  
                           



                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $Category_id = $row['Id'];
                                $Category_title = $row['Category_title'];
                                $Category_image = $row['Category_image'];
                                $Category_title = $row['Category_title'];

                               
                               
                                

                                echo "<tr>";
                                echo "<td>$Category_id</td>";
                                echo "<td>$Category_title</td>";
                                echo "<td><img class= 'img-responsive' src='../img/$Category_image' alt='' width='100' height='100'></td>";
                               
                               

                                $query_sou_category = "SELECT * FROM sou_category LEFT JOIN categories ON sou_category.Sou_Category_id = categories.Id WHERE Id = $Category_id" ;
                                $load_sou_category_query = mysqli_query($db,$query_sou_category);
                                
                                while ($row_sou_category = mysqli_fetch_array($load_sou_category_query)) {

                                    $Sou_Category_title = $row_sou_category['Sou_Category_title'];

                                
                                }
 


                               
                                echo "<td>
                                <li >
                                    $Sou_Category_title </li >
                                
                                </td>";

                                echo "<td> <a href='edit_product.php?edit='>Edit</a></td>";
                                echo "<td><a href='view_products.php?delete='>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_product_id = $_GET['delete'];

                                $query_UPDATE = "UPDATE products SET product_archif = '1' WHERE product_id = $deleted_product_id";
                                $edit_product_query = mysqli_query($db,$query_UPDATE);

                                header('Location: view_products.php');
                            }


                           

                        ?>

                      </tbody>
            </table>
            

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>