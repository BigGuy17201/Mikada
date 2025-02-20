<!DOCTYPE html>
<html lang="en">

<head>
	<title> Other Pages </title>
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
	
		$username = $_SESSION['User_Name'];
	
		$comments = htmlspecialchars($_GET['comments']);

		$comments = mysqli_real_escape_string($db,$comments);
		
		$constructed_query = "INSERT INTO Comments(User_Name, Comment) VALUES('$username','$comments')";
		
		$result = mysqli_query($db, $constructed_query);
		
		if(! $result){
			echo "Error - query could not be executed";
			$error = mysqli_error($db);
			echo "<p> . $error . </p>";
			exit;
		}
		else{
			echo "<h1>Comment Entered</h1>";
			echo "<div class='center-links'>";
			echo "<a href='otherp.html'>Back to Other Pages</a>";
			echo "</div>";
		}
	?>

</body>

</html>