<?php

require 'assets/connect.php';  // Database connection

// session_start();

if (isset($_SESSION['e_mail'])) {
	if ($_SESSION['roles'] == '1')
		header('location: home.php');
}

function getTitle() {
	echo 'User Page';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>User Page</h1>
		<?php

		$id = $_GET['id'];
		$sql = "select * from users where users_id = '$id'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		extract($user);

		// $file = file_get_contents('assets/users.json');
		// $users = json_decode($file, true);

		?>
		<table>
			<tr>
				<td>User ID</td>
				<td><?php echo $users_id; ?></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><?php echo $first_name; ?></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><?php echo $last_name; ?></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><?php echo $e_mail; ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $password; ?></td>
			</tr>
			<tr>
				<td>Role</td>
				<td><?php echo $roles_id; ?></td>
			</tr>
		</table>
<div class="buttons">
	
		<a href="admin.php">
			<button class="btn btn-default">Back</button>
		</a>

		<!-- <button class="btn btn-primary">Edit</button> -->
		<!-- Trigger the modal with a button -->
		<button id="editUser" type="button" class="btn btn-info" data-toggle="modal"  data-target="#editUserModal" data-index="<?php echo $id; ?>">Edit</button>
<!-- 
		<button class="btn btn-danger">Delete</button> -->
		<button id="deleteUser" type="button" class="btn btn-danger" data-toggle="modal"  data-target="#deleteUserModal" data-index="<?php echo $id; ?>">Delete</button>
</div>

	</main>

	<!-- edit modal -->
	<div id="editUserModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <form method="POST" action="assets/admin_update_user.php">
	    	<input hidden name="admin_user_id" value="<?php echo $id; ?>">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit User Details</h4>
		      </div>
		      <div id="editUserModalBody" class="modal-body">
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
	<div id="deleteUserModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <form method="POST" action="assets/aadmin_delete_user.php">
	    	<input hidden name="admin_user_id" value="<?php echo $id; ?>">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Delete User</h4>
		      </div>
		      <div id="deleteUserModalBody" class="modal-body">
		      	<p>Do you really want to delete this user?</p>
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

	<?php

	include 'partials/foot.php';

	?>

		<script type="text/javascript">
		$(document).ready(function() {

			$('#editUser').click(function() {
				var userId = $(this).data('index');

				$.get('assets/admin_edit_user.php',
					{
						id: userId
					},
					function(data, status) {
						$('#editUserModalBody').html(data);
				});
			});

			$('#deleteUser').click(function() {
				var userId = $(this).data('index');

				$.get('assets/admin_remove_user.php',
					{
						id: userId
					},
					function(data, status) {
						$('#editUserModalBody').html(data);
				});
			});
		});
	</script>
	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

	<script type="text/javascript">
		$(document).ready(function() {

			$('#editUser').click(function() {
				var userId = $(this).data('index');

				$.get('assets/edit_user.php',
					{
						id: userId
					},
					function(data, status) {
						$('#editUserModalBody').html(data);
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

</body>
</html>

<?php

mysqli_close($conn);

?>