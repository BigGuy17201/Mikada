<?php		
	session_start();

	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

	if (mysqli_connect_errno())
		exit("Error - Could not connect to MySQL");
?>	
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Logout </title>
	<meta name="Content-Type" content="UMBC/wait/food/analysis">
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="account.css">
</head>

<body>
	<?php		
		session_unset();
		session_destroy();
		echo "<h1>Logging Out</h1>";
		echo "<div class='center-links'>";
		echo "<a href='mikada.html'>Return to Homepage</a>";
		echo "</div>";
	?>

</body>

</html>