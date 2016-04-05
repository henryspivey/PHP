<?php

namespace spivotron\hw3\views;
require_once "View.php";
class CreateAccountView extends View {
    /**
     * Draw the web page to the browser
     */
    public function render($data) {
    	?>
    	<!doctype html>
    	<html>
    	<head> 
    		<link rel="stylesheet" type="text/css" href="src/views/css/style.css">
    	</head>
	    	<div class="form">
		    	<h1>Registration</h1>
		    	<form>
			    	<input type="text" name="username" placeholder="Username" required />
			    	<input type="email" name="email" placeholder="Email" required />
			    	<input type="password" name="password" placeholder="Password" required />
			    	<button type="submit">Submit</button>
		    	</form>

	    	</div>
    	</html>
    	<?php
    }
}
