<?php

namespace soloRider\hw3\views;
require_once "View.php";
require_once "src/configs/Config.php";
use soloRider\hw3\config as config;

class ImageRatingView extends View {

  public function render($data) {
  ?>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <title>Image Rating</title>
        <link href="./src/resources/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="src/views/css/style.css" />
      </head>
    <body>
      <h1 class="centered"><img src="./src/resources/logo.png" alt="Image Rating" /></h1>
      <?php if(!$_SESSION['username']) { ?>
          <form method="post" action="index.php">
              <input type="submit" class="buttonLink" name="signIn" value="Sign-in/Sign-up"/>
          </form>
      <?php } elseif($_SESSION['username']) { ?>
          <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
      <?php } ?>
      <?php if($_SESSION['username']) { ?>
          <form class="centered" method="post" action="index.php">
            <input type="submit" id="uploadLink" name="uploadImage" value="Upload an Image">
          </form>
      <?php } ?>
    <?php
      if (!empty($data['UPLOADED_FILE'])) {
    ?>
      <p>The last file uploaded was:</p>
      <p><?=$data['UPLOADED_FILE'] ?></p>
    <?php
    if (isset($data['UPLOADED_FILE_VALID']) &&
        $data['UPLOADED_FILE_VALID'] == true) {
      ?>
        <p>The uploaded file is a valid JPEG file!</p>
      <?php
    } else {
      ?>
        <p>The uploaded file was not a valid JPEG file!</p>
      <?php
    }
    }
    ?>
    <h2>Recent Items</h2>
      <?php 
        // Create connection
        //echo config\Config::HOST; how to use namespace constants properly :)
        $conn = new \mysqli(config\Config::HOST, config\Config::USER, config\Config::PWD, config\Config::DB);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        } 
        if($conn) {
          $retrieve = "SELECT * FROM Images ORDER BY 'upload_time' DESC LIMIT 3";
          if (!$conn->query($retrieve) === TRUE) {
              echo "Error: " . $conn->error . "<br/>";
          } else {
            
            $result = $conn->query($retrieve);

            if ($result->num_rows > 0) {
                // output data of each row
              	echo "<div class='flex-container'>";
                while($row = $result->fetch_assoc()) {
                		echo "<div class='image-container'>";
                		$title = $row["title"];
                		$user = $row["user_id"];
                		$caption = $row["caption"];
                		echo "<img src='src/resources/$title' height='300' width='200'/>";
                		echo "<p>Submitted by: " . $user . "</p>";
                		echo "<p>Caption: " . $caption . "</p>"; 
                    echo "</div>";
                    echo "<form action='index.php' method='post'>
														<label for='Rating'>Rate this image: </label>
														<select name='rating'>
															<option value='1'>1</option>
															<option value='2'>2</option>
															<option value='3'>3</option>
															<option value='4'>4</option>
															<option value='5'>5</option>
														</select>
														<input type='submit' value='Rate this!' />
													</form>";
										if(isset($_REQUEST['rating'])){
											$rating = $_REQUEST['rating'];											
											$sql = "UPDATE Images SET rating = '$rating' WHERE title = '$title'";
											
											if (!$conn->query($sql) === TRUE) {
											    echo "Error: " . $conn->error . "<br/>";
											} else {
											  $updateImages = $conn->query($sql);
											}
										}
                }
                echo "</div>";
            } else {
                echo "0 results";
            }
            $conn->close();

          }
        }
        ?>
    <h2>Popular Items</h2>
    </body>
    </html>
    <?php
  }
}
