<?php
date_default_timezone_set('PST');
$time = time();
echo date("m/d/y G.i:s",$time);
echo "<br>";
echo "Today is ";
echo date("j of F Y, \a\\t g.i a",$time);


?>
