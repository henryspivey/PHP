<?php
namespace dbconnect;

class connectToDB {
	static function connect() {
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "HW3";
			// Create connection
			$conn = new \mysqli("$servername", "$username", "$password", "$dbname");
			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}	
			return $conn;
		}
}