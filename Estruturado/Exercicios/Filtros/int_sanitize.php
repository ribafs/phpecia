<?php

/*** an interger ***/
$int = "abc40def+;2";

/*** sanitize the integer ***/
echo filter_var($int, FILTER_SANITIZE_NUMBER_INT);

?>
