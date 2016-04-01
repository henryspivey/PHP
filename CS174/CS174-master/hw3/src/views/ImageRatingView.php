<?php

namespace soloRider\hw3\views;
require_once "View.php";
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
    </body>
    </html>
    <?php
  }
}
