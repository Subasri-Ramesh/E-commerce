<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Users</title>
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
      margin-top: 10px;
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

    .fa-trash {
      color: #fff;
      margin: 0 5px;
      text-decoration: none;
    }

    .fa-trash:hover {
      color: #dc3545; /* Red color on hover */
    }
  </style>
</head>

<body>
    
<h3 class="text-center text-light">All Users</h3>
<table class="table table-bordered mt-3">
    <thead class="bg-info">
        <?php
        $get_user="select * from user_table";
        $result=mysqli_query($con,$get_user);
        $row_count=mysqli_num_rows($result);
        
    if($row_count==0){
        echo"<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
    }
    else{
        echo "<tr class='text-center'>
        <th>Sl No</th>
        <th>Username</th>
        <th>User Email</th>
        <th>User Image</th>
        <th>User Address</th>
        <th>User Mobile</th>
        <th>Delete</th>
        </tr>
        </thead>
    <tbody class='bg-secondary text-light'>"; 
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $number++;
            ?>
            <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo "<img src='../users/user_images/$user_image' alt='$username' class='product_img'/>;"?></td>
            <td><?php echo $user_address; ?></td>
            <td><?php echo $user_mobile; ?></td>
            <td ><a href='index.php?delete_users=<?php echo $user_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td></td>
            </tr>
            <?php
        }

    }
?>
     </tbody>
</table>
</body>
</html>