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
	
	$restaurant = htmlspecialchars($_GET['restaurant']);
	$wait = htmlspecialchars($_GET['userWaitTime']);

	$restaurant = mysqli_real_escape_string($db,$restaurant);
	$wait = mysqli_real_escape_string($db,$wait);
	$time = date("H:i:s");
	$date = date("Y-m-d");
	
	if(empty($wait)) {
		echo "<h1> Please Enter Wait Time </h1>";
		echo "<div class='center-links'>";
		echo "<a href='rest.html'>Try again</a>";
		echo "</div>";
	}
	else {
		$constructed_query = "INSERT INTO Waits (Restaurant_Name, Current_Wait_Time, Current_TOD, Wait_Date) VALUES ('$restaurant', '$wait', '$time', '$date');";
		
		$result = mysqli_query($db, $constructed_query);
		echo "<h1>Wait Entered</h1>";
		echo "<div class='center-links'>";
		echo "<a href='rest.html'>Restaurant Page</a>";
		echo "</div>";

	}
	?>

</body>

</html>