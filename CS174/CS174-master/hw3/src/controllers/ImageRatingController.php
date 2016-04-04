<?php

namespace soloRider\hw3\controllers;
require_once "Controller.php";
require_once "auth.php";
require_once "src/configs/Config.php";
use soloRider\hw3\config as config;

class ImageRatingController extends Controller {

  function processRequest() {
      $data = [];
      
      // code for gathering photos from db
      ini_set('display_errors',1);
      error_reporting(E_ALL);

      $conn = new \mysqli(config\Config::HOST, config\Config::USER, config\Config::PWD, config\Config::DB);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      } 
      if($conn) {
      	// get the 3 most recently uploaded images
        $retrieve = "SELECT * FROM Images ORDER BY 'upload_time' DESC LIMIT 3";
        if (!$conn->query($retrieve) === TRUE) {
            echo "Error: " . $conn->error . "<br/>";
        } else {

	        $data['retrieve'] = $conn->query($retrieve);
	        if ($data['retrieve']->num_rows > 0) {
	          // output data of each row            	
	          while($row = $data['retrieve']->fetch_assoc()) {              		
	        		$title = $row["title"];
	        		$user = $row["user_id"];
	        		$caption = $row["caption"];
	        		$data['USER'] = $user;
	        		$data['TITLE'] = $title;
	        		$data['CAPTION'] = $caption;

	          }              
	        } else {
	          echo "0 results";
	        }
	        
        }
      }
			if(isset($_REQUEST['rating'])){

				$rating = $_REQUEST['rating'];		
				// $ratingSQL = "INSERT INTO ratings (image_title, rating, ratings) VALUES ('$title', '$rating', ratings = ratings+1)";
				// if (!$conn->query($ratingSQL) === TRUE) {
				//     echo "Error: " . $conn->error . "<br/>";
				// } else {
				//   $updateRatings = $conn->query($ratingSQL);
				// }				

				if (isset($_REQUEST['imageToRate'])) {
					$titleOfImageToUpdate = $_REQUEST['imageToRate'];
					
					$sql = "UPDATE Images SET rating = '$rating' WHERE title = '$titleOfImageToUpdate'";
					if (!$conn->query($sql) === TRUE) {
					    echo "Error: " . $conn->error . "<br/>";
					} else {
					  $updateImages = $conn->query($sql);
					}
				}			
			
			}
			$conn->close();
      $data['UPLOADED_FILE'] = $this->sanitize("imageFile", "file");
      $data['UPLOADED_FILE_VALID'] = $this->validate("imageFile", "file");

      $this->view("imageRating")->render($data);
  }
}
