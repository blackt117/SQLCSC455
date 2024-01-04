<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	require_once('../../mysqli_config.php'); //Connect to the database
	$query = 'SELECT ROUND(AVG(Merchandise.Cost),2) as AvgCost 
    FROM Merchandise; ';
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
    <title>AvgMerchandiseCost</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>What is the average cost of our merchandise?</h2>

	<table>
		<tr>
			<th>AvgCost</th>
		</tr>	
		<?php foreach ($all_rows as $client) {
			echo "<tr>";
			echo "<td>".$client['AvgCost']."</td>";
			echo "</tr>";
		}
		?>
	</table>
    <hr>
    <a href="https://ada.cis.uncw.edu/~pmj3349/CSC455Final.php">Return to Main</a>
</body>    
</html>


