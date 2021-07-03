<?php
// Executa pelo menos uma vez incondicionalmente
$i = 6; $fator = 2; $minimo = 10;
do {
   if ($i < 5) {
       echo "\$i não é grande o suficiente";
       break;
   }
   $i *= $fator;
   if ($i < $minimo) {
       break;
   }
   echo "\$i está Ok e vale " . $i;

} while (0);

/* Exemplo simples
$i = 0;
do {
   echo $i;
} while ($i > 0);
*/
?> 
