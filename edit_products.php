<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <!-- Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Font Awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom CSS file -->
  <link rel="stylesheet" href="../style.css">
  <style>

    .product_img {
      max-width: 100px;
      max-height: 100px;
      margin-left: 10px;
    }
    .container {
      margin-top: 5rem;
    }
    label {
      color: white; /* Blue color for labels */
    }

    h1 {
      text-align: center;
      margin-bottom: 3rem;
    }

    
    .product_img {
      max-width: 100px;
      max-height: 100px;
      margin-left: 10px;
    }

    .btn-info {
      background-color: #007bff; /* Blue color for submit button */
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }

    .btn-info:hover {
      background-color: #0056b3; /* Darker blue color on hover */
    }
   
  </style>
</head>

<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo  $edit_id;
    $get_data="select * from products where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    //echo $product_title;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $hamper_id=$row['hamper_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_price=$row['product_price'];
    

    //fetching  category name
    $select_category="select * from categories where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];


     //fetching  category name
     $select_hamper="select * from hampers where hamper_id=$hamper_id";
     $result_hamper=mysqli_query($con,$select_hamper);
     $row_hamper=mysqli_fetch_assoc($result_hamper);
     $hamper_title=$row_hamper['hamper_title'];
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" value="<?php echo $product_description?>" name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords?>" name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_Category" class="form-label">Product Category</label>
           <select name="product_category" class="form-select">
            <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
            <?php
             $select_category_all="select * from categories";
             $result_category_all=mysqli_query($con,$select_category_all);
             while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                $category_title=$row_category_all['category_title'];
                $category_id=$row_category_all['category_id'];
                echo"<option value='$category_id'>$category_title</option>";
             }

            ?>
           </select>
        </div>

        
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_hampers" class="form-label">Product Hampers</label>
           <select name="product_hampers" class="form-select">
            <option value="<?php echo $hamper_title?>"><?php echo $hamper_title?></option>
            <?php
             $select_hamper_all="select * from hampers";
             $result_hamper_all=mysqli_query($con,$select_hamper_all);
             while($row_hamper_all=mysqli_fetch_assoc($result_hamper_all)){
                $hamper_title=$row_hamper_all['hamper_title'];
                $hamper_id=$row_hamper_all['hamper_id'];
                echo"<option value='$hamper_id'>$hamper_title</option>";
             }
            ?>
           </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo $product_price?>" name="product_price" class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="update product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>


<!--editing products-->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_hampers=$_POST['product_hampers'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];


    //checking for fields empty or not
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or
    $product_hampers=='' or $product_image1=='' or $product_image2=='' or $product_price==''){
        echo"<script> alert('please fill all the fields and continue the process')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");

        //query to update products
        $update_product="update products set product_title='$product_title', product_description='$product_description', 
        product_keywords='$product_keywords',category_id='$product_category', hamper_id='$product_hampers',
        product_image1='$product_image1', product_image2='$product_image2', product_price='$product_price', date=NOW()
        where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo"<script>alert('product updated successfully')</script>";
            echo"<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
}



?>