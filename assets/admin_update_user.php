<?php 

session_start(); 
require 'connect.php'; 

$users_id = $_POST['users_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile_number = $_POST['mobile_number'];
$e_mail = $_POST['e_mail'];
$roles_id = $_POST['roles']; 
$password = $_POST['password'];

$sql = "update users set users_id = '$users_id', first_name = '$first_name', last_name ='$last_name', mobile_number= '$mobile_number', e_mail = '$e_mail', roles_id = '$roles_id', password = '$password' where users_id = '$users_id'";

mysqli_query($conn, $sql);
header("location: ../user.php?id=".$users_id."&update=success");

mysli_close($conn);

