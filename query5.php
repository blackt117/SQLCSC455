<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'SELECT m2.MerchName as MerchName,m2.StoreID as StoreID,m2.MerchandiseID as ID, m2.Cost as Cost, m2.Type as Type, m2.MerchName as Name, m2.StoreID as StoreID 
		From Merchandise as m1, Merchandise as m2 
		WHERE m1.MerchName LIKE "Dokken Album" AND m2.Cost > m1.Cost';
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
    <title>Query 5</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Albums more expensive than Dokkens Album</h2>

	<table>
		<tr>
			<th>MerchandiseID</th>
			<th>Cost</th>
			<th>Type</th>
			<th>MerchName</th>
			<th>StoreID</th>
		</tr>	
		<?php foreach ($all_rows as $record) {
			echo "<tr>";
			echo "<td>".$record['ID']."</td>";
			echo "<td>".$record['Cost']."</td>";
			echo "<td>".$record['Type']."</td>";
			echo "<td>".$record['MerchName']."</td>";
			echo "<td>".$record['StoreID']."</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>    
</html>


