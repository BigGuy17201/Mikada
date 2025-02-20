<?php

$email=$_GET["email"];

//Connect to the SQL Database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

$constructed_query = "SELECT Email FROM Users WHERE Email = '$email'";

//execute your query
$result = mysqli_query($db, $constructed_query);

$row_array = mysqli_fetch_array($result);

$num_rows = mysqli_num_rows($result);
	
if ($num_rows >= 1)
{
	$response="Taken";
}
else{
	$response = "Available";
}
echo $response;
	