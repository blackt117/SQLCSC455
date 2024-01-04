<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	require_once('../mysqli_configGP.php'); //Connect to the database
	$query = "SELECT calcAddress(Employee.StreetName, Employee.City, Employee.State, Employee.ZipCode) as Address, Employee.FName as FName, Employee.LName as LName FROM Employee  WHERE Employee.HourlyRate is null"; 
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
    <title>Addresses of Salary Employees</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>What are the Addresses of Salary Employees?</h2>

	<table>
		<tr>
			<th>Address</th>
			<th>FirstName</th>
			<th>LastName</th>


		</tr>	
		<?php foreach ($all_rows as $book) {
			echo "<tr>";
			echo "<td>".$book['Address']."</td>";
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


