<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title=$_POST['product_title'];
        $description=$_POST['description'];
        $product_keywords=$_POST['product_keywords'];
        $category_id=$_POST['product_category'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        $product_image=$_FILES['product_image']['name'];

        $temp_image=$_FILES['product_image']['tmp_name'];

        
        if($product_title=='' or $description=='' or $product_keywords=='' 
        or $product_category=$category_id or $product_image=='' or $product_price==''){ 
            
            move_uploaded_file($temp_image,"../admin/product_images/$product_image");

            $insert_products="insert into `products` (product_title,product_description,product_keywords,
            category_id,product_image,product_price,date,status) 
            values ('$product_title','$description','$product_keywords','$category_id',
            '$product_image','$product_price',NOW(),'$product_status')";  
            $result=mysqli_query($con,$insert_products);
            if($result){
                echo "<script>alert('Thêm sản phẩm thành công')</script>";
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>

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


</head>
<body class="bg-light">
    <div class="container mt-3">
        <form action="" method="post" enctype="multipart/form-data">
            <!--Tên sản phẩm-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="from-label">Tên sản phẩm</label>
                <input type="text" name="product_title" 
                id="product_title" class="form-control" placeholder="Nhập tên sản phẩm" 
                autocapitalize="off" required="required">
            </div>
            <!--Mô tả sản phẩm-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="from-label">Mô tả sản phẩm</label>
                <input type="text" name="description" 
                id="description" class="form-control" placeholder="Nhập mô tả sản phẩm" 
                autocapitalize="off" required="required">
            </div>
            <!--Từ khóa sản phẩm-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="from-label">Từ khóa sản phẩm</label>
                <input type="text" name="product_keywords" 
                id="product_keywords" class="form-control" placeholder="Nhập từ khóa sản phẩm" 
                autocapitalize="off" required="required">
            </div>
            <!--Chọn danh mục sản phẩm-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Chọn danh mục sản phẩm</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                          }
                    ?>
                </select>
            </div>
            <!--Ảnh sản phẩm-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="from-label">Chọn ảnh sản phẩm</label>
                <input type="file" name="product_image" 
                id="product_image" class="form-control" 
                required="required">
            </div>
            <!--Giá sản phẩm-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="from-label">Giá sản phẩm</label>
                <input type="text" name="product_price" 
                id="product_price" class="form-control" placeholder="Nhập giá sản phẩm" 
                autocapitalize="off" required="required">
            </div>
            <!--Nút thêm-->
            <div class="form-outline mb-4 w-50 m-auto text-center">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Thêm sản phẩm">
            </div>
        </form>
    </div>

    
</body>
</html>