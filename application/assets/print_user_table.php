<?php

function print_table ($mult_arr,$format){
	echo '<table class="table table-striped table-bordered mytable">';
		echo '<thead>';						// TABLE HEAD
			echo '<tr>';
			foreach ($format as $key => $value){
				echo "<th>{$key}</th>";
			}
			//============================> Uncomment If You Add Actions <==
			echo "<th>Actions</th>";
			//==============================================================
			echo '</tr>';
		echo '</thead>';
		echo '<tbody>';						// TABLE BODY
			foreach (array_reverse($mult_arr) as $key => $arr) {
				echo '<tr>';
				foreach ($arr as $key => $value) {
					if(in_array($key, $format)){
												// cunstome formating
						if($key == 'first_name'){
							echo "<td><a href='profile/{$arr['id']}'>{$value} ";
						} else if ($key == 'last_name'){
							echo "{$value}</a></td>"
						} else {
							echo "<td>{$value}</td>"; // default
						}
					}
				}
				//=====================> Add Actions Here <=================
				echo "<a class='action' href='edit'>edit</a>";
				echo "<a class='action' href='remove'>remove</a>";
				//==========================================================
				echo '</tr>';
			}
		echo '</tbody>';
	echo '</table>';
}

?>
<style>
	.mytable {
		margin-top: 15px;
	}
	.mytable th {
		background-color: #ddd;
	}

	/*.action{
	    margin-left: 10px;
	}*/

</style>


<?php // ---------------------  Test page below  -----------------------------?>

<!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>print_table() Test</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php

		// $format = array(
		// 		'Name' => 'user_name',
		// 		'Email' => 'email'
		// 		);
		//
		// $arr = array(
		// 		array('user_name' => 'Bob', 'email' => 'bob@gmail.com', 'extra' => 'data'),
		// 		array('user_name' => 'Jeff', 'email' => 'jeff@gmail.com', 'extra' => 'data'),
		// 		array('user_name' => 'Tim', 'email' => 'tim@gmail.com', 'extra' => 'data'),
		// 		);
		//
		// print_table($arr,$format);

		?>
	</body>
</html> -->
