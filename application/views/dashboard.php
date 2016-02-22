<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dashboard</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<link rel="stylesheet" type="text/css" href="/application/assets/table_style.css">
	</head>
	<body>
		<div class='container'>
			<h3>All Users</h3>

			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<?php
						$format = array('ID','Name','Email','Date Added','User Level');
						foreach ($format as $value){ ?>
							<th><?= $value ?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach (array_reverse($users) as $key => $arr) {  ?>
					<tr>
						<td><?=$arr['id']?></td>
						<td>
							<a href='profile/<?=$arr['id']?>'>
								<?=$arr['first_name']." ".$arr['last_name']?>
							</a>
						</td>
						<td><?=$arr['email']?></td>
						<td>
							<?=$arr['created_at']?>
							<!-- date('M t, Y',$arr['created_at']) -->
						</td>
						<td><?=$arr['user_level']?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
	</body>
</html>
