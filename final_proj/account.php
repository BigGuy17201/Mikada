<?php		
	session_start();

	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

	if (mysqli_connect_errno())
		exit("Error - Could not connect to MySQL");
?>	
<!DOCTYPE html>
<html lang="EN">

<head>
	<title> Account </title>
	<meta name="description" content="UMBC/wait/food/analysis">
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="account.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js"></script>
	<script type="text/javascript"  src="account.js"></script>
</head>

<body>
	<?php
	$username = $_SESSION['User_Name'];
	?>
	<header class="header">
	
		<div class="header-content">
			<a class="header-content-home" href="home.html">Mikada</a>
			<p class="header-content-desc">Find and report real-time wait times for your favorite dining options on campus based on user reports </p>
		</div>
		
		<img class="header-logo-left" src="images/umbc.png" alt="umbc logo">
		<img class="header-logo-right" src="images/mikada.png" alt="mikada logo">
		<p class="spacer"></p>
		
	</header>
	
	
	<nav class="buttons">
		<a href="rest.html" class="links">Restaurants</a>
		<a href="analytics.html" class="links">Analysis</a>
		<a href="account.php" class="links">Account</a>
		<a href="hoo.html" class="links">Hours of Operation</a>
		<a href="otherp.html" class="links">Other Pages</a>
	</nav>

    <!--Main body of the page-->
    <div class = "main">
	
		<?php
		$constructed_query = "SELECT `First_Name`, `Last_Name`, `Email`, `User_Name` FROM `Users` WHERE User_Name = '$username';";
		
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
				<th> First Name </th>
				<th> Last Name </th>
				<th> User Name </th>
				<th> Email </th>
			</tr>";
			
			for($row_num = 1; $row_num <= $num_rows; $row_num++){
				echo "<tr>";
				$row_array = mysqli_fetch_array($result);
				echo "<td>$row_array[First_Name]</td> <td>$row_array[Last_Name]</td> <td>$row_array[User_Name]</td> <td>$row_array[Email]</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		?>
		
		<form action="logout.php" method="GET">
			<p>
				<input type="submit" value="Sign Out">
			</p>
		</form>
		
		<h2>Settings</h2>
		<form action="settings.php" method="POST">
			<label>Change Password<br>
				<input type="password" name="current_pass" placeholder="Current Password" required>
			</label>
			<br>
			<input type="password" name="new_pass" placeholder="New Password" id="new_pass" required>
			<br>
			<input type="password" name="renew_pass" placeholder="Repeat New Password" id="pass_repeat" required>
			<br>
			<label>Show Notifications?<br>
				<input type="radio" name="noti" value="1">Yes
				<input type="radio" name="noti" value="0">No
			</label>
			<p>
				<input type="submit" value="Submit">
			</p>
		</form>
    </div>
	
</body>

</html>