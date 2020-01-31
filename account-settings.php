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
	<h1>Account Settings</h1>
	<?php 
	$e_mail = $_SESSION['e_mail'];
	$sql = "select * from users where e_mail = '$e_mail'";
	$result=mysqli_query($conn, $sql); 
	$user= mysqli_fetch_assoc($result); 
	extract($user); 

	?>
<!-- 	<div style="overflow-x:auto;"> -->

	<table>
			<tr>
				<th>First Name</th>
				<td><?php echo $first_name; ?></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?php echo $last_name; ?></td>
			</tr>
			<tr>
				<th>E-mail</th>
				<td><?php echo $e_mail; ?></td>
			</tr>
			<tr>
				<th>Mobile Number</th>
				<td><?php echo $mobile_number; ?></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><?php echo $password; ?></td>
			</tr>

		
		</table>
	<!-- </div>	 -->
		<div class="buttons">
			
		<button id="editUser" type="button" class="btn btn-info" data-toggle="modal"  data-target="#editUserModal" data-index="<?php echo $id; ?>">Update</button>
		</div>



		
		<!-- <button class="btn btn-primary">Edit</button> -->
		<!-- Trigger the modal with a button -->


</main>

	<div id="editUserModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	  <form method="POST" action="assets/update_user.php">
    	<input hidden  name="user_id" value="<?php echo $id; ?>">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Update Account Information</h4>
					<label for="first_name">First Name</label>
					<input type="text" name="first_name" id="first_name" placeholder="Enter your first name here" class="form-control">

					<label for="last_name">Last Name</label>
					<input type="text" name="last_name" id="last_name" placeholder="Enter your last name here" class="form-control">

					<label for="e_mail">E-mail</label>
					<input type="text" name="e_mail" id="e_mail" placeholder="Enter your e-mail here" class="form-control">

					<label for="e_mail">Mobile Number</label>
					<input type="number" name="mobile_number" id="mobile_number" placeholder="Enter your mobile number here" class="form-control">


					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="Enter your password here" class="form-control">



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
	</div

	  </div>
	</div>



<?php include 'partials/main_footer.php'; ?>
<?php include 'partials/foot.php'; ?>

<script type="text/javascript">
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
		});

</script>

</body>
</html>
<?php

mysqli_close($conn);

?>