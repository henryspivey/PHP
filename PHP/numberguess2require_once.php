<?php
$num_to_guess = 42;
$num_tries = (isset($_POST[num_tries])) ? $_POST[num_tries] + 1 : 1;
if(!isset($_POST[guess])){
	$message = "Welcome to the guessing machine";
} else if ($_POST[guess] > $num_to_guess){
	$message = "$_POST[guess] is too big! Try a smaller number!";
} else if($_POST[guess] < $num_to_guess){
	$message = "$_POST[guess] is too small! Try a bigger number!";
}else {
	header("Location: congrats.php"); # Uses header information to redirect the user!
	exit;
}
?>