<?php
    include('../includes/connect.php');
    if(isset($_GET['delete_user'])){
        $delete_id=$_GET['delete_user'];

        $delete_user="Delete from `user_table` where user_id=$delete_id";
        $result_user=mysqli_query($con,$delete_user);
        if($result_user){
            echo "<script>alert('Xóa khách hàng thành công')</script>";
            echo "<script>window.open('list_users.php','_self')</script>";
        }
    }
?>