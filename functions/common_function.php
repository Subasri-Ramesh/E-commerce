<?php
//including connect file
//include('./includes/connect.php');

//getting products
function getproducts(){
    global $con;

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['hamper'])){
$select_query="select * from products order by rand() limit 0,9";
            $result_query=mysqli_query($con,$select_query);
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $category_id=$row['category_id'];
              $hamper_id=$row['hamper_id'];
              $product_price=$row['product_price'];
               // Display only the first two lines of the description
               $short_description = implode(' ', array_slice(explode(' ', $product_description), 0, 10));

              echo "<div class='col-md-4 mb-2 p-3'>
              <div class='card'>
                    <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$short_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                 </div>
              </div>
           </div>";
          }
        }
    }
}

//getting all products
function get_all_products(){
    global $con;

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['hamper'])){
$select_query="select * from products order by rand()";
            $result_query=mysqli_query($con,$select_query);
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $product_keywords=$row['product_keywords'];
              $category_id=$row['category_id'];
              $hamper_id=$row['hamper_id'];
              $product_price=$row['product_price'];
              echo "<div class='col-md-4 mb-2 p-3'>
              <div class='card'>
                    <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                 </div>
              </div>
           </div>";
          }
        }
    }
}


//getting unique hampers

function get_unique_hampers(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['hamper'])){
        $hamper_id=$_GET['hamper'];
$select_query="select * from products where hamper_id=$hamper_id";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo"<h2 class='text-center text-danger p-4'> This hamper is not available!!!</h2>";
            }
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $product_keywords=$row['product_keywords'];
              $category_id=$row['category_id'];
              $hamper_id=$row['hamper_id'];
              $product_price=$row['product_price'];
              echo "<div class='col-md-4 mb-2 p-3'>
              <div class='card'>
                    <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                 </div>
              </div>
           </div>";
          }
        }
    }



//getting unique categories

function get_unique_categories(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
$select_query="select * from products where category_id=$category_id";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo"<h2 class='text-center text-danger p-4'> No stock for this category!!!</h2>";
            }
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $product_keywords=$row['product_keywords'];
              $category_id=$row['category_id'];
              $hamper_id=$row['hamper_id'];
              $product_price=$row['product_price'];
              echo "<div class='col-md-4 mb-2 p-3'>
              <div class='card'>
                    <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                 </div>
              </div>
           </div>";
          }
        }
    }



//displaying categories in sidenav
function getcategory()
{   
    global $con;
    $select_categories="select * from categories";
    $result_categories=mysqli_query($con,$select_categories);
    //$row_data=mysqli_fetch_assoc($result_categories);
    //echo $row_data['category_title'];
    while($row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo" <li class='nav-item'>
      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
  </li>";
    } 
}


//displaying hampers in sidenav
function gethamper(){
    global $con;
$select_hampers="select * from hampers";
$result_hampers=mysqli_query($con,$select_hampers);
//$row_data=mysqli_fetch_assoc($result_categories);
//echo $row_data['category_title'];
while($row_data=mysqli_fetch_assoc($result_hampers)){
  $hamper_title=$row_data['hamper_title'];
  $hamper_id=$row_data['hamper_id'];
  echo" <li class='nav-item'>
  <a href='index.php?hamper=$hamper_id' class='nav-link text-light'>$hamper_title</a>
</li>";
} 
}

//searching products function

function search_product(){

    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
    $search_query="select * from products where product_keywords like '%$search_data_value%'";
            $result_query=mysqli_query($con,$search_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo"<h2 class='text-center text-danger p-4'>No results match. No products found on this category!</h2>";
            }
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $product_keywords=$row['product_keywords'];
              $category_id=$row['category_id'];
              $hamper_id=$row['hamper_id'];
              $product_price=$row['product_price'];
              echo "<div class='col-md-4 mb-2 p-3'>
              <div class='card'>
                    <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                 </div>
              </div>
           </div>";
          }
        }
    }

    //view details function
    function view_details()
    {
        global $con;

        //condition to check isset or not
        if (isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['hamper'])){
                $product_id=$_GET['product_id'];
    $select_query="select * from products where product_id=$product_id";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                  $product_id=$row['product_id'];
                  $product_title=$row['product_title'];
                  $product_description=$row['product_description'];
                  $product_image1=$row['product_image1'];
                  $product_image2=$row['product_image2'];
                  $product_keywords=$row['product_keywords'];
                  $category_id=$row['category_id'];
                  $hamper_id=$row['hamper_id'];
                  $product_price=$row['product_price'];
                  $user_image1=$row['user_image1'];
                  
                   // Display only the first two lines of the description
                   $short_description = implode(' ', array_slice(explode(' ', $product_description), 0, 10));
                   $full_description = implode(' ', array_slice(explode(' ', $product_description), 0, 500));
                  echo "<div class='col-md-4 mb-2 p-3'>
                  <div class='card mt-5'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$short_description</p>
                        <p class='card-text'>Price: $product_price/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                     </div>
                  </div>
               </div>
               
               <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-danger mb-5 '>Related Products</h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>  
                    <p class='card-text'>$full_description</p>
                    </div>
                </div>
            </div>";
              }
            }
        }
        
    }

    }

//get ip address function
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress(); 
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from cart_details where ip_address= '$get_ip_add' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows>0){
                echo"<script>alert('This item already present in the cart')</script>";
                echo"<script>window.open(index.php, '_self')</script>";
            }else{
                $insert_query="insert into cart_details(product_id, ip_address, quantity) values ($get_product_id,'$get_ip_add', 0)";
                $result_query=mysqli_query($con,$insert_query);
                echo"<script>alert('Item is added to cart')</script>";
                echo"<script>window.open(index.php, '_self')</script>";
            }
    }
}

//function to get cart item numbers
function cart_item()
{

    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress(); 
        $select_query="select * from cart_details where ip_address= '$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
                global $con;
                $get_ip_add = getIPAddress(); 
                $select_query="select * from cart_details where ip_address= '$get_ip_add'";
                $result_query=mysqli_query($con,$select_query);
                $count_cart_items=mysqli_num_rows($result_query);
            }
        echo $count_cart_items;
    }

    //total price
    function total_cart_price(){
        global $con;
        $get_ip_add = getIPAddress();
        $total_price=0;
        $cart_query="select * from cart_details where ip_address='$get_ip_add'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="select * from products where product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        

        }
    }
    echo $total_price;
}


//get user order details
function get_user_order_details(){
    global $con;
    $username= $_SESSION['Username'];
    $get_details="select * from user_table where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
            if(!isset($_GET['delete_account'])){
                $get_orders="select * from user_orders where user_id=$user_id and order_status='pending'";
                $result_orders_query=mysqli_query($con,$get_orders);
                $row_count=mysqli_num_rows($result_orders_query);
                if($row_count>0){
                    echo"<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                    <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";

                }else{
                    echo"<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
                    <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                }
            }

        }

    }

}
}
?>