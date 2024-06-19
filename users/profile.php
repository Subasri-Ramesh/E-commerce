<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome <?php echo $_SESSION['Username']?></title>
  <!--bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--css file-->
  <link rel="stylesheet" href="../style.css">
  <style>
        body {
      overflow-x: hidden;
    }

    .profile_img{
    width:60%;
    height:60%;
    object-fit:contain;
   }
.edit_image{
  width:100px;
  height:100px;
  object-fit:contain;
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
    <img src="../images/logo.png" alt="log" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Categories</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../refund.html">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
            <?php
            cart_item();
            ?>
          </sup></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php
          total_cart_price();
          ?>/-</a>
        </li>
</ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-warning" name="search_data_product">
      </form>
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
       //displaying welcome guest
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
          <a class='nav-link' href='user_login.php'>Login</a>
        </li>";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users/logout.php'>Logout</a>
        </li>";
        }
        ?>
</ul>
</nav>

<!--third child-->
<div class="row">
  <div class="col-md-2  pt-5">
    <ul class="navbar-nav text-center " style="background-color:#996633;">
    <li class="nav-item bg-secondary" >
          <a class="nav-link text-light" href="profile.php"><h4>Your profile</h4></a>
        </li>

        <?php
        $username= $_SESSION['Username'];
        $user_image="select * from user_table where username='$username'";
        $user_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($user_image);
        $user_image=$row_image['user_image'];
        echo"  <li class='nav-item'  style='background-color:#996633;'>
        <img src='./user_images/$user_image' class='profile_img my-4'alt=''>
      </li>";
      ?>


    <li class="nav-item"  style="background-color:#996633;">
          <a class="nav-link text-light" href="profile.php">Pending Orders</a>
        </li>
    <li class="nav-item"  style="background-color:#996633;">
          <a class="nav-link text-light" href="profile.php? edit_account">Edit Account</a>
        </li>
    <li class="nav-item"  style="background-color:#996633;">
          <a class="nav-link text-light" href="profile.php? my_orders">My Orders</a>
        </li>
    <li class="nav-item"  style="background-color:#996633;">
          <a class="nav-link text-light" href="deliver_details.php">Delivery Details</a>
        </li>
    <li class="nav-item"  style="background-color:#996633;">
          <a class="nav-link text-light" href="deliver_orders_details.php">Deliver form</a>
        </li>
    <li class="nav-item"  style="background-color:#996633;">
          <a class="nav-link text-light" href="profile.php? delete_account">Delete Account</a>
        </li>
    <li class="nav-item mb-4"  style="background-color:#996633;">
          <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
    </ul>

  </div>
  <div class="col-md-10 text-center">
  <?php
    get_user_order_details();
    if(isset($_GET['edit_account'])){
      include('edit_account.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders.php');
    }
    if(isset($_GET['delete_account'])){
      include('delete_account.php');
    }
    
  ?>
</div>

<!--last child-->
<footer>
    <div class="copyright" >
    <ul>
            <li><a href="../terms.html">Terms of Service</a></li>
            <li><a href="../refund.html">Refund Policy</a></li>
        </ul>
    <p>&copy; 2023 Craftaholic Customised Gifts</p>
</div>
</footer>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>