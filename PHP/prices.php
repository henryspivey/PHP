<?php 

$products = array('Green Armchair' => "222.4",
				"Candlestick" => "4",
				"Coffee Table" =>80.6
				);


printf("%-20s%23s\n", "Name", "Price");
printf("%'-43s\n","");
foreach($products as $key => $val)
{
	printf("%-23s%20.2f\n",$key,$val);
	// the '-' sign Left-justifies the variable value
}



?>
