<!--connect file-->
<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
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
    <img src="../images/logo.png" alt="logo" class="logo">
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

        <?php
         if(isset($_SESSION['Username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='profile.php'>My Account</a>
        </li>";
         }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='user_registration.php'>Register</a>
        </li>";
         }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="../refund.html">Contact</a>
        </li>
</ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-warning" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

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
<div class="row px-3">
    <div class="col-md-12">
        <!--products-->
          <div class="row">   
            <?php 
            if(!isset($_SESSION['Username'])){
                include('user_login.php');
            }
            else{
                include('payment.php');
            }
            ?>
</div> 
<!--col end-->
</div>
</div>           

<!--last child-->
<!--include footer-->
<?php include("../includes/footer.php");?>
</div>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>