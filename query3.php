<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	require_once('../../mysqli_config.php'); //Connect to the database
	$query = 'SELECT Employee.EmployeeID as EmployeeID, Employee.FName as FName, Employee.LName as LName, Count(*) as NumberCount 
    FROM Employee JOIN Sell USING (EmployeeID) 
    GROUP By Employee.EmployeeID 
    Having NumberCount > 1; ';
	$result = mysqli_query($dbc, $query);
	//Fetch all rows of result as an associative array
	if($result)
		$all_rows= mysqli_fetch_all($result, MYSQLI_ASSOC); //get the result as an associative, 2-dimensional array
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
	<!--Christian Boyer-->
    <title>EmployeeTransaction</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>What Employee has had more than 1 sales transaction lately?</h2>

	<table>
		<tr>
			<th>EmployeeID</th>
			<th>FName</th>
			<th>LName</th>
			<th>NumberCount</th>
		</tr>	
		<?php foreach ($all_rows as $client) {
			echo "<tr>";
			echo "<td>".$client['EmployeeID']."</td>";
			echo "<td>".$client['FName']."</td>";
			echo "<td>".$client['LName']."</td>";
			echo "<td>".$client['NumberCount']."</td>";
			echo "</tr>";
		}
		?>
	</table>
    <hr>
    <a href="https://ada.cis.uncw.edu/~pmj3349/CSC455Final.php">Return to Main</a>
</body>    
</html>


