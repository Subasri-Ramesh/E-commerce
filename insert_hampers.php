<?php
include('../includes/connect.php');
if(isset($_POST['insert_ham'])){
  $hamper_title=$_POST['hamper_title'];

  //select data from database
  $select_query="select * from hampers where hamper_title='$hamper_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This hamper is already presented in the database')</script>";
  }else{

  $insert_query="insert into hampers (hamper_title) values('$hamper_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('hamper has been inserted successfully')</script>";
  }
 }
}
?>

<h2 class="text-center">Insert Hampers</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="hamper_title" placeholder="Insert Hampers"
  aria-label="hampers" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">
  <input type="Submit" class="form-control bg-info" name="insert_ham" value="Insert Hampers">
</div>
</form>