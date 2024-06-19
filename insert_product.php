<?php
include('../includes/connect.php');

// Set higher values for PHP settings
ini_set('post_max_size', '50M');
ini_set('upload_max_filesize', '50M');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_hamper = $_POST['product_hamper'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];

    // accessing images temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    // checking empty condition
    if ($product_title == '' || $product_description == '' || $product_keywords == '' || $product_category == '' || $product_hamper == ''
        || $product_price == '' || $product_image1 == '' || $product_image2 == '') {
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");

        // insert query
        $insert_products = "INSERT INTO products (product_title, product_description, product_keywords, category_id, hamper_id,
        product_image1, product_image2, product_price, date, status) VALUES ('$product_title', '$product_description', '$product_keywords', 
        '$product_category', '$product_hamper', '$product_image1', '$product_image2','$product_price', NOW(), '$product_status')";
        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INSERT PRODUCTS</title>
  <!--bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!--font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--css file-->
   <link rel="stylesheet" href="../style.css">
   <style>
    body {
      background-image: url('../l.jpeg'); /* Add your image path here */
      background-size: cover;
      background-position: center;
      font-family: 'Arial', sans-serif;
    }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title"
                autocomplete="off" required="required">
            </div>

            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description"
                autocomplete="off" required="required"> 
            </div>

             <!--keywords-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords"
                autocomplete="off" required="required"> 
             </div>

             <!--categories-->
             <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                <option value="">Select a category</option>
                <?php
                    $select_query="select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo"<option value='$category_id'>$category_title</option>";
                    }
                ?>
                </select>
            </div>

             <!--hampers-->
             <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_hamper" id="" class="form-select">
                <option value="">Select a hamper</option>
                <?php
                    $select_query="select * from hampers";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $hamper_title=$row['hamper_title'];
                        $hamper_id=$row['hamper_id'];
                        echo"<option value='$hamper_id'>$hamper_title</option>";
                    }
                ?>
                </select>
             </div>

              <!--Image 1-->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required"> 
             </div>

             <!--Image 2-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required"> 
             </div>

             <!--price-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product price"
                autocomplete="off" required="required"> 
             </div>

             <!--submit-->
             <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class=" btn btn-info mb-3 px-3" value="Insert Products">
             </div>



        </form>
    </div>


</body>
</html>