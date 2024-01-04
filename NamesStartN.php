<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	require_once('../mysqli_configGP.php'); //Connect to the database
	$query = 'SELECT Employee.EmployeeID as ID, Employee.HourlyRate as HourlyRate, Employee.State as State, Employee.City as City, Employee.ZipCode as ZipCode, Employee.StreetName as StreetName, Employee.FName as FName, Employee.LName as LName  FROM Employee  WHERE Employee.FName LIKE "N%"';
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
    <title>NamesN</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>What Employees have their First Name start with N</h2>

	<table>
		<tr>
			<th>EmployeeID</th>
			<th>HourlyRate</th>
			<th>State</th>
			<th>City</th>
			<th>ZipCode</th>
			<th>StreetName</th>
			<th>FName</th>
			<th>LName</th>


		</tr>	
		<?php foreach ($all_rows as $book) {
			echo "<tr>";
			echo "<td>".$book['ID']."</td>";
			echo "<td>".$book['HourlyRate']."</td>";
			echo "<td>".$book['State']."</td>";
			echo "<td>".$book['City']."</td>";
			echo "<td>".$book['ZipCode']."</td>";
			echo "<td>".$book['StreetName']."</td>";
			echo "<td>".$book['FName']."</td>";
			echo "<td>".$book['LName']."</td>";
			echo "</tr>";
		}
		?>
	</table>
<hr>
    <a href="https://ada.cis.uncw.edu/~pmj3349/CSC455Final.php">Back to Main<ain</href>
</body>    
</html>


