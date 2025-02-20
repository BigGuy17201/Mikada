<?php		
	session_start();

	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

	if (mysqli_connect_errno())
		exit("Error - Could not connect to MySQL");
?>	
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
		$user = htmlspecialchars($_POST['user']);
		$pass = htmlspecialchars($_POST['pass']);

		$user = mysqli_real_escape_string($db,$user);
		$pass = mysqli_real_escape_string($db,$pass);
		
		if(empty($user)) {
			echo "<h1> Please enter username </h1>";
			echo "<div class='center-links'>";
			echo "<a href='login.html'>Try again</a>";
			echo "</div>";
		}
		else {
			if(empty($pass)) {
				echo "<h1> Please enter password </h1>";
				echo "<div class='center-links'>";
				echo "<a href='login.html'>Try again</a>";
				echo "</div>";
			}
			else {
				$constructed_query = "SELECT * FROM `Users` WHERE User_Name = '$user' AND Password = '$pass'";
				
				$result = mysqli_query($db, $constructed_query);
				
				$row = mysqli_fetch_assoc($result);

				if($row['User_Name'] == $user && $row['Password'] == $pass) {
					echo "<h1>Welcome to Mikada</h1>";
					echo "<div class='center-links'>";
					echo "<a href='home.html'>Home</a>";
					echo "</div>";
					$_SESSION['User_Name']=$user;
				}
				else {
					echo "<h1> Invalid Username or Password </h1>";
					echo "<div class='center-links'>";
					echo "<a href='login.html'>Please try again</a>";
					echo "</div>";
				}
			}
		}
	?>

</body>

</html>