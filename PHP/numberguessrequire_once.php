<?php

if(!isset($_POST[guess])){
	$message = "Welcome to the guessing machine";
} else if ($_POST[guess] > $num_to_guess){
	$message = "$_POST[guess] is too big! Try a smaller number!";
} else if($_POST[guess] < $num_to_guess){
	$message = "$_POST[guess] is too small! Try a bigger number!";
}else {
	$message = "Well done!";
}
$num_to_guess = 42;
?>