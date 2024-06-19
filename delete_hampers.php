<?php

if(isset($_GET['delete_hampers'])){
    $delete_hampers=$_GET['delete_hampers'];
    $delete_query="delete from hampers where hamper_id=$delete_hampers";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo"<script> alert('hamper has been deleted successfully')</script>";
        echo"<script> window.open('./index.php?view_hampers','_self')</script>";
    }
}
?>