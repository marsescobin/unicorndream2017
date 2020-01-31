<?php

session_start();
require 'assets/connect.php';

if (!isset($_SESSION['e_mail'])) {
	header('location: login.php');
} else {
	if ($_SESSION['roles'] != '1')
		header('location: index.php');
}

function getTitle() {
	echo 'Admin Page';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main id="" class="wrapper">


		<h1>Admin Page</h1>

		<table>
			<thead>
				<th>User ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Role</th>
			</thead>
			<tbody>
				<?php

				$sql = "select * from users";				
				$result = mysqli_query($conn, $sql);

				while ($user = mysqli_fetch_assoc($result)) {
					extract($user);
					echo '
					
					<tr>
						<td><a href="user.php?id='.$users_id.'">' . $user['users_id'] . ' </a></td>
						<td>' . $user['first_name'] . '</td>
						<td>' . $user['last_name'] . '</td>
						<td>' . $user['e_mail'] . '</td>
						<td>' . $user['password'] . '</td>
						<td>' . $user['roles_id'] . '</td>
					</tr>
				
					';
				}

				?>
			</tbody>
		</table>
		
	</main>




 
	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php

	include 'partials/foot.php';

	?>

	
</body>
</html>