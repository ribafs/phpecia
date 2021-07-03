<?php

$a = true; $b = FALSE;

echo ($a and $b)? "T<br>":"F<br>";	//E	Verdadeiro (TRUE) se tanto $a quanto $b são verdadeiros.
echo ($a or $b)? "T<br>":"F<br>";	//OU	Verdadeiro se $a ou $b são verdadeiros.
echo ($a xor $b)? "T<br>":"F<br>";	//XOR	Verdadeiro se $a ou $b são verdadeiros, mas não ambos.
echo (! $a)? "T<br>":"F<br>";		//NÃO	Verdadeiro se $a não é verdadeiro.
echo ($a && $b)? "T<br>":"F<br>";	//E	Verdadeiro se tanto $a quanto $b são verdadeiros.
echo ($a || $b)? "T<br>":"F<br>";	//OU	Verdadeiro se $a ou $b são verdadeiros.

?>
