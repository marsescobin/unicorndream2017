<?php

$_SESSION['cart'] = array();


function getTitle() {
	echo 'Shop';
}

include 'partials/head.php';

// import items.json file
// $file = file_get_contents('assets/items.json');

// Create database connection
require 'assets/connect.php';

// $items = json_decode($file, true);
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);  // $conn is from connect.php

$products = array();  // Empty array of items

// Category chosen for filter
if (isset($_GET['search']) && $_GET['category'] !== 'All') {
	$cat = $_GET['category'];

	$sql = "SELECT * FROM products WHERE categories_id = '$cat'";
	$result = mysqli_query($conn, $sql);

	$products = $result;

} else {
	// Show all items
	$products = $result;

}

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main id="catalogWrapper" class="wrapper">

		<h1>What are you shopping for?</h1>

		<?php if (isset($_SESSION['e_mail'])) {
			if ($_SESSION['roles'] == '1')
			
			echo '
			<a href="create_new_item.php">
				<button class="btn btn-primary">Add New Item</button>
			</a>
		';
		}

		?>

		<form method="GET">
			<select name="category" class="form-control select">
				<option value="5">All</option>
				<option value="1">Brow</option>
				<option value="2">Lash</option>
				<option value="3">Lipstick</option>
				<option value="4">Liptint</option>
			</select>
			<button class="btn btn-primary form-control" type="submit" name="search">Search</button>
		</form>
			
		<div class="items-wrapper"


		>

			<?php

			// foreach ($result as $key => $item) {
			while ($product = mysqli_fetch_assoc($products)) {
				extract($product);

				echo '
					<div class="item-parent-container form-group shop">
						<a href="product.php?id='.$products_id.'">
						<div class="item-container">
							<h3>'.$description.'</h3>
							<img class= "product_image"src="'.$product_image.'" alt="Mock data">
							<p id="price'.$products_id.'">PHP '.$price.'</p>

						</div>  <!-- /.item-containerq-->
						</a>
						<input id="itemQuantity'.$products_id.'" class="iq" type="number" value="0" min="0">

						<button class="btn btn-primary form-control shop-button" onclick="addToCart('.$products_id.')">Add to Cart</button>
					</div>
				';
			}

			?>
		</div>  <!-- /.items-wrapper -->
		
	</main> 

	 <!-- /.wrapper -->
 
	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php

	include 'partials/foot.php';

	?>

	<script type="text/javascript">
		
		function addToCart(itemId) {
			var id = itemId;
			// console.log(itemId);

			var item_price = $('#price'+id).text();
			var split = item_price.split(' ');
			var price = split[1];

			// // retrieve value of item quantity
			var quantity = $('#itemQuantity' + id).val();
			// console.log(quantity);

			// // create a post request to update session cart variable
			$.post('assets/add_to_cart.php',
				{
					item_id: id,
					item_quantity: quantity,
					item_price: Number(price)
				},
				function(data, status) {
					// console.log(data);
					$('a[href="cart.php"]').html(data);
				});

		}
	</script>

</body>
</html>