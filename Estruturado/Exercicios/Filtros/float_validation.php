<?php

/*** an FLOAT value to check ***/
$float = 22.42;

/*** validate with the FLOAT flag ***/
if(filter_var($float, FILTER_VALIDATE_FLOAT) === false)
    {
    echo "$float is not valid!";
    }
else
    {
    echo "$float is a valid floating point number";
    }

// 22.42 é Float válido
?>
