<?php
function connectToDB() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "visitors";

		// Create connection
		$conn = new mysqli("$servername", "$username", "$password", "$dbname");

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		
		return $conn;
	}
?>