<?php 

session_start();

$product = $_POST['products']; 


unset($_SESSION['cart'][$product]); 

$_SESSION['item_count'] = array_sum($_SESSION['cart']);  

header('location: ../checkout.php');