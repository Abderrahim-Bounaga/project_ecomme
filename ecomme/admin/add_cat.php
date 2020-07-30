<?php include "admin_header.php"?>
<?php include "db.php" ?>

<?php 

if (isset($_POST['add_cat'])) {
    $cat_title = $_POST['cat_title'];
    $cat_cat = $_POST['cat_cat'];
    $categories = $_POST['categories'];
    $cat_price = $_POST['cat_price'];
    $cat_info = $_POST['cat_info'];
    $cat_desc = $_POST['cat_desc'];
    $trend_cat = $_POST['trend_cat'];
   
    $cat_img1 = $_FILES['cat_img1']['name'];
   
    $temp_name1 = $_FILES['cat_img1']['tmp_name'];
   

    move_uploaded_file($temp_name1, "../img/$cat_img1");
   

    $add_cat = "INSERT INTO cats (Sou_CategoryId,Trending_cat,cat_CategoryId,cat_date,cat_title,cat_image,cat_price,cat_info,cat_desc) VALUES ('$cat_cat','$trend_cat','$categories',NOW(),'$cat_title','$cat_img1','$cat_price','$cat_info','$cat_desc')";
    $add_cat_query = mysqli_query($db,$add_cat);

    if($add_cat_query){
        echo " <script>alert('cat has been added successfully')</script>";
        echo " <script>window.open('add_cat.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add a cat
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_cat.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">cat Title</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>
                    <div class="form-group">
                        <label for="title"> cat categories </label>
                        <!-- <input type="text" class="form-control" name="cat_title"> -->
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

                    <div class="form-group">
                        <label for="title">cat sou_categories </label>
                        <!-- <input type="text" class="form-control" name="cat_title"> -->
                        <select name="cat_cat" class="form-control" >
                        
                        <option> Select a category cat </option>
                          
                          <?php 

                           $get_p_cats = "SELECT * FROM Sou_Category";
                           $run_p_cats = mysqli_query($db, $get_p_cats);
                           while($row_p_cat= mysqli_fetch_array($run_p_cats)){
                               $p_cat_id = $row_p_cat['Sou_Category_id'];
                               $p_cat_title = $row_p_cat['Sou_Category_title'];

                               echo "
                               <option value=' $p_cat_id' > $p_cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">trend cat</label>
                        <!-- <input type="text" class="form-control" name="cat_title"> -->
                        <select name="trend_cat" class="form-control" >
                        
                        <option value=0> non </option>
                        <option value=1 >oui </option>
                          
                          

                        </select>
                    </div>


                   

      
                    <div class="form-group">
                        <label for="cat_image">cat Image </label>
                        <input type="file"  name="cat_img1" class="form-control">
                    </div>

                    

                    <div class="form-group">
                        <label for="cat_price">cat Price</label>
                        <input type="number" class="form-control" name="cat_price">
                    </div>

                    <div class="form-group">
                        <label for="cat_info">cat Infos</label>
                        <textarea class="form-control "name="cat_info" id="" cols="30" rows="5">
                        </textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="cat_desc">cat Description</label>
                        <textarea class="form-control "name="cat_desc" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_cat" value="Add cat">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
