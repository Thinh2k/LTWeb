
    <h3 class="text-danger mb-4">Xóa tài khoản</h3>
    <form action="" method="post" class="mt-4">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" 
            name="delete" value="Click vào đây nếu muốn xóa tài khoản của bạn">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" 
            name="dont_delete" value="Tiếp tục sử dụng tài khoản">
        </div>
    </form>
    <?php
        $username_session=$_SESSION['username'];
        if(isset($_POST['delete'])){
            $delete_query="Delete from `user_table` where user_name='$username_session'";
            $result=mysqli_query($con,$delete_query);
            if($result){
                session_destroy();
                echo "<script>alert('Đã xóa tài khoản thành công')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
        if(isset($_POST['dont_delete'])){
            echo "<script>window.open('profile.php','_self')</script>";
        }
    ?>