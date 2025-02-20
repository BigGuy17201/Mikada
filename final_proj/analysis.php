<!DOCTYPE html>
<html lang="en">

<head>
	<title> Login </title>
	<meta name="Content-Type" content="UMBC/wait/food/analysis">
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="account.css">
</head>

<body>
	<?php		
		$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

		if (mysqli_connect_errno())
			exit("Error - Could not connect to MySQL");
	
		$restaurant = htmlspecialchars($_GET['restaurant']);

		$restaurant = mysqli_real_escape_string($db,$restaurant);
		
		if(empty($restaurant)) {
			echo "<h1> Please Enter Restaurant Name </h1>";
			echo "<div class='center-links'>";
			echo "<a href='analytics.html'>Try again</a>";
			echo "</div>";
		}
		else {
			$constructed_query = "SELECT MIN(Current_Wait_Time), Restuarant_Name from Waits WHERE Restaurant_Name = '$restaurant';";
		
			$result = mysqli_query($db, $constructed_query);
			
			if(! $result){
				echo "Error - query could not be executed";
				$error = mysqli_error();
				echo "<p> . $error . </p>";
				exit;
			}
			else{
				$num_rows = mysqli_num_rows($result);
			
				$num_fields = mysqli_num_fields($result);

				echo "<table border='1'>
				<tr>
					<th> Restaurant Name </th>
					<th> Current Shortest Wait </th>
				</tr>";
				
				for($row_num = 1; $row_num <= $num_rows; $row_num++){
					echo "<tr>";
					$row_array = mysqli_fetch_array($result);
					echo "<td>$row_array[Restaurant_Name]</td> <td>$row_array[Current_Wait_Time]</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}