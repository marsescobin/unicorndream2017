<?php

require 'connect.php';

$products_id = $_POST['products_id'];

$sql = "delete from products where products_id = $products_id";

$result=mysqli_query($conn, $sql);


header('location: ../shop.php');

