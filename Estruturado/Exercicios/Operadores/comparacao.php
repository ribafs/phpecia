<?php

$a = 2; $b = "3";

echo ($a == $b) ? "T" : "F";echo "<br>";	// Igual
echo ($a === $b) ? "T" : "F";echo "<br>";	// Idêntico	Verdadeiro (TRUE) se $a é igual a $b, 
							// e eles são do mesmo tipo 
							// (somente para PHP4 ou superior).
echo ($a != $b) ? "T" : "F";echo "<br>";	// Diferente
echo ($a <> $b) ? "T" : "F";echo "<br>";	// Diferente
echo ($a !== $b) ? "T" : "F";echo "<br>";	// Não idêntico	Verdadeiro de $a não é igual a $b, 
			// ou eles não são do mesmo tipo (somente para o PHP4).
echo ($a < $b) ? "T" : "F";echo "<br>"; 	// Menor que
echo ($a > $b) ? "T" : "F";echo "<br>"; 	// Maior que
echo ($a <= $b) ? "T" : "F";echo "<br>";	// Menor ou igual
echo ($a >= $b) ? "T" : "F";echo "<br>";	// Maior ou igual	

?>
