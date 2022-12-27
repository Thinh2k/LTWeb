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
    <title>Admin - Đăng nhập</title>
    <!--bosstrap CSS--->
    <link   href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
            crossorigin="anonymous">
    <!---font awesome-->
    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
        }
        .img-fluid{
            width: 60%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center text-info mb-5">Admin Đăng nhập</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-xl-5">
                <img src="../admin/product_images/imager_2_57_700.jpg" alt="Admin Login" class="img-fluid">
            </div>
            <div class="col-lg-4 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <div class="form-outline mb-4">
                            <label for="admin_name" class="form-label mb-3">Tên đăng nhập</label>
                            <input type="text" id="admin_name" name="admin_name" 
                            placeholder="Nhập tên đăng nhập" required="required" class="form-control">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="admin_password" class="form-label mb-3">Mật khẩu</label>
                            <input type="text" id="admin_password" name="admin_password" autocomplete="off"
                            placeholder="Nhập mật khẩu đăng nhập" required="required" class="form-control">
                        </div>
                        <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" 
                        name="admin_login" value="Đăng nhập">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['admin_login'])){
        $admin_name=$_POST['admin_name'];
        $admin_password=$_POST['admin_password'];

        $select_query="Select * from `admin_table` where admin_name='$admin_name' and admin_password='$admin_password'";
        $result=mysqli_query($con, $select_query);
        $row_count=mysqli_num_rows($result);
        if($row_count >0){
            echo "<script>alert('Đăng nhập thành công')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            echo "<script>alert('Tài khoản hoặc mật khẩu sai, vui lòng nhập lại !!!')</script>";
        }
    }
?>