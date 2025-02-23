<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart Details</title>
  <!--bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--css file-->
  <link rel="stylesheet" href="style.css">
  <style>
    footer {
    background-color:gold;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: relative;
    bottom: -20px;
    width: 100%;
  }
  </style>

</head>
<body>
  <!--header-->
<div class="header" style="background-color:#ffffcc;  text-align:center">
<h3>Craftaholic Customised Gifts</h3>
</div>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#996633;">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="logo" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Categories</a>
        </li>

        <?php
         if(isset($_SESSION['Username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users/profile.php'>My Account</a>
        </li>";
         }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users/user_registration.php'>Register</a>
        </li>";
         }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="refund.html">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
            <?php
            cart_item();
            ?>
          </sup></a>
        </li>

</ul>
    </div>
  </div>
</nav>
<!--callin cart function-->
<?php
cart();
?>
<!--second child-->
<nav class="navbar navbar-expand-lg navbar-secondary" style="background-color:#CCCC00;">
  <ul class="navbar-nav me-auto">
        <?php
        //displaying login and logout
        if(!isset($_SESSION['Username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome guest</a>
        </li>";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['Username']."</a>
        </li>";
        }

        //displaying login and logout
        if(!isset($_SESSION['Username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='./user_login.php'>Login</a>
        </li>";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
        }
        ?>
</ul>
</nav>
<!--third child-->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center" style="margin-top: 20px;">
           
               <!--php code to display dynamic data-->
               <?php
                    
                     $get_ip_add=getIPAddress();
                     $total_price=0;
                     $cart_query="select * from cart_details where ip_address='$get_ip_add'";
                     $result=mysqli_query($con,$cart_query);
                     $result_count=mysqli_num_rows($result);
                     if ($result_count>0){
                      echo "
                      <thead>
                      <tr>
                          <th>Product Title</th>
                          <th>Product Image</th>
                          <th>Quantity</th>
                          <th>Total price </th>
                          <th>Remove</th>
                          <th colspan='2'>Operations</th>
                      </tr>
                  </thead>
                  <tbody>";
                     while($row=mysqli_fetch_array($result)){
                         $product_id=$row['product_id'];
                         $select_products="select * from products where product_id='$product_id'";
                         $result_products=mysqli_query($con,$select_products);
                         while($row_product_price=mysqli_fetch_array($result_products)){
                         $product_price=array($row_product_price['product_price']);
                         $price_table=$row_product_price['product_price'];
                         $product_title=$row_product_price['product_title'];
                         $product_image1=$row_product_price['product_image1'];
                         $product_values=array_sum($product_price);
                         $total_price+=$product_values * $row['quantity'];
               ?>

                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt="" style="width: 110px; object-fit:contain;"></td>
                    <td><input type="text" name="qty[<?php echo $product_id;?>]" class="form-input w-50"></td>
                    <?php
                    $get_ip_add=getIPAddress();
                    if(isset($_POST['update_cart'])){
                     $quantities=$_POST['qty'];
                     foreach ($quantities as $product_id => $quantity) {
                      // Validate and sanitize input
                      $quantity = intval($quantity);
          
                      // Check if quantity is greater than zero before updating
                      if ($quantity > 0) {
                          // Update the quantity in the cart
          
                     $update_cart="update cart_details set quantity=$quantity where ip_address='$get_ip_add'and product_id='$product_id'";
                     $result_products_quantity=mysqli_query($con,$update_cart);
                    }
                  }
                }
                    ?>
                           
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                        <!--<button class="bg-info px-3 py-2 mx-3">Update</button>-->
                        <input type="submit" value="Update cart" class="bg-info px-3 py-2 mx-3" name="update_cart">
                        <!--<button class="bg-info px-3 py-2 mx-3">Remove</button>-->
                        <input type="submit" value="Remove cart" class="bg-info px-3 py-2 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php
                }
              }
            }
            else{
            echo"<h2 class='text-center text-danger'>Cart is empty</h2>";
            }
                ?>
            </tbody>
        </table>
        <!--subtotal-->
        <div class="d-flex mb-5">
          <?php
             $get_ip_add = getIPAddress();
             $cart_query="select * from cart_details where ip_address='$get_ip_add'";
             $result=mysqli_query($con,$cart_query);
             $result_count=mysqli_num_rows($result);
             if ($result_count>0){
              echo"<h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
              <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3' name='continue_shopping'>
              <button class='bg-secondary px-3 py-2 mx-3'><a href='./users/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
             }
             else{
              echo"<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3' name='continue_shopping'>";
             }
             if(isset($_POST['continue_shopping'])){
              echo "<script>window.open('index.php','_self')</script>";
             }
          ?>
        </div>
    </div>
</div>
</form>

<!-- function to remove item-->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart']) && isset($_POST['removeitem'])){
    $removeItems = $_POST['removeitem'];
    foreach($removeItems as $remove_id){
      echo $remove_id;
      $delete_query="delete from cart_details where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }

    }
  }

}
echo $remove_item=remove_cart_item();
?>


<!--last child-->
<footer>
    <div class="copyright" >
    <ul>
    <li><a href="terms.html">Terms of Service</a></li>
            <li><a href="refund.html">Refund Policy</a></li>
        </ul>
    <p>&copy; 2023 Craftaholic Customised Gifts</p>
</div>
</footer>


    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>