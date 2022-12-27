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
    <title>SOS Store - Xem chi tiết</title>
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
        body{
            overflow-x: hidden;
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
        <li class="nav-item"> 
          <a class="nav-link" href="#">Hóa đơn giỏ hàng: <?php total_cart_price();?>đ</a>
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

<?php
  cart();
?>

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
  
  <!--- --->
    <div class="bg-light">
      <h2 class="text-center">SOS Store</h3>
      <p class="text-center">Nơi hiện diện các loại giày phổ biến tại Việt Nam</p>
    </div>

  <!-- -->
    <div class="row">
      <div class="col-md-1 p-0">
        <!---->
      </div>
      <div class="col-md-10">
        <div class="row">   
          <?php
            view_details();
            get_unique_categories();
          ?>
        </div>
      </div>
    </div>


    <?php include("./footer.php")?>




    <!-- Bosstrap js--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
            crossorigin="anonymous"></script>

</body>
</html>