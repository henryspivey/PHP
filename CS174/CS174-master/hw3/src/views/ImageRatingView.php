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

    <h2>Recent Items </h2>
    	<?php if ($data['retrieve']) { ?>
              <?php  if($data['retrieve']->num_rows > 0) { ?>
            	<div class='flex-container'>              
              		<div class='image-container'>
              		<?php if($_SESSION['username']) { ?>
              		<img src="<?php echo "src/resources/$data[TITLE]"?>" height='300' width='200'/>
              		<p>Submitted by:<?php echo $data['USER'] ?></p>
              		<p>Caption: <?php echo $data['CAPTION'] ?></p> 
                  </div>
                  <form action='index.php' method='post'>
													<label for='Rating'>Rate <?php echo $data['TITLE'] ?> </label>
													<select name='rating'>
														<option value='1'>1</option>
														<option value='2'>2</option>
														<option value='3'>3</option>
														<option value='4'>4</option>
														<option value='5'>5</option>
													</select>
													<button type='submit' name="imageToRate" value=<?php echo $data['TITLE']?> >Rate</button>
												</form>
									
              <?php } 
              	
              }
            }
              ?>
              </div>
    <h2>Popular Items</h2>
    </body>
    </html>
    <?php
  }
}
