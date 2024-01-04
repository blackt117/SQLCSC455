<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'CALL salaryDIST(@minimum , @maximum , @average)';
	$query2 = 'SELECT @minimum as MinimumSalary, @maximum as MaxmiumSalary, @average as AverageSalary';
	$result = mysqli_query($dbc, $query);
	$result2 = mysqli_query($dbc, $query2);
	//Fetch all rows of result as an associative array
	if($result2)
		$all_rows= mysqli_fetch_all($result2, MYSQLI_ASSOC); //get the result as an associative, 2-dimensional array
	else { 
		echo "<h2>We are unable to process this request right now.</h2>"; 
		echo "<h3>Please try again later.</h3>";
		exit;
	} 
	mysqli_close($dbc);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CSC455Final Query 9</title>
		<meta charset ="utf-8"> 
	</head>
	<body>
		<h2>Salary Distribution</h2>
	
		<table>
			<tr>
				<th>Minimum Salary</th>
				<th>Maximum Salary</th>
				<th>Average Salary</th>
			</tr>	
			<?php foreach ($all_rows as $client) {
				echo "<tr>";
				echo "<td>".$client['MinimumSalary']."</td>";
				echo "<td>".$client['MaxmiumSalary']."</td>";
				echo "<td>".$client['AverageSalary']."</td>";
				echo "</tr>";
			}
			?>
		</table>
		<hr>
		<a href="./CSC455Final.php">Return To Main</a>
	</body>    
</html>