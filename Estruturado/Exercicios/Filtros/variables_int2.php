<?php

/*** an integer to check ***/
$int = 'abc1234';
/*** validate the integer. Retur false if not int***/
echo filter_var($int, FILTER_VALIDATE_INT);

?>

