<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['cat_title'];

        $select_query="Select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($con, $select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('Thêm không thành công!!! Loại giày này đã có!')</script>";
        }else{

        $insert_query="insert into `categories` (category_title) values('$category_title')";
        $result=mysqli_query($con, $insert_query);
        if($result){
            echo "<script>alert('Đã thêm loại giày thành công!')</script>";
        }
    }} 
?>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fas fa-fw fa-clipboard"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Nhập loại giày cần thêm" 
        aria-label="Categories" aria-describedby="basic-addon1" autocapitalize="off" required="required">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        
        <input type="submit" 
        class="btn btn-info mb-3 px-3 text-light" 
        name="insert_cat" value="Thêm vào" 
        aria-label="Categories" aria-describedby="basic-addon1">
    </div>
</form>