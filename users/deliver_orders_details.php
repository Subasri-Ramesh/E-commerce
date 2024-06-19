<?php include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delivery Details</title>
  <!--bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid m-3"> 
        <h2 class="text-center">Delivery details</h2>
        <div class="row d-flex align-items-center justify-content-center">
          <div class="col- lg-12 col-xl-6"> 
            <form action="" method="post" enctype="multipart/form-data">
                <!--username field-->
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control"  
                     autocomplete="off" required="required" name="username"/>
                </div>

                <!--invoice field-->
                <div class="form-outline mb-4">
                    <label for="invoice_number" class="form-label">Invoice_number</label>
                    <input type="text" id="invoice_number" class="form-control"  
                    autocomplete="off" required="required" name="invoice_number"/>
                </div>
                

                <!--image field-->
                <div class="form-outline mb-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" class="form-control" placeholder="Upload the image" 
                    required="required" name="image"/>
                </div>
                
                
                <!--address field-->
                <div class="form-outline mb-4">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" id="address" class="form-control" placeholder="Enter your address" 
                    autocomplete="off" required="required" name="address"/>
                </div>
                <!--contact field-->
                <div class="form-outline mb-4">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" id="contact" class="form-control" placeholder="Enter your mobile number" 
                    autocomplete="off" required="required" name="contact"/>
                </div>
                <input type="submit" value="register" class="bg-info py-2 px-3 border-0" name="delivery_details">
            </form>
     </div> 
    </div>
</body>
</html>

<!--php code-->
<?php
if(isset($_POST['delivery_details'])){
    $username=$_POST['username'];
    $invoice_number=$_POST['invoice_number'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $image=$_FILES['image']['name'];
    $image_temp=$_FILES['image']['tmp_name'];

    //select query

$select_query="select * from delivery_details where invoice_number='$invoice_number'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo"<script>alert('details already submitted')</script>";
    echo"<script>window.open('profile.php')</script>";
}
else{
    //insert query
    move_uploaded_file($image_temp,"./order_images/$image");
    $insert_query="insert into delivery_details (username,invoice_number, image, address, contact) 
    values('$username','$invoice_number','$image','$address','$contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo"<script>alert('Details recorded successfully')</script>";
    echo"<script>window.open('profile.php')</script>";
}

}
?>
