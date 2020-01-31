<?php 

function getTitle() {
	echo 'Welcome to Unicord Dream Ink!';
}

include 'partials/head.php';

?> 

</head>
<body> 

<?php 
	include 'partials/main_header.php';
?>

<main class= "wrapper"> 
	<h1>Log in</h1>

	<form id="loginForm" method="POST" action="assets/authenticate.php" class="form-group login">
		<label for="e_mail">E-mail Address</label>
		<input type="text" name="e_mail" id="e_mail" placeholder="Enter e-mail address here" class="form-control">

		<label for="password">Password</label>
		<input type="password" name="password" id="password" placeholder="Enter password here" class="form-control">

		<input type="submit" name="submit" id="submit" value="Log-in" class="btn btn-primary">
	</form>
</main>

<?php include 'partials/main_footer.php'; ?>
<?php include 'partials/foot.php'; ?>

</body>
</html>