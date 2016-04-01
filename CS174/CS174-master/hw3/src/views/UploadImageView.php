<?php

namespace soloRider\hw3\views;

use solorider\hw3\views\elements as e;
require_once "View.php";
require_once "elements/UploadElement.php";

class UploadImageView extends View {

  public function render($data) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
      <head>
          <title>Image Rating Upload</title>
          <link href="./src/resources/favicon.ico" rel="shortcut icon" type="image/x-icon" />
          <link rel="stylesheet" href="src/views/css/style.css" />
          <meta charset="utf-8"/>
      </head>
      <body>
        <h1 class="centered"><img src="./src/resources/logo.png" alt="Image Rating" /></h1>
        <form class="centered" id="fileUploadForm" method="post" action="index.php" enctype="multipart/form-data">
            <label for="fileUpload">Select a File to Upload:</label>
            <input id="imageFile" type="file" name="imageFile"><br>
            <label for="captionUpload">Add a caption to your image:</label>
            <input id="captionUpload" type="text" name="imageCaption" maxlength="100"><br>
            <input type="submit" class="buttonLink" name="uploadImage" value="Upload"/>            
        </form>
        
      </body>
    </html>
    <?php
  }
}
