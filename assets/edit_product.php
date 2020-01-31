<?php

session_start();

require 'connect.php';

$id = $_GET['id'];

$sql = "select * from products where products_id = '$id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
extract($product);

// successful processing

// $file = file_get_contents('users.json');
// $users = json_decode($file, true);

echo '
	<label>Product Name</label>
	<input hidden name="products_id" value="'.$id.'">
	<input name="description" class="form-control" type="text" value="'.$description.'">

	<labe>Price</label>
	<input name="price" class="form-control" type="number" value="'.$price.'">
';

	$sql = "SELECT * FROM `categories`";
	$result = mysqli_query($conn, $sql);
	
	echo '
	<label>Category</label>
	<select class="form-control" name="category">';
	while ($row = mysqli_fetch_assoc($result)) {
		// extract($row);

		if ($categories_id === $row['categories_id'])
			echo '<option value="'.$row['categories_id'].'" selected>'.$row['category_name'].'</option>';
		else
			echo '<option value="'.$row['categories_id'].'">'.$row['category_name'].'</option>';
		
	}
		echo '
		</select>';

mysqli_close($conn);