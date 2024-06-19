<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <!--bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--css file-->
  <link rel="stylesheet" href="../style.css">
  <style>
    .pay_img{
      width:90%;
      margin:auto;
      display:block;
    }
    body{
      overflow-x: hidden;
    }


  </style>
</head>
<body>
  <!--php code to access user id-->
  <?php
  $user_ip=getIPAddress();
  $get_user="select * from user_table where user_ip='$user_ip'";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
  $user_id=$run_query['user_id'];


  ?>
    <div class="container">
      <h2 class="text-center text-primary">Payment option</h2>
      <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
        <a href="https://www.paypal.com" target="blank"><img src="../images/upi.jpg" alt="" class="pay_img">
        <h2 class="text-center">UPI</h2></a>
        </div>
        <div class="col-md-6">
        <a href="order.php?user_id=<?php echo $user_id ?>"><img src="../images/order.jpg" alt="" class="pay_img">
        <h2 class="text-center">Order details</h2></a>
        </div>
      </div>

    </div>
</body>
</html>  