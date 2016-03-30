<?php

$mood = "iffy";
switch($mood)
{
	case "happy":
		echo "Hooray I'm in a happy mood";
		break;
	case "sad":
		# code...
		echo "Aww. Don't be down!";
		break;
	default:
		echo "Neither happy nor sad but $mood.";
		break;
}