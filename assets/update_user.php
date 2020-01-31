<?php
session_start();

require 'connect.php';

$previous_email = $_SESSION['e_mail'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$e_mail = $_POST['e_mail'];
$_SESSION['e_mail'] = $e_mail;
$mobile_number = $_POST['mobile_number'];
$password = $_POST['password'];


$sql = "update users set first_name = '$first_name', last_name = '$last_name', e_mail = '$e_mail', mobile_number='$mobile_number' where e_mail = '$previous_email'";

mysqli_query($conn, $sql);

header("location: ../account-settings.php?update=success");

mysli_close($conn);