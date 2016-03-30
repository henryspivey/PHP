<?php
$mood  = "sad";
if($mood == 'happy')
{
	echo "Hooray I'm in a good mood!";
}
elseif ($mood == "sad") {
	# code...
	$mood = "OK";
	echo "I'm in an $mood mood.";
}
else
{
	echo "I'm in a $mood mood.";

}	
?>
