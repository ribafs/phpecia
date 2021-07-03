<?php

$a = 3;
$a += 5; // $a recebe 5 e soma com seus 3, tipo: $a = $a + 5;
echo "\$a vale " . $a; echo "<br>";

$b = "Bom ";
$b .= "Dia!"; // $b fica com "Bom Dia!", como em $b = $b . "Dia!";
echo "\$b vale " . $b; echo "<br>";

$c=2;
$a -= $c;    //$a = $a - $c    Subtração
echo "\$a -= \$c vale " . $a; echo "<br>";
$a *= $c;    //$a = $a * $c    Multiplicação
echo "\$a *= \$c vale " . $a; echo "<br>";
$a /= $c;    //$a = $a / $c    Divisão
echo "\$a /= \$c vale " . $a; echo "<br>";
$resto = $a % $c;    //$a = $a % $c    Módulo (resto)
echo "Resto de $a % $c vale: " . $resto; echo "<br>";
?>
