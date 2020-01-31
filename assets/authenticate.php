<?php

session_start();
require 'connect.php';  // Database connection


$e_mail = $_POST['e_mail'];
$password = $_POST['password'];

// echo $userName . ' ' . $passWord;

$sql = "SELECT * FROM users WHERE e_mail = '$e_mail' AND password= '$password'"; 
$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$user = mysqli_fetch_assoc($result); 
		
	$_SESSION['e_mail'] = $row['e_mail'];
	$_SESSION['roles'] = $row['roles_id'];
	
	// if $_SESSION['roles'] == 2 {
		
	// 	header("location: ../admin.php")
	// }

	// else {

	// if $row['roles_id'] = 2 {
	// }
	
	header("Location: ../index.php?signin=success ");
} else {
	header("Location: ../login.php?login=failed ");
}
 
