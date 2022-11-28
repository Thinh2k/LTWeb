<?php
    include('../includes/connect.php');
    if(isset($_GET['delete_category'])){
        $delete_id=$_GET['delete_category'];

        $delete_category="Delete from `categories` where category_id=$delete_id";
        $result_category=mysqli_query($con,$delete_category);
        if($result_category){
            echo "<script>alert('Xóa danh mục sản phẩm thành công')</script>";
            echo "<script>window.open('categories.php','_self')</script>";
        }
    }
?>