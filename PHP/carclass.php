<?php

/**
* 
*/
class Car 
{
	var $color = "red";
	var $year = "1969";
	var $make = "Ferrari";
	var $model = "Dino";

	function setMake($m)
	{
		$this->make = $m;
	}
	function setColor($c)
	{
		$this->color= $c;
	}
	function setYear($y)
	{
		$this->year = $y;
	}
	function setModel($mod)
	{
		$this -> model = $mod;
	}

}
$car = new Car();
$car -> setYear(2008);
$car -> setModel("6i");
$car -> setColor("Grey");
$car -> setMake("Mazda");
echo "I drive a ".$car -> year." ".$car -> color."  ".$car -> make." ".$car -> model;

?>