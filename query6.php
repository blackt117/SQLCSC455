<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'SELECT Employee.EmployeeID as ID, Employee.HourlyRate as HourlyRate, Employee.State as State, Employee.City as City, Employee.ZipCode as ZipCode, Employee.StreetName as StreetName, Employee.FName as FName, Employee.LName as LName 
	FROM Employee 
	WHERE Employee.Salary is null';
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
    <title>Query 6</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>What Employees are paid hourly?</h2>

	<table>
		<tr>
			<th>ID</th>
			<th>HourlyRate</th>
			<th>State</th>
			<th>City</th>
			<th>ZipCode</th>
			<th>StreetName</th>
			<th>First Name</th>
			<th>Last Name </th>
		</tr>	
		<?php foreach ($all_rows as $record) {
			echo "<tr>";
			echo "<td>".$record['ID']."</td>";
			echo "<td>".$record['HourlyRate']."</td>";
			echo "<td>".$record['State']."</td>";
			echo "<td>".$record['City']."</td>";
			echo "<td>".$record['ZipCode']."</td>";
			echo "<td>".$record['StreetName']."</td>";
			echo "<td>".$record['FName']."</td>";
			echo "<td>".$record['LName']."</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>    
</html>


