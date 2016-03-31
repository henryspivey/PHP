<?php

namespace CS174\Hw3\src\views;

require_once "../View.php";

class LoginView extends View {

	public function render($data) {
		?>
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<title>Login</title>
				<link rel="stylesheet" href="css/style.css" />
			</head>
			<body>
				<div class="form">
				<h1>Log In</h1>
				<form action="" method="post" name="login">
					<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="password" placeholder="Password" required />
					<input name="submit" type="submit" value="Login" />
				</form>
				<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
				</div>
			</body>
			</html>
			<?php
	}
}
