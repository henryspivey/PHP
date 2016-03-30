<?php

echo "<p> Welcome <b>$_POST[user]</b>!</p>";
echo "<p>Your product choices are:<br>";
if (!empty($_POST[products])) {
	echo "<ul>";
	foreach ($_POST[products] as $value) {
		echo "<li>$value";

	}
	echo "</ul>";
}



?>