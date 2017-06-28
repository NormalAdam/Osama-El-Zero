<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dp = "shop";
	// Create connection
	 $conn = mysqli_connect($servername, $username, $password,$dp);
	
	// Check connection
	if (!$conn) {
		//die("Connection failed: " . mysqli_connect_error());
	}else
		//echo "Connected successfully";
?>