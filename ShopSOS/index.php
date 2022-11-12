<?php
   include('includes/connect.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Giay SOS</title>
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
          <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Giỏ hàng <i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder=" " aria-label=" ">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  <!---  --->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
        <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
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
      <h3 class="text-center">SOS Store</h3>
      <p class="text-center">Nơi hiện diện các loại giày phổ biến tại Việt Nam</p>
    </div>

  <!-- -->
    <div class="row">
      <div class="col-md-3 bg-secondary p-0">
        <!---->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light bg-primary bg-gradient"><h4>Danh mục giày thịnh hành</h4></a>
          </li>

          <?php
            $select_categories="Select * from `categories`";
            $result_categories=mysqli_query($con,$select_categories);

            while($row_data=mysqli_fetch_assoc($result_categories)){
              $category_title=$row_data['category_title'];
              $category_id=$row_data['category_id'];
              echo  " <li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
              </li>";
            }
          ?>
        </ul>
      </div>

      <div class="col-md-9">
        <div class="row">
          <div class="col-md-4 mb-2">
          <div class="card">
            <img src="./images/adidas1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Xem sản phẩm</a>
              <a href="#" class="btn btn-info">Thêm giỏ hàng</a>
            </div>
          </div>
          </div>
          <div class="col-md-4 mb-2">
          <div class="card">
            <img src="./images/puma1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Xem sản phẩm</a>
              <a href="#" class="btn btn-info">Thêm giỏ hàng</a>
            </div>
          </div>
          </div>
          <div class="col-md-4 mb-2">
          <div class="card">
            <img src="./images/nunike1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Xem sản phẩm</a>
              <a href="#" class="btn btn-info">Thêm giỏ hàng</a>
            </div>
          </div>
          </div>
          <div class="col-md-4 mb-2">
          <div class="card">
            <img src="./images/nunike1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Xem sản phẩm</a>
              <a href="#" class="btn btn-info">Thêm giỏ hàng</a>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>




    <div class="bg-info p-2 text-center">
      <p>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi</p>
    </div>

    </div>



    <!-- Bosstrap js--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
            crossorigin="anonymous"></script>

</body>
</html>