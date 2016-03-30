<?php require_once('numberguess2require_once.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>A PHP number guessing script!</title>
</head>
<body>
	<h1><?php echo "$message";?></h1>
	<p><strong>Guess number: </strong><?php echo $num_tries ?></p>
	<form action="" method="POST">
		<p><strong>Type your guess here:</strong><input type="text" name="guess"></p>
		<input type="hidden" name="num_tries" value="<?php echo $num_tries; ?>">
		<p><input type="submit" value="submit your guess"></p>
	</form>

</body>
</html>


