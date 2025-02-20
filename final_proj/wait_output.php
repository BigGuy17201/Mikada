<!DOCTYPE html>
<html lang="en">

<head>
	<title> Show Wait </title>
	<meta name="Content-Type" content="UMBC/wait/food/analysis">
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="account.css">
</head>

<body>
	<?php
	session_start();

	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

	if (mysqli_connect_errno())
		exit("Error - Could not connect to MySQL");
	
	$button = $_GET['button'];
	$date = date("Y-m-d");
	
	$constructed_query = "SELECT Restaurant_Name, Current_Wait_Time, Current_TOD, Wait_Date FROM Waits WHERE Wait_Date = '$date' AND Restaurant_Name = '$button' ORDER BY Current_TOD DESC LIMIT 5;";
			
	$result = mysqli_query($db, $constructed_query);
	
	if(! $result){
		echo "Error - query could not be executed";
		$error = mysqli_error();
		echo "<p> . $error . </p>";
		exit;
	}
	else{
		$num_rows = mysqli_num_rows($result);
		echo "<div class='main'>";
		echo "<h1>Current Wait Times</h1>";
		echo "<table border='1'>
		<tr>
			<th> Restaurant Name </th>
			<th> Current Wait Time </th>
			<th> Time of Submission </th>
			<th> Date of Submission </th>
		</tr>";
		
		for($row_num = 1; $row_num <= $num_rows; $row_num++){
			echo "<tr>";
			$row_array = mysqli_fetch_array($result);
			echo "<td>$row_array[Restaurant_Name]</td> <td>$row_array[Current_Wait_Time]</td> <td>$row_array[Current_TOD]</td> <td>$row_array[Wait_Date]</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "</div>";
		
		echo "<div class='center-links'>";
		echo "<a href='rest.html'>Restaurant Page</a>";
		echo "</div>";
	}
	?>

</body>

</html>