<?php 
session_start();
include "admin_header.php"
 ?>


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blog
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
                        <th>Date</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM blog  WHERE blog_archive = '0'" ;
                            $load_blog_query = mysqli_query($db,$query);

                            if (!$load_blog_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_blog_query)) {
                                $blog_id = $row['blog_id'];
                                $blog_title = $row['blog_title'];
                                $blog_img = $row['blog_img'];
                                $blog_date = $row['blog_date'];
                                $blog_desc = $row['blog_desc'];

                                echo "<tr>";
                                echo "<td>$blog_id</td>";
                                echo "<td>blog_id</td>";
                                echo "<td><img class= 'img-responsive' src='../images/blog/$blog_img' alt='' width='100' height='100'></td>";
                                echo "<td>$blog_date</td>";
                                echo "<td>$blog_desc</td>";
                                echo "<td> <a href='edit_blog.php?edit=$blog_id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_blog.php?archiver=$blog_id'><i class='fa fa-fw fa-edit'></i>archiver</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['archiver'])) {
                                $archive_blog_id = $_GET['archiver'];

                                $query_archive = "UPDATE blog SET blog_archive ='1' WHERE blog_id = '$archive_blog_id'";
                                $archive_blog_query = mysqli_query($db,$query_archive);

                                header('Location: view_blog.php');
                            }

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>