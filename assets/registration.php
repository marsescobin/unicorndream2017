<?php 

require 'connect.php';  // Database connection


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$e_mail = $_POST['e_mail'];
$mobile_number = $_POST['mobile_number'];
$password = $_POST['password'];

// Create SQL query
$sql = "INSERT INTO users(first_name, last_name, e_mail, mobile_number, password, roles_id) VALUES('$first_name', '$last_name', '$e_mail', '$mobile_number', '$password', 2);";
								
// Send query to database
$result = mysqli_query($conn, $sql);

// Check if create new user was successful
if ($result){
	header('location: ../login.php?login=success');
}
	
else{
	die('Error: ' . $sql . '<br>' . mysqli_error($conn));
}

mysqli_close($conn);
