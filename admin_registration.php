<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
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
                    <label for="admin_email"  class="form-label">Email</label>
                    <input type="email" id="admin_email" name="admin_email" placeholder="Enter your email" 
                    required="required" autocomplete="off" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password"  class="form-label">Password</label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" 
                    required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_password"  class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your confirm password" 
                    required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" id="contact" class="form-control" placeholder="Enter your mobile number" 
                    autocomplete="off" required="required" name="contact"/>
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3" name="admin_registration" value="Register">
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="text-danger"> Login</a></p>
                </div>
               </form>
            </div>
        </div>

    </div>
</body>
</html>

<!--php code-->
<?php
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $contact=$_POST['contact'];

    //select query

$select_query="select * from admin_table where admin_email='$admin_email' or contact='$contact'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo"<script>alert('Admin already exist')</script>";
}
//password doesnot match
else if($admin_password!=$confirm_password){
    echo"<script>alert('Passwords does not match')</script>";
}
else{
    //insert query
    $insert_query="insert into admin_table (admin_name, admin_email, admin_password, contact) 
    values('$admin_name','$admin_email','$hash_password','$contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo"<script>alert('Admin registered successfully')</script>";
}
}
?>