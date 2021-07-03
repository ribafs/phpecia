<?php

$i = 1;

// Estrutura com if
if ($i == 0) {
   echo "\$i igual a 0";
} elseif ($i == 1) {
   echo "\$i igual a 1";
} elseif ($i == 2) {
   echo "\$i igual a 2";
}
echo "<br>";
// Estruturas com switch
switch ($i) {
   case 0:
       echo "\$i igual a 0";
       break;
   case 1:
       echo "\$i igual a 1";
       break;
   case 2:
       echo "\$i igual a 2";
       break;
}
echo "<br>";
$i = 2;
// Executará todos, falta o break
switch ($i) {
   case 0:
       echo "\$i igual a 0";
   case 1:
       echo "\$i igual a 1";
   case 2:
       echo "\$i igual a 2";
}
echo "<br>";
// Simulando intervalos
switch ($i) {
   case 0:
   case 1:
   case 2:
       echo "\$i é menor que 3 mas não negativo";
       break;
   case 3:
       echo "\$i é 3";
}
echo "<br>";
// Valor default
switch ($i) {
   case 0:
       echo "\$i igual a 0";
       break;
   case 1:
       echo "\$i igual a 1";
       break;
   case 2:
       echo "\$i igual a 2";
       break;
   default:
       echo "\$i não é igual a 0, 1 ou 2";
}
/* Sintaxe alternativa (em obsolescência)
switch ($i):
   case 0:
       echo "\$i igual a 0";
       break;
   case 1:
       echo "\$i igual a 1";
       break;
   case 2:
       echo "\$i igual a 2";
       break;
   default:
       echo "\$i não é igual a 0, 1 ou 2";
endswitch;
*/
?>
