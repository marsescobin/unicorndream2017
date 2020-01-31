<?php


function getTitle() {
	echo 'Create New Item';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Create New Item Page</h1>
		
		<form id="productForm" method="POST" action="assets/createnewitem.php" class="form-group" enctype="multipart/form-data">

			<input hidden type="number" name="products_id" value="<?php echo $products_id; ?>">

			<label for="productName">Product Name</label>
			<input type="text" name="description" id="description" placeholder="Enter product name" class="form-control">

			<label for="price">Price</label>
			<input type="text" name="price" id="price" placeholder="PHP 0.00" class="form-control">

			<label for="image">Image</label>
			<input type="file" class="form-control" name="product_image">

			<select name="category" class="form-control">
				<option value="5">All</option>
				<option value="1">Brow</option>
				<option value="2">Lash</option>
				<option value="3">Lipstick</option>
				<option value="4">Liptint</option>
			</select>

			<input type="submit" name="submit" id="submit" value="Create Item" class="btn btn-primary">
		</form>

	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>