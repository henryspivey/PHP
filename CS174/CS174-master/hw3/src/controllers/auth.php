<?php
session_start();
if(!isset($_SESSION["username"])){
	header("Location: index.php");
	echo "no username";
	exit();
}
?>
