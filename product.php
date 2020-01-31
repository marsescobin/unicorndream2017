<?php
// session_start();

require 'assets/connect.php';  // Database connection


if (!isset($_SESSION['e_mail'])) {
	header('location: shop.php');
}
		if ($_SESSION['roles'] != '1') {
		echo 'Please contact your administrator';
}

// var_dump($_SESSION['roles']);

function getTitle() {
	echo 'Product Page';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Product Page</h1>
		<?php

		$id = $_GET['id'];

		$sql = "select * from products where products_id = '$id'";

		
		// $sql "SELECT * FROM products p JOIN categories c ON (p.categories_id = c.categories_id) WHERE products_id = '".$id."'";
		
		$result = mysqli_query($conn, $sql);
		

		// $file = file_get_contents('assets/users.json');
		// $users = json_decode($file, true);

		?>
		<table> 
		<?php while ($row = mysqli_fetch_assoc($result)) {
		
			echo '
			<tr>
				<td>Product Image</td>
				<td><img src="' . $row['product_image'].' " class = "product-image"></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td>' . $row['description'].'</td>
			</tr>
			<tr>
				<td>Price</td>
				<td>' . $row['price'] .'</td>
			</tr>


			<tr>
				<td>Category</td>
				<td>' . $row['categories_id'] . '</td>
			</tr>
			'; 
		}	
		?>
		</table>
		<div class="buttons">
			
		<a href="shop.php">
			<button class="btn btn-default">Back</button>
		</a>

		<!-- <button class="btn btn-primary">Edit</button> -->
		<!-- Trigger the modal with a button -->
		<button id="editProduct" type="button" class="btn btn-info" data-toggle="modal"  data-target="#editProductModal" data-index="<?php echo $id; ?>">Edit</button>
<!-- 
		<button class="btn btn-danger">Delete</button> -->
		<button id="deleteProduct" type="button" class="btn btn-danger" data-toggle="modal"  data-target="#deleteProductModal" data-index="<?php echo $id; ?>">Delete</button>

		</div>
	</main>

	<!-- edit modal -->
	<div id="editProductModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <form method="POST" action="assets/update_product.php">
	    	<input hidden name="product_id" value="<?php echo $id; ?>">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit Product Details</h4>
		      </div>
		      <div id="editProductModalBody" class="modal-body">
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-default">Update</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		      </div>
		    </div>
	    </form>

	  </div>
	</div>

	<!-- delete modal -->
	<div id="deleteProductModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <form method="POST" action="assets/delete_product.php">
	    	<input hidden name="products_id" value="<?php echo $id; ?>">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Delete Product</h4>
		      </div>
		      <div id="deleteProductModalBody" class="modal-body">
		      	<p>Do you really want to delete this product?</p>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-danger">Yes</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		      </div>
		    </div>
	    </form>

	  </div>
	</div>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php4

include 'partials/foot.php';

?>

	<script type="text/javascript">
		$(document).ready(function() {

			$('#editProduct').click(function() {
				var userId = $(this).data('index');

				$.get('assets/edit_product.php',
					{
						id: userId
					},
					function(data, status) {
						$('#editProductModalBody').html(data);
				});
			});

			// $('#deleteUser').click(function() {
			// 	var userId = $(this).data('index');

			// 	$.get('assets/remove_user.php',
			// 		{
			// 			id: userId
			// 		},
			// 		function(data, status) {
			// 			$('#editUserModalBody').html(data);
			// 	});
			// });
		});
	</script>

	<?php include 'partials/foot.php'; ?>

</body>
</html>

<?php

mysqli_close($conn);

?>