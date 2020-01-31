<?php 

require 'connect.php'; 

$products_id = $_POST['products_id'];
$product_name = $_POST['description'];
$price = $_POST['price'];
// $image = $_POST['product_image'];
$categories_id = $_POST['category']; 

$target_dir = "images"; 
$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);

$sql = "INSERT INTO products(products_id, description, price, product_image, categories_id) VALUES ('$products_id', '$product_name', '$price', 'assets/$target_file', '$categories_id')"; 

$result = mysqli_query($conn, $sql);

if ($result){
	header('location: ../shop.php?new-item=success');
}
	
else{
	die('Error: ' . $sql . '<br>' . mysqli_error($conn));
}

mysqli_close($conn);

