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

		<h1>My Cart Page</h1>

	<table>
			<tr>
				<th>Image</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				
				<th></th>
			</tr>


		<?php

		$total = 0; 

		echo '<form method="POST" action="checkout.php">';
		foreach ($_SESSION['cart'] as $key => $value) {
			
			$sql = "SELECT p.products_id, p.description, p.product_image, p.price FROM products p JOIN categories c ON (p.categories_id = c.categories_id) WHERE p.products_id = '$key'"
; 
			$result = mysqli_query($conn, $sql); 
			$product = mysqli_fetch_assoc($result);
			

			extract($product);

			$subtotal = $price * $value[0]; 

			echo '
					<input hidden name="product" value="'.$products_id.'">
						<tr id="products_id"'.$products_id.'">
							<td><img style="width:100px;" src="'.$product_image.'"><td>
							<td>'.$description.'</td>
							
							<td  id="price'.$products_id.'">'.$price.'</td>
							<td>
							<input name = "quantity" id="quantity'.$products_id.'" type="number" value="'.$value[0].'" onchange="updateQty('.$products_id.')">
							</td>
							<td id="subtotal'.$products_id.'">'.$subtotal.'</td>
							<td><button><span class="glyphicon glyphicon-trash"></span></button></td>
						</tr>


					';
			$total += $subtotal;
		}

		echo '
					<tr>
						<td colspan="5">Total</td>
						<td id="total" colspan="2">'.$total.'</td>
						<td><a href= "checkout.php"><input type="submit" name="submit" id="submit" value="Check Out" class="btn btn-primary"></a></td>
					</tr>
					</form>

		';

		?>
	</table>

	</main>

	<!-- main footer -->
<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>


<script type="text/javascript">
			
		function updateQty(id) {
			var oldSub = document.getElementById("subtotal"+id).innerHTML;
			// console.log(oldSub);

			var oldTotal = document.getElementById("total").innerHTML;
			// console.log(oldTotal);

			var price = document.getElementById("price"+id).innerHTML;
			// console.log(price);

			var quantity = document.getElementById("quantity"+id).value;
			// console.log(quantity);

			var newSub = price * quantity;
			// console.log(newSub);
			var newTotal = (oldTotal - oldSub) + newSub;

			document.getElementById("subtotal"+id).innerHTML = newSub;
			document.getElementById("total").innerHTML = newTotal;

			var newQty = "<?php echo $_SESSION['item_count']; ?>";
			console.log(newQty);

		}

	</script>

</body>
</html>