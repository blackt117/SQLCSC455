<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	require_once('../mysqli_configGP.php'); //Connect to the database
	$query = 'SELECT Employee.EmployeeID as EmployeeID, Store.StoreID as StoreID, Store.Revenue as Revenue, Store.City as SCity, Store.StreetName as SStreetName, Store.ZipCode as SZipCode, Store.State as SState, Employee.Salary as Salary, Employee.HourlyRate as HourlyRate, Employee.State as EState, Employee.City as ECity, Employee.ZipCode as EZipCode, Employee.StreetName as EStreetName, Employee.FName as FName, Employee.LName as LName
    FROM Store JOIN Employ USING (StoreID) JOIN Employee USING (EmployeeID)';
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
    <title>EmployeeStore</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>What Employees work at which Stores?</h2>

	<table>
		<tr>
			<th>EmployeeID</th>
			<th>StoreID</th>
			<th>Revenue</th>
			<th>City</th>
			<th>StreetName</th>
			<th>ZipCode</th>
			<th>State</th>
			<th>Salary</th>
			<th>HourlyRate</th>
			<th>State</th>
			<th>City</th>
			<th>ZipCode</th>
			<th>StreetName</th>
			<th>FirstName</th>
			<th>LastName</th>

	


		</tr>	
		<?php foreach ($all_rows as $book) {
			echo "<tr>";
			echo "<td>".$book['EmployeeID']."</td>";
			echo "<td>".$book['StoreID']."</td>";
			echo "<td>".$book['Revenue']."</td>";
			echo "<td>".$book['SCity']."</td>";
			echo "<td>".$book['SStreetName']."</td>";
			echo "<td>".$book['SZipCode']."</td>";
			echo "<td>".$book['SState']."</td>";
			echo "<td>".$book['Salary']."</td>";
			echo "<td>".$book['HourlyRate']."</td>";
			echo "<td>".$book['EState']."</td>";
			echo "<td>".$book['ECity']."</td>";
			echo "<td>".$book['EZipCode']."</td>";
			echo "<td>".$book['EStreetName']."</td>";
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


