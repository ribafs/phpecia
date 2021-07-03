<?php

/*** an integer to check ***/
$int = 1234;
/*** validate the integer. Return 1234 if int ***/
echo filter_var($int, FILTER_VALIDATE_INT);

?>

