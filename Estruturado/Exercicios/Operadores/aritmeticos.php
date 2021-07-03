<?php

$a = 9;
$b = 4;
echo "<br><br>";
echo "\$a + \$b = ".($a + $b);	// 13
echo "<br><br>";
echo "\$a + \$b = ".$a + $b;	// Retorna 4, pois após o ponto é considerado strings
echo "<br><br>";
echo "\$a - \$b = ".($a - $b);	// 5
echo "<br><br>";
echo "\$a * \$b = ".$a * $b;	// 36
echo "<br><br>";
echo "\$a / \$b = ".$a / $b;	// 2.25 - Divisão Quociente de $a por $b.
echo "<br><br>";
echo "\$a % \$b = ".$a % $b;	// 1 - Resto de $a por $b

?>
