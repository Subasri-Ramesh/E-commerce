<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Delivery Orders</title>
    <style>
        /* Your existing styles... */

        /* Styles for the product image */
        .product_img {
            max-width: 100px; /* Set a maximum width for the image */
            height: auto; /* Maintain the aspect ratio */
        }
    </style>
</head>
<body>
  <h3 class="text-center text-light">User Delivery Orders Details</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_details="select * from delivery_details";
        $result=mysqli_query($con,$get_details);
        $row_count=mysqli_num_rows($result);
        
    if($row_count==0){
        echo"<h2 class='text-danger text-center mt-5'>No details available</h2>";
    }
    else{
        echo "<tr class='text-center'>
        <th>Sl No</th>
        <th>Order Id</th>
        <th>Username</th>
        <th>Invoice Number</th>
        <th>Image</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Delete</th>
        </tr>
        </thead>
    <tbody class='bg-secondary text-light'>"; 
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $username=$row_data['username'];
            $invoice_number=$row_data['invoice_number'];
            $image=$row_data['image'];
            $address=$row_data['address'];
            $contact=$row_data['contact'];
            $number++;
            ?>
            <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $order_id;?></td>
            <td><?php echo $username;?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo "<img src='../users/order_images/$image' alt='$invoice_number' class='product_img'/>;"?></td>
            <td><?php echo $address;?></td>
            <td><?php echo $contact; ?></td>
            <td ><a href='index.php?delete_delivery_orders=<?php echo $order_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
        }

    }
?>
     
       
    </tbody>

</table>
</body>
</html>