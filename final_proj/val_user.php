<?php

$user=$_GET["user"];

//Connect to the SQL Database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nathane1","nathane1","nathane1");

//Construct your query to extract all users names in MySQL database
$constructed_query = "SELECT User_Name FROM Users where User_Name= '$user'";

//execute your query
$result = mysqli_query($db, $constructed_query);

//Place your username values in an array 
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
	