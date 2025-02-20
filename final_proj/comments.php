<!DOCTYPE html>
<html lang="en">

<head>
	<title> Show Comments </title>
	<meta name="Content-Type" content="UMBC/wait/food/analysis">
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="otherp.css">
</head>

<body>
	<?php
	session_start();

	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

	if (mysqli_connect_errno())
		exit("Error - Could not connect to MySQL");
	
	$constructed_query = "SELECT User_Name, Comment FROM Comments ORDER BY Comment_ID Desc LIMIT 5;";
			
	$result = mysqli_query($db, $constructed_query);
	
	if(! $result){
		echo "Error - query could not be executed";
		$error = mysqli_error();
		echo "<p> . $error . </p>";
		exit;
	}
	else{
		$num_rows = mysqli_num_rows($result);
		echo "<div class='center'>";
		echo "<h1>Comments</h1>";
		echo "<table border='1'>
		<tr>
			<th> Username </th>
			<th> Comment </th>
		</tr>";
		
		for($row_num = 1; $row_num <= $num_rows; $row_num++){
			echo "<tr>";
			$row_array = mysqli_fetch_array($result);
			echo "<td>$row_array[User_Name]</td> <td>$row_array[Comment]</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "</div>";
		
		echo "<div class='center-links'>";
		echo "<br>";
		echo "<a href='otherp.html'>Return</a>";
		echo "</div>";
	}
	?>

</body>

</html>