<?php
/*** an integer to check ***/
$int = 12;

/*** lower limit of the int ***/
$min = 10;

/*** validate the integer ***/
echo filter_var($int, FILTER_VALIDATE_INT,array('options'=>array('min_range'=>$min)));
// Retorna 12, pois está na faixa de 10 até...
?>
