<h3 class="text-center text-light">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_payments="select * from user_payments";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);
        
    if($row_count==0){
        echo"<h2 class='text-danger text-center mt-5'>No Payments Yet</h2>";
    }
    else{
        echo "<tr class='text-center'>
        <th>Sl No</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Order Date</th>
        <th>Delete</th>
        </tr>
        </thead>
    <tbody class='bg-secondary text-light'>"; 
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $Payment_id=$row_data['payment_id'];
            $invoice_number=$row_data['invoice_number'];
            $amount=$row_data['amount'];
            $Payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            $number++;
            ?>
            <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $amount; ?></td>
            <td><?php echo $Payment_mode;?></td>
            <td><?php echo $date; ?></td>
            <td ><a href='index.php?delete_payments=<?php echo $order_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td></td>
            </tr>
            <?php
        }

    }
?>
     </tbody>
</table>