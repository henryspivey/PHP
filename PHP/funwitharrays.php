<?php

$character = array(

	array(
			"name" => "Spivotron",
			"occupation" => "Web Developer",
			"age" => 20,
			"special_power" => "makes good sandwiches"
		),

	array(
			"name" => "Bob",
			"occupation" => "Truck Driver",
			"age" => 45,
			"special_power" => "makes good sandwiches"
		),
	array(
			"name" => "Sally",
			"occupation" => "Works as the Gap",
			"age" => 22,
			"special_power" => "makes good sandwiches"
		)
	);



foreach ($character as $c) {
	while (list($k,$v) = each($c)) {
		
		echo "$k ... $v <br>";
	
	}
	
}
/*
foreach ($character as $variable) {
	# code...
	echo $variable;
	echo "<br>";
}
*/
	
?>
