<?php 

require 'assets/connect.php';

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
	<h1>My orders</h1>
	<?php 

	
	
	$sql = "SELECT o.shipping_address, s.description AS order_status, od.total, od.quantity, p.description AS product_description FROM orders o JOIN order_details od ON (o.orders_id = od.orders_id) JOIN products p ON (od.products_id = p.products_id) JOIN status s ON (o.status_id = s.status_id)  JOIN users u ON (o.users_id = u.users_id) where e_mail = '". $_SESSION['e_mail'] . "'";
		

	$result = mysqli_query($conn, $sql); 
	// $orders = mysqli_fetch_assoc($result); 
		
	// var_dump($orders); 

	?>

	<?php 

	// foreach ($orders as $key => $value) {

	while ($orders = mysqli_fetch_assoc($result)) {

		echo '
			<table>
					<tr>
						<td>Product Name</td>
						<td> '. $orders['product_description'].' </td>
					</tr>

					<tr>
						<td>Total</td>
						<td> '. $orders['total'].' </td>
					</tr>

					<tr>
						<td>Shipping Address</td>
						<td> '. $orders['shipping_address'].' </td>
					</tr>

					<tr>
						<td>Order Status</td>
						<td> '. $orders['order_status'].' </td>
					</tr>

					
				</table>
					';
				}

	?>		<!-- <button class="btn btn-primary">Edit</button> -->
			<!-- Trigger the modal with a button -->
	
</main>

	

<?php include 'partials/main_footer.php'; ?>
<?php include 'partials/foot.php'; ?>


</body>
</html>
<?php

mysqli_close($conn);

?>