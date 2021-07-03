<?php

// Operadores de Arrays

$a = 2; $b = 3;
$a + $b;	//União,	União de $a e $b.
$a == $b;	//Igualdade,	TRUE se $a e $b tem os mesmos elementos.
$a === $b;	//Identidade,	TRUE se $a e $b tem os mesmos elementos na mesma ordem.
$a != $b;	//Desigualdade,	TRUE se $a não é igual a $b.
$a <> $b;	//Desigualdade,	TRUE se $a não é igual a $b.
$a !== $b;	//Não identidade,	TRUE se $a não é identico a $b.

$a = array("a" => "maçã", "b" => "banana");
echo "Array \$a<br>";
var_dump($a);

$b = array("a" =>"pêra", "b" => "framboesa", "c" => "morango");
echo "<br><br>Array \$b<br>";
var_dump($b);

$c = $a + $b; // Uniao de $a e $b
echo "<br><br>União de \$a e \$b: <br>";
var_dump($c)."<br>";

$c = $b + $a; // União de $b e $a
echo "<br><br>União de \$b e \$a: <br>";
var_dump($c);

?>
