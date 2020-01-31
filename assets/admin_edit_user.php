<?php 

session_start();

require 'connect.php';

$id = $_GET['id'];

$sql = "select * from users where users_id = '$id'";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_assoc($result);
extract($users);

echo '

	

	<label>First Name</label>
	<input hidden name="users_id" value="'.$users_id.'">
	<input name="first_name" class="form-control" type="text" value="'.$first_name.'">

	<labe>Last Name</label>
	<input name="last_name" class="form-control" type="text" value="'.$last_name.'">

	<labe>Mobile Number</label>
	<input name="mobile_number" class="form-control" type="number" value="'.$mobile_number.'">


	<label>E-mail</label>
	<input name="e_mail" class="form-control" type="text" value="'.$e_mail.'">

	<label>Password</label>
	<input name="password" class="form-control" type="text" value="'.$password.'">

';

	$sql = "SELECT * FROM `roles`";
	$result = mysqli_query($conn, $sql);
	
	echo '
	<label>Roles</label>
	<select class="form-control" name="roles">';
	while ($row = mysqli_fetch_assoc($result)) {
		// extract($row);

		if ($roles_id === $row['roles_id'])
			echo '<option value="'.$row['roles_id'].'" selected>'.$row['description'].'</option>';
		else
			echo '<option value="'.$row['roles_id'].'">'.$row['description'].'</option>';
		
	}
		echo '
		</select>';

mysqli_close($conn);