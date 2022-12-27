<?php
    include('../includes/connect.php');

    if(isset($_GET['edit_products'])){
        $edit_id=$_GET['edit_products'];
        $get_data="Select * from  `products` where product_id=$edit_id";
        $result=mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($result);
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $category_id=$row['category_id'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];


        $select_category="Select * from  `categories` where category_id=$category_id";
        $result_category=mysqli_query($con,$select_category);
        $row_category=mysqli_fetch_assoc($result_category);   
        $category_title=$row_category['category_title'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sửa sản phẩm - SOS Admin</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .product_img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include('navbar_menu.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Cute</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h3 class="m-0 font-weight-bold text-primary text-center">Chỉnh sửa sản phẩm</h3>

                    <div class="row mt-4">
                        <div class="col-lg-12"> 
                            <div class="card shadow">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-outline w-50 m-auto">
                                        <label for="product_title" class="form-label mt-2">Tên sản phẩm</label>
                                        <input type="text" id="product_title" value="<?php echo $product_title ?>"
                                        name="product_title" class="form-control" required="required">
                                    </div>
                                    <div class="form-outline w-50 m-auto">
                                        <label for="product_desc" class="form-label mt-2">Mô tả sản phẩm</label>
                                        <input type="text" id="product_desc" value="<?php echo $product_description ?>"
                                        name="product_desc" class="form-control" required="required">
                                    </div>
                                    <div class="form-outline w-50 m-auto">
                                        <label for="product_keywords" class="form-label mt-2">Từ khóa sản phẩm</label>
                                        <input type="text" id="product_keywords" value="<?php echo $product_keywords ?>"
                                        name="product_keywords" class="form-control" required="required">
                                    </div>
                                    <div class="form-outline w-50 m-auto ">
                                    <label for="product_category" class="form-label mt-2">Danh mục sản phẩm</label>
                                        <select name="product_category" class="form-select">
                                            <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                                            <?php
                                                $select_category_all="Select * from  `categories`";
                                                $result_category_all=mysqli_query($con,$select_category_all);
                                                while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                                                    $category_title=$row_category_all['category_title'];
                                                    $category_id=$row_category_all['category_id'];
                                                    echo "<option value='$category_id'>$category_title</option>";
                                                };
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-outline w-50 m-auto">
                                        <label for="product_image" class="form-label mt-2">Ảnh sản phẩm</label>
                                        <div class="d-flex">
                                            <input type="file" id="product_image" name="product_image" 
                                            class="form-control w-90 m-auto" required="required">
                                            <img src="../admin/product_images/<?php echo $product_image?>" alt="" class="product_img">
                                        </div>
                                    </div>  
                                    <div class="form-outline w-50 m-auto">
                                        <label for="product_price" class="form-label mt-2">Giá sản phẩm</label>
                                        <input type="text" id="product_price" value="<?php echo $product_price ?>"
                                        name="product_price" class="form-control" required="required">
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" name="edit_products" value="Cập nhật"
                                        class="btn btn-info px-3 mt-3 mb-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2022 - </span>
                        <span>From Thịnh Otakư with love</span>
                    </div>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
    if(isset($_POST['edit_products'])){
        $product_title=$_POST['product_title'];
        $product_desc=$_POST['product_desc'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_price=$_POST['product_price'];

        $product_image=$_FILES['product_image']['name'];
        $temp_image=$_FILES['product_image']['tmp_name'];

        if($product_title=='' or $product_desc=='' or $product_keywords==''
        or $product_category=='' or $product_image=='' or $product_price==''){
            echo "<script>alert('Vui lòng nhập thông tin')</script>";
        }else{
            move_uploaded_file($temp_image,"../admin/product_images/$product_image");

            $update_product="update `products` set product_title='$product_title',
            product_description='$product_desc', product_keywords='$product_keywords',
            category_id='$product_category', product_image='$product_image',
            product_price='$product_price', date=NOW() where product_id=$edit_id";
            $result_update=mysqli_query($con,$update_product);
            if($result_update){
                echo "<script>alert('Cập nhật sản phẩm thành công')</script>";
                echo "<script>window.open('product.php','_self')</script>";
            }
        }
    }
?>