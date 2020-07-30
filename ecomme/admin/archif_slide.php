<?php include "admin_header.php" ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            slide List
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
                        <!-- <th>Info</th>
                        <th>Price</th>
                        <th>Date</th> -->
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM slide  WHERE archif_slide = '1'" ;
                            $load_slides_query = mysqli_query($db,$query);

                            if (!$load_slides_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_slides_query)) {
                                $slide_id = $row['id_slide'];
                                $slide_title = $row['title_slide'];
                                $slide_image = $row['image_slide'];
                                $slide_desc = $row['desc_slide'];
                               

                                echo "<tr>";
                                echo "<td>$slide_id</td>";
                                echo "<td>$slide_title</td>";
                                echo "<td><img class= 'img-responsive' src='img/$slide_image' alt='' width='100' height='100'></td>";
                                echo "<td>$slide_desc</td>";
                                echo "<td> <a href='edit_slide.php?edit=$slide_id'>Edit</a></td>";
                                echo "<td><a href='archif_slide.php?delete=$slide_id'>add to slides</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_slide_id = $_GET['delete'];

                                $query_UPDATE = "UPDATE slide SET archif_slide = '0' WHERE id_slide = $deleted_slide_id";
                                $edit_slide_query = mysqli_query($db,$query_UPDATE);

                                header('Location: archif_slide.php');
                            }


                           

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>