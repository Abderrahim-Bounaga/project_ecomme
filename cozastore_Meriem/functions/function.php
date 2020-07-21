<?php 

$db = mysqli_connect('Localhost','root','','fashion');

/// start add product in page home///
function addProduct(){
    global $db;

    $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
    $run_products = mysqli_query($db, $get_products);
    while($row_products=mysqli_fetch_array($run_products)){
        $products_id = $row_products['product_id'];
        $products_title = $row_products['product_title'];
        $products_price = $row_products['product_price'];
        $products_img1 = $row_products['product_img1'];

        echo " 
        <div  class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item'>
            <div class='block2'>
                <div class='block2-pic hov-img0'>
                    <a hrf='product-detail.php?products_id=$products_id'>
                            <img class='img-responsive' src='images/$products_img1'>
                    </a>
                    <a hrf='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                    View Details
					</a> 
                </div>
                <div class='block2-txt flex-w flex-t p-t-14'>
                    <div class='block2-txt-child1 flex-col-l '>
                        <a hrf='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                        $products_title
                        </a>

                        <span class='stext-105 cl3'>
                        $products_price DH
                        </span>
                    </div>
                </div>
                <div class='block2-txt-child1 flex-col-l p-lr-90'>
               
                <a hrf='product-detail.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
                Add To Cart
                </a>
                </div>
            </div>
        </div>
        
        ";
    }
}
/// end add product in page home///


/// start categories in page product sideBar///
function categoreis(){

    global $db;

    $get_cat = "SELECT * FROM categories";
    $run_cat = mysqli_query($db, $get_cat);
    while($row_cat=mysqli_fetch_array($run_cat)){
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];

        echo"
        <button class='stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5'>
		  <a href='product.php?cat=$cat_id' class='filter-link stext-106 trans-04'> $cat_title </a>
		</button>
        
        ";
    } 
}
/// end categoreis in page product sideBar///

/// start categpreis in sideBar///
function cat(){

    global $db;

    $get_cate = "SELECT * FROM categories";
    $run_cate = mysqli_query($db, $get_cate);
    while($row_cate=mysqli_fetch_array($run_cate)){
        $cate_id = $row_cate['cat_id'];
        $cate_title = $row_cate['cat_title'];

        echo"
        <li class='p-b-6'>
		    <a href='product.php?cat=$cate_id' class='filter-link stext-106 trans-04'>
                $cate_title						
			</a>
	    </li>
        
        ";
    } 
}
/// end categpreis in sideBar///

/// start product_catego in page product sideBar///
function productCat(){

    global $db;

    $get_p_cat = "SELECT * FROM product_categories";
    $run_p_cat = mysqli_query($db, $get_p_cat);
    while($row_p_cat=mysqli_fetch_array($run_p_cat)){
        $p_cat_id = $row_p_cat['p_cat_id'];
        $p_cat_title = $row_p_cat['p_cat_title'];

        echo"
        <li class='p-b-6'>
		    <a href='product.php?p_cat=$p_cat_id' class='filter-link stext-106 trans-04'>
                $p_cat_title						
			</a>
	    </li>
        
        ";
    }

}
/// end product_catego in page product sideBar///



/// start function product by product_catego in page product sideBar///

function getProductCategoreis(){
  
    global $db;

    if(isset($_GET['p_cat'])){
        $p_cat_id = $_GET['p_cat'];
        $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id= '$p_cat_id'";
        $run_p_cat = mysqli_query($db, $get_p_cat);
        $row_p_cat =mysqli_fetch_array($run_p_cat);
        
        $get_products = "SELECT * FROM products WHERE p_cat_id= '$p_cat_id'";
        $run_products = mysqli_query($db, $get_products);
        $count = mysqli_num_rows($run_products);

        while($row_products=mysqli_fetch_array($run_products)){
            $products_id = $row_products['product_id'];
            $products_title = $row_products['product_title'];
            $products_price = $row_products['product_price'];
            $products_img1 = $row_products['product_img1'];

            echo " 
            <div  class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item center-responsive' >
                <div class='block2' >
                    <div class='block2-pic hov-img0'>
                        <a hrf='product-detail.php?products_id=$products_id'>
                                <img class='img-responsive' src='images/$products_img1'>
                        </a>
                        <a hrf='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                        View Details
                        </a> 
                    </div>
                    <div class='block2-txt flex-w flex-t p-t-14'>
                        <div class='block2-txt-child1 flex-col-l '>
                            <a hrf='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                            $products_title
                            </a>
    
                            <span class='stext-105 cl3'>
                            $products_price DH
                            </span>
                        </div>
                    </div>
                    <div class='block2-txt-child1 flex-col-l p-lr-90'>
                   
                    <a hrf='product-detail.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
                    Add To Cart
                    </a>
                    </div>
                </div>
            </div>
            
            ";
        }

    }
}

/// end  function product by product_catego in page product sideBar///


/// start function product by catego in page product sideBar///

function getcategoreis(){
  
    global $db;

    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";
        $run_cat = mysqli_query($db, $get_cat);
        $row_cat =mysqli_fetch_array($run_cat);
        
        $get_products = "SELECT * FROM products WHERE cat_id='$cat_id'";
        $run_products = mysqli_query($db, $get_products);
        $count = mysqli_num_rows($run_products);

        while($row_products=mysqli_fetch_array($run_products)){
            $products_id = $row_products['product_id'];
            $products_title = $row_products['product_title'];
            $products_price = $row_products['product_price'];
            $products_img1 = $row_products['product_img1'];

            echo " 
            <div  class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item center-responsive' >
                <div class='block2' >
                    <div class='block2-pic hov-img0'>
                        <a hrf='product-detail.php?products_id=$products_id'>
                                <img class='img-responsive' src='images/$products_img1'>
                        </a>
                        <a hrf='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                        View Details
                        </a> 
                    </div>
                    <div class='block2-txt flex-w flex-t p-t-14'>
                        <div class='block2-txt-child1 flex-col-l '>
                            <a hrf='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                            $products_title
                            </a>
    
                            <span class='stext-105 cl3'>
                            $products_price DH
                            </span>
                        </div>
                    </div>
                    <div class='block2-txt-child1 flex-col-l p-lr-90'>
                   
                    <a hrf='product-detail.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
                    Add To Cart
                    </a>
                    </div>
                </div>
            </div>
            
            ";
        }

    }
}

/// end  function product by catego in page product sideBar///

?>




           