<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Store - Đăng ký</title>
    <!--bosstrap CSS--->
    <link   href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
            crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Đăng ký tài khoản</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="mulitipart/form-data">
                    <!--- user name --->
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">Tên đăng ký</label>
                        <input type="text" id="user_username" class="form-control"
                        placeholder="Nhập tên đăng ký" autocomplete="off" 
                        required="required" name="user_username"/>
                    </div>
                    <!--- email --->
                    <div class="form-outline mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control"
                        placeholder="Nhập email" autocomplete="off" 
                        required="required" name="user_email"/>
                    </div>
                    <!--- password --->
                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">Mật khẩu</label>
                        <input type="password" id="user_password" class="form-control"
                        placeholder="Nhập mật khẩu" autocomplete="off" 
                        required="required" name="user_password"/>
                    </div>
                    <!--- confirm password --->
                    <div class="form-outline mb-3">
                        <label for="conf_user_password" class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" id="conf_user_password" class="form-control"
                        placeholder="Nhập lại mật khẩu" autocomplete="off" 
                        required="required" name="conf_user_password"/>
                    </div>
                    <!--- address --->
                    <div class="form-outline mb-3">
                        <label for="user_address" class="form-label">Địa chỉ</label>
                        <input type="text" id="user_address" class="form-control"
                        placeholder="Nhập địa chỉ" autocomplete="off" 
                        required="required" name="user_address"/>
                    </div>
                    <!--- mobile --->
                    <div class="form-outline mb-3">
                        <label for="user_contact" class="form-label">Số điện thoại</label>
                        <input type="text" id="user_contact" class="form-control"
                        placeholder="Nhập số điện thoại" autocomplete="off" 
                        required="required" name="user_contact"/>
                    </div>
                    <div class="mt-3 pt-2">
                        <input type="submit" value="Đăng ký" 
                        class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản ? 
                            <a href="user_login.php">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_ip=getIPAddress();


        $select_query="Select * from `user_table` where user_name='$user_username' or
        user_email='$user_email'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('Tên đăng ký hoặc email đã có, vui lòng đăng ký lại !!!')</script>";
        }else if($user_password!=$conf_user_password){
            echo "<script>alert('Mật khẩu nhập lại không trùng khớp !!!')</script>";
        }
        
        else{
            $insert_query="insert into `user_table` (user_name,user_email,
            user_password,user_ip,user_address,user_mobile) 
            values ('$user_username', '$user_email', '$hash_password',
            '$user_ip', '$user_address', '$user_contact')";
            $sql_execute=mysqli_query($con, $insert_query);
        }


        $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_items);
        $rows_count=mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('Sản phẩm đã có trong giỏ hàng')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>