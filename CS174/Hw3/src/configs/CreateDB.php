<?php

	include("Config.php");

	$conn = new mysqli(HOST, USER, PASS, '');
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully\n";
	// Create database
	$create = "CREATE DATABASE " . DB;
	if ($conn -> query($create) === TRUE) {
	    echo "Database created successfully\n";
	} else {
	    echo "Error creating database: " . $conn -> error . "\n";
	}
	// Switch to databsae
	$conn -> select_db(DB);
	// Query for creating table Users
	$userTable = "CREATE TABLE users (
	  id INT(6) AUTO_INCREMENT PRIMARY KEY,
	  username VARCHAR(20),
	  email VARCHAR(320),
	  password VARCHAR(20
	  ))";
	//Query for creating table Images
	$imageTable = "CREATE TABLE Images (
	  title VARCHAR(30) PRIMARY KEY,
	  user_id VARCHAR(30),
	  caption VARCHAR(50),
	  upload_time DATETIME,
	  rating TINYINT
	  )";
	// Print results :)
	if ($conn->query($userTable) === TRUE && $conn->query($imageTable) === TRUE) {
	    echo "Tables created successfully\n";
	} else {
	    echo "Error creating tables: " . $conn->error . "\n";
	}
	$conn->close();

?>