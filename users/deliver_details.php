<?php
include('../includes/connect.php');

// Check if form is submitted
if(isset($_POST['delivery_details'])){
    $username = $_POST['username'];
    $invoice_number = $_POST['invoice_number'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
}

// Fetch all delivery details
$get_delivery_details = "SELECT * FROM delivery_details";
$result_delivery_details = mysqli_query($con, $get_delivery_details);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid m-3"> 
        <h2 class="text-center text-success">Delivery Details</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-10"> 
                <!-- Your form code goes here -->

                <table class="table table-bordered mt-5">
                    <thead class="bg-info">
                        <tr class="text-center">
                            <th>Username</th>
                            <th>Invoice Number</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody class="bg-secondary text-light">
                        <?php
                        // Display records in the table
                        while ($row = mysqli_fetch_assoc($result_delivery_details)) {
                            echo "<tr class='text-center'>
                                    <td>{$row['username']}</td>
                                    <td>{$row['invoice_number']}</td>
                                    <td><img src='./order_images/{$row['image']}' alt='Image' style='max-width: 100px; max-height: 100px;'></td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['contact']}</td>
                                   </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</body>
</html>
