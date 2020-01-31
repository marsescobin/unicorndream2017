<?php

require 'assets/connect.php'; 

function getTitle() {
	echo 'My Cart Page';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Check Out page</h1>

	<table>Order Summary
		<tr> 
			<th>Product Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Subtotal</th>
			
		</tr>
	<?php 

	foreach ($_SESSION['cart'] as $key => $value){
		$products_id = $key; 
			// echo $products_id; 
			// exit();

			$sql = "SELECT * FROM products WHERE products_id = '$products_id'"; 
			$result = mysqli_query($conn, $sql); 
			$product =mysqli_fetch_assoc($result); 
			extract($product);

			$subtotal = $value[0] * $value[1];

			// var_dump($_SESSION['cart']);
		// $id => $key; 
		// $quantity => $product; 
		echo '


		<tr>
			<td>'.$description.'</td>
			<td>'.$value[1].'</td>
			<td>'.$value[0].'</td>
			<td>'.$subtotal.'</td>
			

	</table>
		';
			// $total += $subtotal;

	}

	?> 
	<form id="paymentForm" method="POST" action="assets/check-out.php" class="form-group payment">

		<input hidden name="order_details_id" value="<?php echo $id; ?>">

		<label for="shipping"> Shipping address</label>
			<input type="text" name="shipping" id="shipping" placeholder="Enter shipping address" class="form-control">

		<label for="special-note">Special Note</label>
			<input type="text" name="special_note" id="special_note" placeholder="Special instructions/notes" class="form-control">

		<label for="shipping">Courier</label>
		<select name="courier_id" id= "shipping "class="form-control">
			<option value="1">JRS</option>
			<option value="2">Palawan</option>
			<option value="3">LBC</option>
		</select>

		<label for="reference">Tracking Number</label>
			<input type="text" name="tracking" id="tracking" placeholder="Enter reference number" class="form-control">
	</form>

	</main>
	<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">

	<!-- main footer -->
<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>


<script type="text/javascript">
			


	</script>

</body>
</html>