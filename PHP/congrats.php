<!doctype html>
<html lang="en">
	<head>
		<title>Congratulations!!!</title>
		<meta charset="UTF-8"> 
	</head>
	<body>
		yay!
		<?php if (isset($_SERVER[HTTP_REFERER])) {
			echo "<a href='$_SERVER[HTTP_REFERER]'>Go back!</a>";
		}
		 # file name must be .php extension
		?>
	</body>
</html>