<?php 
function getTitle() {
	echo 'Welcome Unicord Dream Ink!';
}

include 'partials/head.php';

?> 

</head>
<body> 

<?php 
	include 'partials/main_header.php';
?>

<main class= "wrapper"> 
	<h1>Register</h1>

	<form id="registerForm" method="POST" action="assets/registration.php" class="form-group register">
		<label for="first_name">First Name</label>
		<input type="text" name="first_name" id="first_name" placeholder="Enter your first name here" class="form-control">

		<label for="last_name">Last Name</label>
		<input type="text" name="last_name" id="last_name" placeholder="Enter your last name here" class="form-control">

		<label for="e_mail">E-mail</label>
		<input type="text" name="e_mail" id="e_mail" placeholder="Enter your e-mail here" class="form-control">

		<label for="e_mail">Mobile Number</label>
		<input type="number" name="mobile_number" id="mobile_number" placeholder="Enter your mobile number here" class="form-control">


		<label for="password">Password</label>
		<input type="password" name="password" id="password" placeholder="Enter your password here" class="form-control">

		<input type="submit" name="submit" id="submit" value="Log-in" class="btn btn-primary">
	</form>
</main>

<?php include 'partials/main_footer.php'; ?>
<?php include 'partials/foot.php'; ?>

</body>
</html>