<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="application/assets/login_style.css">
</head>
<body>
	<div class="container">

		<div class='in_box panel panel-default col-md-6 col-md-offset-3'>
			<h3 class='row col-xs-12'>
				Register
				<?php if($this->session->flashdata("reg_error")){
					echo "<span class='error'>Invalid registration data</span>";
				}?>
			</h3>
			<form action="register_user" method="post">
				<div class='row form-group'>
					<div class='col-xs-12'>
						<label>Email:</label>
						<input class="form-control" type="email" name="email" placeholder="Required"/>
					</div>
				</div>
				<div class='row form-group'>
					<div class='col-xs-12'>
						<label>First Name:</label>
						<input class="form-control" type="text" name="first_name" placeholder="Required"/>
					</div>
				</div>
				<div class='row form-group'>
					<div class='col-xs-12'>
						<label>Last Name:</label>
						<input class="form-control" type="text" name="last_name" placeholder="Required"/>
					</div>
				</div>
				<div class='row form-group'>
					<div class='col-xs-12'>
						<label>Password:</label>
						<input class="form-control" type="password" name="pass_1" placeholder="At least 8 characters"/>
					</div>
				</div>
				<div class='row form-group'>
					<div class='col-xs-12'>
						<label>Confirm Password:</label>
						<input class="form-control" type="password" name="pass_2" placeholder="At least 8 characters"/>
					</div>
				</div>
				<div class='row form-group'>
					<input class='btn btn-success pull-right' type="submit" value="Register" role='button'/>
				</div>
			</form>

			<a href="login" class='reg'>Already have an account? Log In!</a>
		</div>

	</div> <!-- end of container -->
</body>
</html>
