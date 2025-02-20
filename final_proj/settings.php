<?php		
	session_start();

	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

	if (mysqli_connect_errno())
		exit("Error - Could not connect to MySQL");
?>	
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Settings </title>
	<meta name="Content-Type" content="UMBC/wait/food/analysis">
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="account.css">
</head>

<body>
	<?php
		$username = $_SESSION['User_Name'];
	
		$current_pass = htmlspecialchars($_POST['current_pass']);
		$new_pass = htmlspecialchars($_POST['new_pass']);
		$renew_pass = htmlspecialchars($_POST['renew_pass']);
		$notifications = htmlspecialchars($_POST['noti']);

		$current_pass = mysqli_real_escape_string($db,$current_pass);
		$new_pass = mysqli_real_escape_string($db,$new_pass);
		$renew_pass = mysqli_real_escape_string($db,$renew_pass);
		$notifications = mysqli_real_escape_string($db,$notifications);
		
		
		$constructed_query = "SELECT * FROM Users WHERE Password = '$current_pass'";
		$result = mysqli_query($db, $constructed_query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows > 0){
			if($new_pass === $renew_pass){
				 // Update password
				$update_password_query = "UPDATE Users SET Password = '$new_pass' WHERE BINARY Password = '$current_pass' AND User_Name = '$username'";
				$password_updated = mysqli_query($db, $update_password_query);

				// Update notifications
				$update_notifications_query = "UPDATE Users SET Notifications = '$notifications' WHERE User_Name = '$username'";
				$notifications_updated = mysqli_query($db, $update_notifications_query);

				if ($password_updated && $notifications_updated) {
					echo "<h1> Settings Updated </h1>";
					echo "<div class='center-links'>";
					echo "<a href='account.php'>Return</a>";
					echo "</div>";
				} else {
					echo "<h1>Error updating settings</h1>";
				}
			}
			else{
				echo "<h1> New Passwords do not Match </h1>";
				echo "<div class='center-links'>";
				echo "<a href='account.php'>Please try again</a>";
				echo "</div>";
			}
		}
		else {
			echo "<h1> Incorrect Password </h1>";
			echo "<div class='center-links'>";
			echo "<a href='account.php'>Please try again</a>";
			echo "</div>";
		}
	?>

</body>

</html>