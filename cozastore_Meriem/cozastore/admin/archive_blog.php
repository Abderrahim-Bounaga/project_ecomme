<?php 
session_start();
include "admin_header.php" 
?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Archive Blog 
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
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Add blog</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM blog  WHERE blog_archive = '1'" ;
                            $load_blog_query = mysqli_query($db,$query);

                            if (!$load_blog_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_blog_query)) {
                                $blog_id = $row['blog_id'];
                                $blog_title = $row['blog_title'];
                                $blog_image = $row['blog_img'];
                                $blog_date = $row['blog_date'];
                                $blog_desc = $row['blog_desc'];
                                
                                echo "<tr>";
                                echo "<td>$blog_id</td>";
                                echo "<td>$blog_title</td>";
                                echo "<td><img class= 'img-responsive' src='../images/blog/$blog_image' alt=''></td>";
                                echo "<td>$blog_desc</td>";
                                echo "<td>$blog_date</td>";
                                echo "<td> <a href='edit_blog.php?edit=$blog_id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='archive_blog.php?add=$blog_id'><i class='fa fa-fw fa-edit'></i>Add To Blog</a></td>";
                                echo "<td><a href='archive_blog.php?delete=$blog_id'><i class='fa fa-trash'></i>Delete</td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['add'])) {
                                $add_blog_id = $_GET['add'];

                                $query_added = "UPDATE blog SET blog_archive = '0' WHERE blog_id = $add_blog_id";
                                $edit_blog_query = mysqli_query($db,$query_added);

                                header('Location: archive_blog.php');
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_blog_id = $_GET['delete'];

                                $delete_query = "DELETE FROM blog WHERE blog_id = '$deleted_blog_id'";
                                $deleted_blog_query = mysqli_query($db,$delete_query);

                                header('Location: archive_blog.php');
                            } 

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>