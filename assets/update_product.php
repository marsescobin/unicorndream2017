<?php

require 'connect.php';

$products_id = $_POST['products_id'];
$description = $_POST['description'];
$price = $_POST['price'];
$categories_id = $_POST['category']; 


$sql = "update products set  description = '$description', price = '$price', categories_id = '$categories_id' WHERE products_id = '$products_id'";

// var_dump($sql);

mysqli_query($conn, $sql);

// $file = file_get_contents('users.json');
// $users = json_decode($file, true);

// $users[$user_id]['username'] = $username;
// $users[$user_id]['password'] = $password;
// $users[$user_id]['email'] = $email;
// $users[$user_id]['role'] = $user_role;

// $jsonFile = fopen('users.json', 'w');
// fwrite($jsonFile, json_encode($users, JSON_PRETTY_PRINT));
// fclose($jsonFile);

header("location: ../product.php?id=".$products_id."&update=success");

mysli_close($conn);