<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">PerfectCup Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="users.php"><i class="fa fa-fw fa-user"></i> users</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        
                    </ul>
                    <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li  class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-eye"></i>Products <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="view_products.php"><i class="fa fa-fw fa-eye"></i> View Products</a>
                            </li>
                            <li>
                                <a href="add_product.php"><i class="fa fa-fw fa-plus"></i> Add Products</a>
                            </li> 
                            <li>
                                <a href="archif_product.php"><i class="fa fa-fw fa-plus"></i> archif Products</a>
                            </li>
                        </ul>
                    </li>
                    <li  class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-eye"></i>Categroy <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="view_cat.php"><i class="fa fa-fw fa-eye"></i> View Cat</a>
                            </li>
                            <li>
                                <a href="add_cat.php"><i class="fa fa-fw fa-plus"></i> Add Cat</a>
                            </li> 
                            <li>
                                <a href="archif_cat.php"><i class="fa fa-fw fa-plus"></i> archif Cat</a>
                            </li>
                        </ul>
                    </li>
                    <li  class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-eye"></i>slide <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="view_slide.php"><i class="fa fa-fw fa-eye"></i> View slide</a>
                            </li>
                            <li>
                                <a href="add_slide.php"><i class="fa fa-fw fa-plus"></i> Add slide</a>
                            </li> 
                            <li>
                                <a href="archif_slide.php"><i class="fa fa-fw fa-plus"></i> archif slide</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="cart.php"><i class="fa fa-fw fa-table"></i> Cart</a>
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>