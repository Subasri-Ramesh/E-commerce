<?php
if(isset($_GET['edit_hampers'])){
    $edit_hampers=$_GET['edit_hampers'];
    $get_hampers="select * from hampers where hamper_id=$edit_hampers";
    $result=mysqli_query($con,$get_hampers);
    $row=mysqli_fetch_assoc($result);
    $hamper_title=$row['hamper_title'];

    
}
if(isset($_POST['edit_ham'])){
    $ham_title=$_POST['hamper_title'];
    $update_query="update hampers set hamper_title='$ham_title' where hamper_id=$edit_hampers";
    $result_ham=mysqli_query($con,$update_query);
    if($result_ham){
        echo"<script>alert('hampers has been updated successfully')</script> ";
        echo"<script>window.open('./index.php?view_hampers','_self')</script> ";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit hamper</h1>
    <form action="" method= "post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="hamper_title" class="form-label">hamper Title</label>
            <input type="text" name="hamper_title" id="hamper_title" class="form-control" required="required"
            value='<?php echo $hamper_title; ?>'>
        </div>
        <input type="submit" value="Update hamper" class="btn btn-info px-3 mb-3" name="edit_ham">
    </form>
</div>