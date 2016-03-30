<?php

$rows = 20; // amout of tr 
$cols = 20;// amjount of td 

echo "<table border='1'>"; 

for($tr=1;$tr<=$rows;$tr++){ 
     
    echo "<tr>"; 
        for($td=1;$td<=$cols;$td++){ 
               echo "<td align='center'>".$tr*$td."</td>"; 
        } 
    echo "</tr>"; 
} 

echo "</table>"; 


?>
