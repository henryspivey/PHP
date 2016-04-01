<?php


namespace solorider\hw3\views\elements;
require_once "Element.php";

class SignInHelper extends Element {
	public function render($data) {
	?>
	    <div class="form">
	    <h1>Log In</h1>
	    <form action="" method="post" name="login">
	      <input type="text" name="username" placeholder="Username" required />
	      <input type="password" name="password" placeholder="Password" required />
	      <form>
	        <input type="submit" class="buttonLink" name="signIn" value="Sign In"/>
	      </form>
	    </form>
	    <p>Not registered yet?
	      <form method="post" action="index.php">
	        <input type="submit" class="buttonLink" name="createAccount" value="Sign Up"/>
	      </form>
	    </p>
	    </div>
	<?php
	}
}