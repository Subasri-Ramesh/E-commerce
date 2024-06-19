<?php

if(isset($_GET['delete_users'])){
    $delete_id=$_GET['delete_users'];
    $delete_users="delete from user_table where user_id=$delete_id";
    $result_users=mysqli_query($con,$delete_users);
    if($result_users){
        echo"<script> alert('User has been deleted successfully')</script>";
        echo"<script> window.open('./index.php?list_users','_self')</script>";
    }
}
?>