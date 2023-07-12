<?php
include('./includes/connect.php');
//getting products
function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
$select_query="Select * from `products`";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_keywords=$row['product_keywords'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_image3=$row['product_image3'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>price-$product_price</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

  </div>
</div>
</div>";
}
}
}
}
//getting unique categories
function getuniquecat(){
  global $con;
  if(isset($_GET['category'])){
    $category_id=$_GET['category'];
$select_query="Select * from `products` where category_id=$category_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
  echo "<h2>No stock for this category</h2>";
}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_keywords=$row['product_keywords'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_image3=$row['product_image3'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price-$product_price</p>

  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>

  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

</div>
</div>
</div>";
}
}
}

function getuniquebrand(){
  global $con;
  if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
$select_query="Select * from `products` where brand_id=$brand_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
  echo "<h2>No stock for this brand</h2>";
}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_keywords=$row['product_keywords'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_image3=$row['product_image3'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price-$product_price</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>

  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

</div>
</div>
</div>";
}
}
}

function getbrands(){
    global $con;
    $select_brands="Select *from `brands`";
$result_brands=mysqli_query($con,$select_brands);
//$row_data=mysqli_fetch_assoc($result_brands);
//echo $row_data['brand_title'];
while($row_data=mysqli_fetch_assoc($result_brands)){
  $brand_title=$row_data['brand_title'];
  $brand_id=$row_data['brand_id'];
  //echo $brand_title;
  echo "<li class='nav-item '>
  <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
</li>";
}
}

function getcat(){
    global $con;
    $select_brands="Select *from `categories`";
$result_brands=mysqli_query($con,$select_brands);
//$row_data=mysqli_fetch_assoc($result_brands);
//echo $row_data['brand_title'];
while($row_data=mysqli_fetch_assoc($result_brands)){
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  //echo $brand_title;
  echo "<li class='nav-item '>
  <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
</li>";
}
}

//searching products functions
function search_products(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
$search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
$result_query=mysqli_query($con,$search_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
  echo "<h2>No stock for this Product</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_keywords=$row['product_keywords'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_image3=$row['product_image3'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>price-$product_price</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

  </div>
</div>
</div>";
}
}
}

//view deatils function
function view_details(){
  global $con;
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      $product_id=$_GET['product_id'];
$select_query="Select * from `products` where product_id='$product_id'";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_keywords=$row['product_keywords'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_image3=$row['product_image3'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>$product_price</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='index.php' class='btn btn-secondary'>Go home</a>

</div>
</div>
</div>

<div class='col-md-8'>
<div class='row'>
   <div class='col-md-12'>
       <h4 class='text-center text-info mb-5'>Related products</h4>
   </div>
   <div class='col-md-6'>
   <img src='./admin_area/product_images/$product_image2' alt='$product_title'>

   </div>
   <div class='col-md-6'>
   <img src='./admin_area/product_images/$product_image3' alt='$product_title'>

   </div>
</div>
</div>";
}
}
}
}
}
//get ip adresss
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
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//cart functyion
function cart(){
   if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows>0){
  echo "<script>alert('already present in the cart')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}
else{
  $insert_query="insert into `cart` (product_id,ip_address,quantity) values('$get_product_id','$get_ip_add',0) ";
  $result_query=mysqli_query($con,$insert_query);
  echo "<script>window.open('index.php','_self')</script>";

}
 
   }
}
//function to get cart item numbers
function cart_item(){

  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add=getIPAddress();
    //$get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
  }
else{
  global $con;
  $get_ip_add=getIPAddress();
  //$get_product_id=$_GET['add_to_cart'];
  $select_query="Select * from `cart` where ip_address='$get_ip_add'";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
}
 echo $num_of_rows;
   }

   // total price function
function total_cart_price(){
  global $con;
  $get_ip_add=getIPAddress();
  $total=0;
$cart_query="Select * from `cart` where ip_address='$get_ip_add' ";
$result=mysqli_query($con,$cart_query);
while($row=mysqli_fetch_array($result)){
  $product_id=$row['product_id'];
  $select_products="Select * from `products` where product_id='$product_id'";
  $result_products=mysqli_query($con,$select_products);
  while($row_product_price=mysqli_fetch_array($result_products)){
    $product_price=array($row_product_price['product_price']);
    $product_values=array_sum($product_price);
    $total+=$product_values;
  }

}
echo $total;
}
?>
