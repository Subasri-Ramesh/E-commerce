<?php

if(isset($_GET['delete_delivery_orders'])){
    $delete_id=$_GET['delete_delivery_orders'];
    $delete_orders="delete from delivery_details where order_id=$delete_id";
    $result_order=mysqli_query($con,$delete_orders);
    if($result_order){
        echo"<script> alert('order detail for delivery has been deleted successfully')</script>";
        echo"<script> window.open('./index.php?user_delivery_details','_self')</script>";
    }
}
?>