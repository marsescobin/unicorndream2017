<?php

session_start();

$id = $_POST['item_id'];
$quantity = $_POST['item_quantity'];
$price = $_POST['item_price'];

// update the items for session cart variable
$_SESSION['cart'][$id] = [$quantity, $price, $id];

// $_SESSION['cart'][$id] =array(  
// 	'id' => $id['products_id']
// ); 

// update the total quantities of item to be purchased
// $_SESSION['item_count'] += $quantity;
// $_SESSION['item_count'] = array_sum($_SESSION['cart']);

$_SESSION['item_count'] = 0;
foreach ($_SESSION['cart'] as $key => $value) {
	$_SESSION['item_count'] = $_SESSION['item_count'] + $value[0];
}

echo '<h2 class="fa fa-shopping-bag"><strong style="color:red;">( '.$_SESSION['item_count'].' )</strong></h2>';