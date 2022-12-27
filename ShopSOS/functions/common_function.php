<?php
    // include('./includes/connect.php');


    function getproducts(){
        global $con;

        if(!isset($_GET['category'])){
        $select_query="Select * from `products` order by rand() LIMIT 0,9";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            echo "<div class='col-md-4 mb-2'>

            <div class='card'>
              <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <h6 class='card-text text-danger'>Giá sản phẩm: $product_price đ</h6>
                <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>Xem sản phẩm</a>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm giỏ hàng</a>
              </div>
            </div> 
            </div>";
          } 
        }
    }

    function get_all_product(){
      global $con;

        if(!isset($_GET['category'])){
        $select_query="Select * from `products` order by rand()";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            echo "<div class='col-md-4 mb-2'>

            <div class='card'>
              <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <h6 class='card-text text-danger'>Giá sản phẩm: $product_price đ</h6>
                <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>Xem sản phẩm</a>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm giỏ hàng</a>
              </div>
            </div> 
            </div>";
          } 
        }
    }

    function get_unique_categories(){
        global $con;

        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
        $select_query="Select * from `products` where category_id=$category_id";
          $result_query=mysqli_query($con,$select_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
            echo"<h3 class='text-center text-danger'>Không có sản phẩm cho danh mục này!!!</h3>";
          }
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            echo "<div class='col-md-4 mb-2'>

            <div class='card'>
              <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <h6 class='card-text text-danger'>Giá sản phẩm: $product_price đ</h6>
                <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>Xem sản phẩm</a>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm giỏ hàng</a>
              </div>
            </div> 
            </div>";
          } 
        }
    }




    function getcategories(){
        global $con;
        $select_categories="Select * from `categories`";
            $result_categories=mysqli_query($con,$select_categories);

            while($row_data=mysqli_fetch_assoc($result_categories)){
              $category_title=$row_data['category_title'];
              $category_id=$row_data['category_id'];
              echo  " <li class='nav-item '>
                <a href='index.php?category=$category_id' 
                class='nav-link my-2 p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end'>$category_title</a>
              </li>";
            }
    }


    function search_product(){

      global $con;
      if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
          $result_query=mysqli_query($con,$search_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
            echo"<h3 class='text-center text-danger'>Không có sản phẩm tương ứng cần tìm!!!</h3>";
          }
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            echo "<div class='col-md-4 mb-2'>

            <div class='card'>
              <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <h6 class='card-text text-danger'>Giá sản phẩm: $product_price đ</h6>
                <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>Xem sản phẩm</a>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm giỏ hàng</a>
              </div>
            </div> 
            </div>";
          } 
        }
      }

      
    function view_details(){
      global $con;

      if(isset($_GET['product_id'])){
      if(!isset($_GET['category'])){
        $product_id=$_GET['product_id'];
      $select_query="Select * from `products` where product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image=$row['product_image'];
          $product_keywords=$row['product_keywords'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          echo "<div class='col-md-4 mb-2 mt-5 py-2 text-center'>
            <div class='card'>
              <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <h6 class='card-text text-danger'>Giá sản phẩm: $product_price đ</h6>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm giỏ hàng</a>
              </div>
            </div> 
          </div>
          <div class='col-md-1'>
          </div>
          <div class='col-md-7'>
              <div class='row'>
                  <div class='col-md-12'>
                      <h3 class='text-center text-info mb-5'>Thông tin sản phẩm</h3>
                  </div>
                  <h3>Tên sản phẩm : </h3>
                  <h5 class='text-success mt-2'>$product_title</h5>
                  <h3 class='mt-2'>Miêu tả sản phẩm : </h3>
                  <h6 class='mt-2'>$product_description</h6>
                  <h3 class='text-danger mt-2'>Giá sản phẩm : $product_price đ</h3>
                  <h5 class='mt-3'>Từ khóa sản phẩm : $product_keywords</h5>
              </div>
          </div>";
        }
      }
    }
  }




    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
      else{  
              $ip = $_SERVER['REMOTE_ADDR'];  
      }  
      return $ip;  
  }  
  // $ip = getIPAddress();  
  // echo 'User Real IP Address - '.$ip;  


  function cart(){
    if(isset($_GET['add_to_cart'])){
      global $con;
      
      $get_ip_add = getIPAddress();
      $get_product_id=$_GET['add_to_cart'];
      $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows>0){
            echo"<script>alert('Sản phẩm này đã có trong giỏ hàng')</script>";
            echo"<script>window.open('index.php','_self')</script>";
          }else{
            $insert_query="insert into `cart_details` (product_id,ip_address,quantity) 
            values ($get_product_id,'$get_ip_add',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo"<script>alert('Đã thêm sản phẩm vào giỏ hàng')</script>";
            echo"<script>window.open('index.php','_self')</script>";
          }
    }
  }


  function cart_item(){
    if(isset($_GET['add_to_cart'])){
      global $con;
      
      $get_ip_add = getIPAddress();
      $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
    }else{
      global $con;
      
      $get_ip_add = getIPAddress();
      $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
  }

  function total_cart_price(){
    global $con;

    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="Select * from `products` where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
      }
    }
    echo $total_price;
  }


  //
  function get_user_order_details(){
    global $con;
     $user_name=$_SESSION['username'];
     $get_details="Select * from `user_table` where user_name='$user_name'";
     $result_query=mysqli_query($con,$get_details);
     while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
            $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
            $result_orders_query=mysqli_query($con,$get_orders);
            $row_count=mysqli_num_rows($result_orders_query);
            if($row_count>0){
              echo "<h3 class='text-center mt-3 mb-2'>Bạn có  <span class='text-danger'>$row_count</span> đơn hàng chờ duyệt</h3>
              <p class='text-center'> <a href='profile.php?my_orders'>Xem đơn hàng</a></p>";
            }else{
              echo "<h3 class='text-center mt-3 mb-2'>Bạn có 0 đơn hàng chờ duyệt</h3>
              <p class='text-center'> <a href='../index.php'>Thêm sản phẩm vào giỏ hàng</a></p>";
            }
          }
        }
      }
     }
  }
?>
