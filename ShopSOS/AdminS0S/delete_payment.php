<?php
    include('../includes/connect.php');
    if(isset($_GET['delete_payment'])){
        $payment_id=$_GET['delete_payment'];

        $delete_payment="Delete from `user_payments` where payment_id=$payment_id";
        $result_payment=mysqli_query($con,$delete_payment);
        if($result_payment){
            echo "<script>alert('Xóa đơn hàng thanh toán thành công')</script>";
            echo "<script>window.open('list_payments.php','_self')</script>";
        }
    }
?>