<?php
	$servername = "localhost";
	$username = "root";
	$password = '';
	$dsn = "mysql:host=$servername;dbname=shop";
	$option = array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

		try {
		    $conn = new PDO($dsn, $username, $password,$option);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "Connected successfully"; 
	    }
		catch(PDOException $e){

	    	echo "Connection failed: " . $e->getMessage();
	    }
?>