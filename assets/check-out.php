<?php

session_start();

require 'connect.php';
 
$cart = $_SESSION['cart'];
$shipping = $_POST['shipping'];
$courier_id = $_POST['courier_id']; 
$tracking = $_POST['tracking']; 
$special_note = $_POST['special_note'];
$order_details_id = $_POST['order_details_id']; 

function referenceNumberGenerator() {
    $ref_number = '';
    
    $source = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
    
    for ($i = 0; $i < 16; $i++) {
        $index = rand(0, 15); // Generate random number
        
        // Append random character
        $ref_number = $ref_number . $source[$index];
    }
    
    $today = getdate();  // Seconds since Unix Epoch
    
    return $ref_number.'-'.$today[0];
}

$reference_number = referenceNumberGenerator();

$sql = "SELECT users_id from users where e_mail = '". $_SESSION['e_mail'] . "'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result); 

$sql = "INSERT INTO orders(shipping_address, users_id, special_note,  status_id, courier_id, tracking_number,  reference_number) VALUES ('$shipping', '".$user['users_id']."', '$special_note', 2, '$courier_id',  '$tracking', '$reference_number')";
$result = mysqli_query($conn, $sql); 
$order_id = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $key => $value) {
	$products_id = $key;
	$quantity = $value[0];
	$price = $value[1]; 
	$products_id=$value[2];
	$total = $price * $quantity; 

	$sql = "INSERT INTO order_details (products_id, total, quantity, orders_id) VALUES ('$products_id', '$total', '$quantity', '".$order_id."')";
	$result = mysqli_query($conn, $sql); 
	$product = mysqli_fetch_assoc($result);
}

if ($result) {
unset($_SESSION['cart']);
unset($_SESSION['item_count']);
	header('location: ../payment.php?=success'); 
}
else {
	die('Error: ' . $sql . '<br>' . mysqli_error($conn));
}

mysqli_close($conn);