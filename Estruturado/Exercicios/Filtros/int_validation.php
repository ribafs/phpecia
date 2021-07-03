<?php
/*** an integer to check ***/
$int = 42;
/*** lower limit of the int ***/
$min = 50;
/*** upper limit of the int ***/
$max = 100;

/*** validate the integer ***/
echo filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max)));
?>
