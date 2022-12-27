<?php
   include('includes/connect.php');
   include('functions/common_function.php');
   session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Store - Giỏ hàng</title>
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
    <!---css--->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
    
</head>
<body>
    <!--- nav bar --->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active btn" aria-current="page" href="index.php">Trang chủ</a>
        </li>
        <div class="btn-group">
          <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Hãng giày
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item"></a>
            <?php
              getcategories();
            ?>
            </li>
          </ul>
        </div>
        <?php
          if(isset($_SESSION['username'])){
           echo " <li class='nav-item'>
                    <a class='nav-link' href='./users/profile.php'>Tài khoản</a>
                  </li>";
          }else{
            echo " <li class='nav-item'>
                    <a class='nav-link' href='./users/user_registration.php'>Đăng ký tài khoản</a>
                  </li>";
          }
        ?>
        <li class="nav-item">
          <a class="nav-link rounded-pill bg-success" href="display_all.php">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Giỏ hàng <i class="fa-solid fa-cart-shopping"></i>
          <sup><?php cart_item();?></sup></a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Nhập sản phẩm cần tìm" 
        aria-label="Search" name="search_data">
        <input type="submit" value="Tìm" class="btn btn-outline-dark" name="search_data_product">
      </form>
    </div> 
  </div>
</nav>

  <!---  --->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
        <ul class="navbar-nav me-auto">
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Chào mừng khách hàng</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Chào mừng : ".$_SESSION['username']."</a>
          </li>";
          }
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users/user_login.php'>Login</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users/logout.php'>Logout</a>
          </li>";
          }
        ?>
        </ul>
    </nav>

  <!--<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="4000">
        <img src="./images/bia1.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
    </div>  
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> -->
  
  <!--- --->
    <div class="bg-light">
      <h2 class="text-center">SOS Store</h3>
      <p class="text-center">Nơi hiện diện các loại giày phổ biến tại Việt Nam</p>
    </div>

    <!-- -->

    <div class="container">
        <div class="row">
          <form action="" method="post">
            <table class="table table-bordered text-center">
                <tbody>
                  <?php
                    
                    $get_ip_add = getIPAddress();
                    $total_price=0;
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                      echo "
                      <thead>
                      <tr>
                          <th>Tên sản phẩm</th>
                          <th>Ảnh sản phẩm</th>
                          <th>Số lượng</th>
                          <th>Giá sản phẩm</th>
                          <th>Xóa sản phẩm</th>
                          <th colspan='2'>Tùy chọn</th>
                      </tr>
                      </thead>";

                    while($row=mysqli_fetch_array($result)){
                      $product_id=$row['product_id'];
                      $select_products="Select * from `products` where product_id='$product_id'";
                      $result_products=mysqli_query($con,$select_products);
                      while($row_product_price=mysqli_fetch_array($result_products)){
                        $product_price=array($row_product_price['product_price']);
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image=$row_product_price['product_image'];
                        $product_values=array_sum($product_price);
                        $total_price+=$product_values;
                  ?>
                    <tr>
                        <td><?php echo $product_title ?></td>
                        <td><img src="./admin/product_images/<?php echo $product_image?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>
                        <?php 
                          $get_ip_add =getIPAddress(); 
                          if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                            $result_products_quantity=mysqli_query($con,$update_cart);
                            $total_price=$total_price*$quantities;
                          }
                        ?>
                        <td><?php echo $price_table?>đ</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                            <input type="submit" value="Cập nhật" class="bg-info px-3 py-2 border-0 mx-3"
                            name="update_cart">
                            <input type="submit" value="Xóa" class="bg-info px-3 py-2 border-0 mx-3"
                            name="remove_cart">
                            
                        </td>
                    </tr>
                    <?php }
                    }}
                    else{
                      echo "<h3 class='text-center text-danger'>Giỏ hàng đang trống</h3>";
                    }
                    
                    ?>
                </tbody>
            </table>
            <div class="d-flex mb-5 mt-3">
              <?php
                $get_ip_add = getIPAddress();
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                  echo "
                  <h3 class='px-3'>Tổng tiền: <strong class='text-info'>$total_price đ</strong></h3>
                  <input type='submit' value='Thêm sản phẩm' class='bg-info px-3 py-2 border-0 mx-3'
                  name='continue_shopping'>
                  <button class='bg-secondary px-3 py-2 border-0'><a href='./users/checkout.php' 
                  class='text-light text-decoration-none'>Thanh toán</a></button>";
                }else{
                  echo "<input type='submit' value='Thêm sản phẩm' class='bg-info px-3 py-2 border-0 mx-3'
                  name='continue_shopping'>";
                }
                if(isset($_POST['continue_shopping'])){
                  echo"<script>window.open('index.php','_self')</script>";
                }
              ?>
            </div>
        </div>
    </div>
    </form>

    <?php
      function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
          foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
      }
      echo $remove_item=remove_cart_item();
    ?>

    <!-- -->
    <?php include("./footer.php")?>



    <!-- Bosstrap js--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
            crossorigin="anonymous"></script>

</body>
</html>