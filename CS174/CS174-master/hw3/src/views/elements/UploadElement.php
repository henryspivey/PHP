<?php


namespace spivotron\hw3\views\elements;
require_once "Element.php";

class UploadElement extends Element {
	
	public function render($data) {
	?>
	    <div class="form">
		    <h1>Log In</h1>
		    <h1 class="centered"><img src="./src/resources/logo.png" alt="Image Rating" /></h1>
		    <form class="centered" id="fileUploadForm" method="post" action="index.php" enctype="multipart/form-data">
	        <label for="fileUpload">Select a File to Upload:</label>
	        <input id="imageFile" type="file" name="imageFile"><br>
	        <label for="captionUpload">Add a caption to your image:</label>
	        <input id="captionUpload" type="text" name="imageCaption" maxlength="100"><br>
	        <input type="submit" class="buttonLink" name="uploadImage" value="Upload"/>            
		    </form>
	    </div>
	<?php
	}
}