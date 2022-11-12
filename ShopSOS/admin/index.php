<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SOS Store</title>

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
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            
            width: 100px;
            object-fit: contain;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>

</header>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-gradient">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                 <h1 class="text-center p-2 text-dark">Trang quản trị</h1>
                <nav class="navbar navbar-expand-lg navbar-light text-info">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-dark">Chào mừng</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </nav>


      <div class="row mt-3 alert alert-warning">
        <div class="row">
            <div class="col-md-3 bg-primary p-0 border border-success p-2 mb-2">
                <ul class="navbar-nav me-auto">
                    
                    <button class="my-2">
                    <a class="nav-link text-dart" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Sản phẩm</span><i class="bi bi-chevron-down"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="index.php?insert_product">
                            <i class="nav-link text-dart mb-1"></i><span>Thêm sản phẩm</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="nav-link text-dart"></i><span>Danh sách sản phẩm</span>
                            </a>
                        </li>
                        </ul>
                    </button>
                    <button class="my-2">
                    <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Danh mục giày</span><i class="bi bi-chevron-down"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="index.php?insert_categories">
                            <i class="nav-link text-dart mb-1"></i><span>Thêm danh mục</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="nav-link text-dart"></i><span>Danh sách danh mục</span>
                            </a>
                        </li>
                        </ul>
                    </button>
                    <button class="my-2"><a href="" class="nav-link text-dart my-1">Xem sản phẩm</a></button>
                    <button class="my-2"><a href="index.php?insert_categories" class="nav-link text-dart my-1">Thêm danh mục giày</a></button>
                    <button class="my-2"><a href="" class="nav-link text-dart my-1">Xem danh mục giày</a></button>
                    <button class="my-2"><a href="" class="nav-link text-dart my-1">Orders</a></button>
                    <button class="my-2"><a href="" class="nav-link text-dart my-1">Danh sách user</a></button>
                    <button class="my-2"><a href="" class="nav-link text-dart my-1">Đăng xuất</a></button>
                </ul>   
            </div>
            <div class="col-md-9">
                <div class="container my-1">
                <?php
                    if(isset($_GET['insert_categories'])){
                        include('insert_categories.php');
                    }
                ?>
                <?php
                    if(isset($_GET['insert_product'])){
                        include('insert_product.php');
                    }
                ?>
                </div>
            </div>
        </div>

  





    
    <!-- Bosstrap js--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
                crossorigin="anonymous"></script>

</body>
</html>