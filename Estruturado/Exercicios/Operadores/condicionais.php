<?php

// Expressões Condicionais - Operador Ternário
// Caso a primeira seja verdadeira (TRUE, não zero), então a segunda será avaliada e seu valor será retornado";

$primeira = (1 == 1);
$segunda = 2 * 3;
$terceira = 3 * 5;

echo "<br>";
echo $primeira ? $segunda : $terceira;

echo "<br>";
echo "<br>";
// Caso a primeira seja verdadeira (TRUE, não zero), então a segunda será avaliada e seu valor será retornado

$primeira = false;
$segunda = 2 * 3;
$terceira = 3 * 5;

echo "<br>";
echo $primeira ? $segunda : $terceira;

?>
