<?php

namespace spivotron\hw3\views;
require_once "View.php";
require_once "src/configs/Config.php";
use spivotron\hw3\config as config;

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
      <h1 class="centered">CS174 Image Rating</h1>
      <?php if(!isset($_SESSION['username'])) { ?>
          <form method="post" action="index.php">
              <input type="submit" class="buttonLink" name="signIn" value="Sign-in/Sign-up"/>
          </form>
      <?php } elseif($_SESSION['username']) { ?>
          <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
      <?php } ?>
      <?php if(isset($_SESSION['username'])) { ?>
          <form class="centered" method="post" action="index.php">
            <input type="submit" id="uploadLink" name="uploadImage" value="Upload an Image">
          </form>
      <?php } ?>

    <h2>Recent Items</h2>
    	<?php if ($data['retrieve'] and isset($_SESSION["username"])) { ?>
    	<div class='flex-container'>
      <?php if (isset($data['NUMROWS'])) { ?>  
    	<?php for ($i=0; $i < $data['NUMROWS']; $i++) { ?>
				<div class='image-container'>
					<?php if($_SESSION['username']) { ?>

					<img src="<?php echo "src/resources/" . $data['ALLIMAGES'][$i]['TITLE']?>" height='300' width='200'/>
					<p>Submitted by:<?php echo $data['ALLIMAGES'][$i]['USER'] ?></p>
					<p>Caption: <?php echo $data['ALLIMAGES'][$i]['CAPTION'] ?></p> 
					<?php if (isset($data['ALLIMAGES'][$i]['RATING'])) { ?>
					<p>Average Rating: <?php echo $data['ALLIMAGES'][$i]['RATING']; }?></p>
					<p> <?php if(!$data['ALLIMAGES'][$i]['RATING']) {?> Not rated yet <?php } ?></p>
				</div>
      <?php } ?>
			<form action='index.php' method='post'>
				<label for='Rating'>Rate <?php echo $data['ALLIMAGES'][$i]['TITLE'] ?> </label>
				<select name='rating'>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
				</select>
				<button type='submit' name="imageToRate" value=<?php echo $data['ALLIMAGES'][$i]['TITLE']?> >Rate</button>
			</form>
					
      <?php }  
        } else {
          echo "0 results";
        }        	
      } else {
        echo "Sign in to see cool photos";
      }
    ?>
    </div>
    <h2>Popular Items</h2>
    <?php if ($data['popular'] and isset($_SESSION["username"])) { ?>
    	<div class='flex-container'>
      <?php if (isset($data['NUMROWS_POPULAR'])) { ?>  
    	<?php for ($i=0; $i < $data['NUMROWS_POPULAR']; $i++) { ?>
				<div class='image-container'>
					<?php if($_SESSION['username']) { ?>

					<img src="<?php echo "src/resources/" . $data['ALLIMAGES_POPULAR'][$i]['TITLE']?>" height='300' width='200'/>
					<p>Submitted by:<?php echo $data['ALLIMAGES_POPULAR'][$i]['USER'] ?></p>
					<p>Caption: <?php echo $data['ALLIMAGES_POPULAR'][$i]['CAPTION'] ?></p> 
				</div>
      <?php } ?>
		
					
      <?php }  
        } else {
          echo "0 results";
        }        	
      } else {
        echo "Sign in to see cool photos";
      }
      ?>
      </div>
    </body>
    </html>
    <?php
  }
}
