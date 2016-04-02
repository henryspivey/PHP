<?php


//required for the constants
require_once "Config.php";
use soloRider\hw3\config as config;

//Establish connection to database
$conn = new mysqli(config\Config::HOST, config\Config::USER, config\Config::PWD, "");
//Check connection was successful
if($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error . "\n";
}
//Create the database
$sql = "CREATE DATABASE " . config\Config::DB;
if($conn->query($sql) === TRUE) {
    echo "Database " . Config::DB . " created successfully \n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}
//Create the USER table
$conn->select_db(config\Config::DB);
$userTable = "CREATE TABLE USER(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(32) NOT NULL,
    fileName VARCHAR(30),
    caption VARCHAR(100),
    rating INT(1),
    timeUploaded TIMESTAMP)";

//Query for creating table Images
$imageTable = "CREATE TABLE Images (
  title VARCHAR(30) PRIMARY KEY,
  user_id VARCHAR(30),
  caption VARCHAR(50),
  upload_time DATETIME,
  rating TINYINT
  )";

$ratingTable = "CREATE TABLE ratings(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	image_title VARCHAR(30),
	rating TINYINT
)";

if ($conn->query($userTable) === TRUE && $conn->query($imageTable) === TRUE  && $conn->query($ratingTable) === TRUE) {
    echo "Tables created \n";
} else {
    echo "Error creating tables: " . $conn->error . "\n";
}
$conn->close();

