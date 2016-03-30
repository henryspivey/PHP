<?php

$dates = array(
		  array('mon'=>12, 'mday'=>25,'year'=>2014),
		  array('mon'=>5,'mday'=>2,'year'=>2014),
		  array('mon'=>10,'mday'=>31,'year'=>2014)
	);

$format = include("local_format.php");
foreach ($dates as $date) {
	printf("$format",$date['mon'],$date['mday'],$date['year']);
	
}


?>