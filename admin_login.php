<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin.jpg" alt="admin" class="img-fluid">
            </div>
            <div class="col-lg-6 ">
               <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name"  class="form-label">Username</label>
                    <input type="text" id="admin_name" name="admin_name" placeholder="Enter your username" 
                    required="required" autocomplete="off" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password"  class="form-label">Password</label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" 
                    required="required" class="form-control">
                </div>
            
                <div>
                    <input type="submit" class="bg-info py-2 px-3" name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="text-danger"> Register</a></p>
                </div>
               </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php
if (isset($_POST['admin_login'])){
  //query for selecting username from user_table
  $admin_name=$_POST['admin_name'];
  $admin_password=$_POST['admin_password'];
  $select_query="select * from admin_table where admin_name='$admin_name'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);

  if($row_count>0){
    $_SESSION['admin_name']=$admin_name;
    if(password_verify($admin_password,$row_data['admin_password'])){
      //echo"<script>alert('Login Successfull')</script>";
      if($row_count==1 and $row_count_cart==0){
        $_SESSION['admin_name']=$admin_name;
        echo"<script>alert('Login Successfull')</script>";
        echo"<script>window.open('index.php','_self')</script>";
      }else{
        echo"<script>alert('invalid credentials (password)')</script>";
    }
  }else{
    echo"<script>alert('invalid credentials')</script>";
  }
}
}


?>