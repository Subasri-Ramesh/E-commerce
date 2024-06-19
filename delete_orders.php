<?php

if(isset($_GET['delete_orders'])){
    $delete_id=$_GET['delete_orders'];
    $delete_orders="delete from user_orders where order_id=$delete_id";
    $result_order=mysqli_query($con,$delete_orders);
    if($result_order){
        echo"<script> alert('order has been deleted successfully')</script>";
        echo"<script> window.open('./index.php?list_orders','_self')</script>";
    }
}
?>