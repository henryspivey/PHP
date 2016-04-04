<?php

namespace soloRider\hw3\controllers;
require_once "Controller.php";


class UploadImageController extends Controller {

    function processRequest() {
        $data = [];
        session_start();
        // Display any errors
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        $goodToGo = 1;
        // Saving the path
        $uploaddir = 'src/resources/';
        
        if (isset($_FILES['imageFile'])) {
        
           $uploadfile = $uploaddir . basename($_FILES['imageFile']['name']);
           $uploadfile = str_replace(' ', '', $uploadfile);
           $imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
           // Check if file already exists
           if (file_exists($uploadfile)) {
               echo "File already exists!" . "<br/>";
               $goodToGo = 0;
           }
           // Check file size
           if ($_FILES["imageFile"]["size"] > 2000000) {
               echo "Too big!" . "<br/>";
               $goodToGo = 0;
           }
           // Only allow jpeg, jpg, and png
           if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
               echo "Sorry, only JPG, JPEG, & PNG files are allowed." . "<br/>";
               $goodToGo = 0;
           }
           // If all is good, complete the upload.
           if ($goodToGo == 1) {
               if (move_uploaded_file($_FILES['imageFile']['tmp_name'], "$uploadfile")) {
                   echo "File uploaded!" . "<br/>";
                   /* ADDING IMAGE INFO TO DATABASE */
                   $conn = $this->connect();

                   $title = $_FILES['imageFile']['name'];
                   $title = str_replace(' ', '', $title);
                   $user_id = $_SESSION["username"];
                   $caption = $_POST['imageCaption'];
                   $date = date("Y-m-d H:i:s");
                   // Writes the information to the database
                   // Inserts current time into the upload_time field
                   // Inserts rating as null
                   $insert = "INSERT INTO Images VALUES ('$title', '$user_id', '$caption', '$date', null)";
                   if (!$conn->query($insert) === TRUE) {
                       echo "Error: " . $conn->error . "<br/>";
                   }
                   $conn->close();
               } else {
                   echo "There was an error uploading your file " . "<br/> " . "<form class='centered' method='post' action='index.php'>
                        <input type='submit' id='uploadLink' name='uploadImage' value='Upload an Image'></form> <br>
                        <form method='post' action='index.php'>
                            <input type='submit' class='buttonLink' value='Go to home page'/>
                        </form>
                        ";
          
               }
           } else { 
            echo "There was a problem uploading the image." .  "<form class='centered' method='post' action='index.php'> <input type='submit' id='uploadLink' name='uploadImage' value='Upload an Image'></form>
            <br>
            <form method='post' action='index.php'>
                <input type='submit' class='buttonLink' value='Go to home page'/>
            </form>";
           }
       } else {
        // this will only be called when the user doesn't enter anything
          $data['UPLOADED_FILE'] = $this->sanitize("imageFile", "file");
          $data['UPLOADED_FILE_VALID'] = $this->validate("imageFile", "file");

          $this->view("UploadImage")->render($data);
       }
    }
}
