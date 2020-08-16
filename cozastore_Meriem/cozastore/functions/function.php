<?php 

$db = mysqli_connect('Localhost','root','','fashion');

/// start getIpUser ///
function getIpUser(){
     switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default : return $_SERVER['REMOTE_ADDR'];
     }
}

/// start add_cart ///

function add_cart(){
    global $db;
    if(isset($_GET['add_cart'])){
        $ip_add = getIpUser();
        $p_id = $_GET['add_cart'];
        $product_size = $_POST['product_size'];
        $product_color = $_POST['product_color'];
        $product_qty = $_POST['product_qty'];

        $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        $run_check = mysqli_query($db, $check_product);
        if(mysqli_num_rows($run_check) > 0){
            echo " <script>alert('this product has already added in your cart')</script>";
            echo " <script>window.open('product-detail.php?products_id=$p_id','_self')</script>";
            
        }else{
            $query = "INSERT INTO cart (p_id,ip_add,size,color,qty) VALUES ('$p_id','$ip_add','$product_size','$product_color','$product_qty')";
            $run_query = mysqli_query($db,$query);
            echo " <script>window.open('product-detail.php?products_id=$p_id','_self')</script>";
        };
    }
}

/// finish add_cart ///
/// finish getIpUser ///

/// start add product in page home///
function addProduct(){
    global $db;

    $get_products = "SELECT * FROM products WHERE product_archive = '0'  ORDER BY 1 DESC LIMIT 0,8";
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
                    <a href='product-detail.php?products_id=$products_id'>
                            <img class='img-responsive' src='images/$products_img1'>
                    </a>
                    <a href='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                    View Details
					</a> 
                </div>
                <div class='block2-txt flex-w flex-t p-t-14'>
                    <div class='block2-txt-child1 flex-col-l '>
                        <a href='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                        $products_title
                        </a>

                        <span class='stext-105 cl3'>
                        $products_price DH
                        </span>
                    </div>
                </div>
                <div class='block2-txt-child1 flex-col-l p-lr-90'>
               
                <a href='product-detail.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
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
        
        $get_products = "SELECT * FROM products WHERE p_cat_id= '$p_cat_id' AND product_archive = '0'";
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
                        <a href='product-detail.php?products_id=$products_id'>
                                <img class='img-responsive' src='images/$products_img1'>
                        </a>
                        <a href='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                        View Details
                        </a> 
                    </div>
                    <div class='block2-txt flex-w flex-t p-t-14'>
                        <div class='block2-txt-child1 flex-col-l '>
                            <a href='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                            $products_title
                            </a>
    
                            <span class='stext-105 cl3'>
                            $products_price DH
                            </span>

                        </div>
                    </div>
                    <div class='block2-txt-child1 flex-col-l p-lr-90'>
                   
                    <a href='product-detail.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
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
        
        $get_products = "SELECT * FROM products WHERE cat_id='$cat_id'  AND product_archive = '0' LIMIT 0,6";
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
                        <a href='product-detail.php?products_id=$products_id'>
                                <img class='img-responsive' src='images/$products_img1'>
                        </a>
                        <a href='product-detail.php?products_id=$products_id' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                        View Details
                        </a> 
                    </div>
                    <div class='block2-txt flex-w flex-t p-t-14'>
                        <div class='block2-txt-child1 flex-col-l '>
                            <a href='product-detail.php?products_id=$products_id' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                            $products_title
                            </a>
    
                            <span class=' stext-105 cl3'>
                            $products_price DH
                            </span>

                        </div>
                    </div>
                    <div class='block2-txt-child1 flex-col-l p-lr-90'>
                   
                    <a href='shoping-cart.php?products_id=$products_id' class=' flex-c-m stext-103 cl5 size-102 bg2 bor1 hov-btn1 p-lr-15 trans-04 '>
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

/// start  function item///
function items(){
    global $db;
    
    $ip_add = getIpUser();
    $get_item = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_item = mysqli_query($db, $get_item);
    $count = mysqli_num_rows($run_item);
    echo $count;
}
/// end  function item///
?>




           