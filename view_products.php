<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Products</title>
  <!-- Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Font Awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      font-family: 'Arial', sans-serif;
    }

    h3 {
      margin-top: 20px;
      margin-bottom: 10px;
      text-align: center;
      
    }

    table {
      width: 100%;
      margin-top: 20px;
    }

    .bg-info {
      background-color: #007bff; /* Blue color for thead background */
      color: #fff;
    }

    .bg-secondary {
      background-color: #343a40; /* Dark gray color for tbody background */
      color: #fff;
    }

    .text-center {
      text-align: center;
    }

    .text-light {
      color: #fff;
    }

    .product_img {
      width: 50px; /* Adjust as needed */
      height: 50px; /* Adjust as needed */
      object-fit: cover;
    }

    .fa-pen-to-square,
    .fa-trash {
      color: #fff;
      margin: 0 5px;
      text-decoration: none;
    }

    .fa-pen-to-square:hover,
    .fa-trash:hover {
      color: #ffc107; /* Yellow color on hover */
    }
  </style>
</head>
<body>
<h3 class="text-center text-light">All Products</h3> 
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $get_products="select * from products";
    $result=mysqli_query($con,$get_products);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $status=$row['status'];
        $number++;
        ?>
        <tr class='text-center'>
        <td><?php echo $number; ?></td>
        <td><?php echo $product_title;?></td>
        <td><img src='./product_images/<?php echo $product_image1;?>' class='product_img'/></td>
        <td><?php echo $product_price; ?>/-</td>
        <td><?php
        $get_count="select * from orders_pending where product_id=$product_id";
        $result_count=mysqli_query($con,$get_count);
        $rows_count=mysqli_num_rows($result_count);
        echo $rows_count;
        ?>
        </td>
        <td><?php echo $status; ?></td>
        <td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_product=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>

        <?php
    }

    ?>
    </tbody>
</table>

</body>
</html>