<!DOCTYPE html>
<html lang="en">

<head>
	<title> Signup </title>
	<meta name="Content-Type" content="UMBC/wait/food/analysis">
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="account.css">
</head>

<body>
	<?php
		$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");
		
		$fname = htmlspecialchars($_POST['fname']);
		$lname = htmlspecialchars($_POST['lname']);
		$user = htmlspecialchars($_POST['user']);
		$pass = htmlspecialchars($_POST['pass']);
		$pass_repeat = htmlspecialchars($_POST['pass_repeat']);
		$email = htmlspecialchars($_POST['email']);

		$fname = mysqli_real_escape_string($db,$fname);
		$lname = mysqli_real_escape_string($db,$lname);
		$user = mysqli_real_escape_string($db,$user);
		$pass = mysqli_real_escape_string($db,$pass);
		$pass_repeat = mysqli_real_escape_string($db,$pass_repeat);
		$email = mysqli_real_escape_string($db,$email);
		
		if($pass == $pass_repeat){
			$constructed_query = "SELECT * FROM Users WHERE User_Name = '$user'";
			$result = mysqli_query($db, $constructed_query);
			$num_rows = mysqli_num_rows($result);
			if($num_rows > 0){
				echo "<h1>Username Taken</h1>";
				echo "<div class='center-links'>";
				echo "<a href='signup.html'>Please try again</a>";
				echo "<h2>OR</h2>";
				echo "<a href='login.html'>Login</a>";
				echo "</div>";
			}
				
			else{
				$constructed_query = "SELECT * FROM Users WHERE Email = '$email'";
				$result = mysqli_query($db, $constructed_query);
				$num_rows = mysqli_num_rows($result);
				if($num_rows > 0){
					echo "<h1>Email In Use</h1>";
					echo "<div class='center-links'>";
					echo "<a href='signup.html'>Please try again</a>";
					echo "<h2>OR</h2>";
					echo "<a href='login.html'>Login</a>";
					echo "</div>";
				}
					else{
						$constructed_query = "INSERT INTO `Users`(`First_Name`, `Last_Name`, `User_Name`, `Password`, `Email`) VALUES ('$fname','$lname','$user','$pass', '$email')";
						$result = mysqli_query($db, $constructed_query);
						if(! $result){
							echo "Error - query could not be executed";
							$error = mysqli_error($db);
							echo "<p> . $error . </p>";
							exit;
						}
						else{
							echo "<h1>Please Log In</h1>";
							echo "<div class='center-links'>";
							echo "<a href='login.html'>Login</a>";
							echo "</div>";
						}
					}
			}
		}
		
		else{
			echo "<h1>Your passwords do not match</h1>";
			echo "<div class='center-links'>";
			echo "<a href='signup.html'>Please try again</a>";
			echo "</div>";		
		}
	?>

</body>

</html>