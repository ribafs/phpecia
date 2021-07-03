<?php
/*** an integer to check ***/
$int = -2;

/*** lower limit of the int ***/
$min = -10;

/*** upper limit of the int ***/
$max = 100;

/*** validate the integer ***/
echo filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max)));
// Retorna int(-2), pois -2 esta entre -10 e 100
?>
