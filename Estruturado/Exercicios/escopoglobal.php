<?php
$a = 1; /* escopo global */

function Teste(){
    global $a;
    echo $a; /* referencia a variável do escopo global */
}

Teste();
?>
