<?php


	$username = "root"; // user must have privileges to create DB
	$password = "root";
	$conn = new mysqli("127.0.0.1", $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully\n";
	// Create database
	$create = "CREATE DATABASE HW3";
	if ($conn -> query($create) === TRUE) {
	    echo "Database created successfully\n";
	} else {
	    echo "Error creating database: " . $conn -> error . "\n";
	}
	// Switch to databsae
	$conn -> select_db('HW3');
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