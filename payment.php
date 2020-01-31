<?php 

$_SESSION['cart'] = array();

function getTitle() {
	echo 'Welcome to Unicorn Dream Ink!';
}

include 'partials/head.php';

?> 

</head>
<body> 

<?php 
	include 'partials/main_header.php';
?>

<main class= "wrapper">
	<h1>Payment page</h1>
	<h2>Your order has been received. Your payment and order confirmation will be sent over via e-mail. Thank you. </h2>
	
	
</main>



<?php include 'partials/main_footer.php'; ?>
<?php include 'partials/foot.php'; ?>

</body>
</html>
