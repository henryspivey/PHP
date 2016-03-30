<?php
/*
function bigHello()
{
	echo "<h1>It works!</h1>";

}
#bigHello();

function printBR($txt)
{
	echo "$txt <br>";

}
#printBR("Hello");
#printBR("This is a new line.");
$life = 42;

function useGlobals()
{
	global $life;
	echo "The meaning of life is $life";

}
#useGlobals()

$num_of_calls = 0;
function numbered_heading($txt)
{
	global $num_of_calls;
	$num_of_calls++;
	echo "<h$num_of_calls>$num_of_calls. $txt</h$num_of_calls>";

}

numbered_heading("Widgets");
numbered_heading("Doodads");
numbered_heading("Dingbats");
numbered_heading("Windings");
numbered_heading("Foo");
numbered_heading("Bar");


function call_by_reference(&$num)
{
	$num+=5;

}

$orignum = 10;
call_by_reference($orignum);
echo $orignum;


function tagWrap($tag, $txt,$func = "")
{
	if ((!empty($txt)) && (function_exists($func) )) {
		$txt = $func($txt);
		return "<$tag>$txt</$tag>\n";
		# code...
	}

}

function underLine($txt)
{
	return "<u>$txt</u>";

}
echo tagWrap('b',"make me bold", 'underLine');

echo tagWrap('i', 'make me italicised');

echo tagWrap('i', 'underline me too','underLine');

echo tagWrap('i','make me italic and quote me',create_function('$txt', 'return "&quot;$txt&quot;";'));
*/


function make_table_from_entries($one,$two,$three,$four)
{
	echo "<table border = \"1\" cellpadding =\"4\" cellspacing=\"4\">";
	echo "<tr>";
	echo "<td>$one</td>";
	echo "<td>$two</td>";
	echo "<td>$three</td>";
	echo "<td>$four</td>";
	echo "</tr>";
	echo "</table>";

}
echo make_table_from_entries("How","are","you","today?");







?>
