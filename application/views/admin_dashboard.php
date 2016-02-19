<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Dashboard</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<link rel="stylesheet" type="text/css" href="/application/assets/style.css">
		<?php
		require_once("/application/assets/print_table.php");
		?>
	</head>
	<body>
		<div class='container'>
			<h3>Manage Users</h3>
			<a href='new_product' class='btn btn-primary' role='button'>Add a new product</a>

			<?php
			$format = array(
				'ID' => 'id',
				'Name' => 'name',
				'Email' => 'name',
			 	'Date Added' => 'created_at',
				'User Level' => 'user_level',
			);

			print_table($users, $format);
			?>

		</div>
	</body>
</html>
