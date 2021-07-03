<?php
function dobro($i){
   return $i*2;
}
$b = $a = 5;echo $b."<br>";        /* atribui o valor cinco às variáveis $a e $b */
$c = $a++;echo $c."<br>";          /* pós-incremento, atribui o valor original de $a
                       (5) para $c */
$e = $d = ++$b;echo $e."<br>";    /* pré-incremento, atribui o valor incrementado de
                       $b (6) a $d e $e */

/* neste ponto, tanto $d quanto $e são iguais a 6 */

$f = dobro($d++);echo $f."<br>";  /* atribui o dobro do valor de $d antes
                       do incremento, 2*6 = 12 a $f */
$g = dobro(++$e);echo $g."<br>";  /* atribui o dobro do valor de $e depois
                       do incremento, 2*7 = 14 a $g */
$h = $g += 10;echo $h."<br>";      /* primeiro, $g é incrementado de 10 e termina com o
                       valor 24. o valor da atribuição (24) é
                       então atribuído a $h, e $h termina com o valor
                       24 também. */
?> 
