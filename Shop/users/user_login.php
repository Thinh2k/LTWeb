<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Store - Đăng nhập</title>
    <!--bosstrap CSS--->
    <link   href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
            crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Đăng nhập</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!--- user name --->
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">Tên đăng nhập</label>
                        <input type="text" id="user_username" class="form-control"
                        placeholder="Nhập tên đăng nhập" autocomplete="off" 
                        required="required" name="user_username"/>
                    </div>
                    <!--- password --->
                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">Mật khẩu</label>
                        <input type="password" id="user_password" class="form-control"
                        placeholder="Nhập mật khẩu" autocomplete="off" 
                        required="required" name="user_password"/>
                    
                    <div class="mt-3 pt-2">
                        <input type="submit" value="Đăng nhập" 
                        class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản ? 
                            <a href="user_registration.php">Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
    if(isset($_POST['user_login'])){
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];

        $select_query="Select * from `user_table` where user_name='$user_username'";
        $result=mysqli_query($con, $select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $user_ip=getIPAddress();    


        $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
        $select_cart=mysqli_query($con,$select_query_cart);
        $row_count_cart=mysqli_num_rows($select_cart);
        if($row_count>0){
            $_SESSION['username']=$user_username;
            if(password_verify($user_password,$row_data['user_password'])){
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Đăng nhập thành công')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Đăng nhập thành công')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Tài khoản hoặc mật khẩu sai, vui lòng nhập lại !!!')</script>";
            }

        }else{
            echo "<script>alert('Tài khoản hoặc mật khẩu sai, vui lòng nhập lại !!!')</script>";
        }
    }
?>