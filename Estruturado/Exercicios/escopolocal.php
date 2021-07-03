<?php
$a = 1; /* escopo global */

function Teste(){
   echo $a; /* referencia uma variável do escopo local (não definida) */
}

Teste();
?>
