<?php
    include('../includes/connect.php');
    if(isset($_GET['delete_order'])){
        $delete_id=$_GET['delete_order'];

        $delete_order="Delete from `user_orders` where order_id=$delete_id";
        $result_order=mysqli_query($con,$delete_order);
        if($result_order){
            echo "<script>alert('Xóa đơn hàng thành công')</script>";
            echo "<script>window.open('list_orders.php','_self')</script>";
        }
    }
?>