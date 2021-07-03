<?php
//Você pode ter notado que os seguintes itens são funcionalmente idênticos:
$arr = array("um", "dois", "três");
reset ($arr); // Aponta para o primeiro elemento
while (list(, $value) = each ($arr)) {
   echo "Valor: $value<br />";
}
foreach ($arr as $value) {
   echo "Valor: $value<br />";
}
//Os seguintes também são funcionalmente idênticos:
$arr = array("one", "two", "three");
reset($arr);
while (list($key, $value) = each ($arr)) {
   echo "Chave: $key; Valor: $value<br />";
}
foreach ($arr as $key => $value) {
   echo "Chave: $key; Valor: $value<br />";
}
/* exemplo foreach 1: somente valores */
$a = array(1, 2, 3, 17);
foreach ($a as $v) {
   echo "Valor atual de \$a: $v.<br>";
}
/* exemplo foreach 2: valores (com as chaves impressas para ilustração) */
$a = array(1, 2, 3, 17);
$i = 0; /* para exemplo somente */
foreach ($a as $v) {
   echo "\$a[$i] => $v.<br>";
   $i++;
}
/* exemplo foreach 3: chaves e valores */
$a = array (
   "um" => 1,
   "dois" => 2,
   "três" => 3,
   "dezessete" => 17
);
foreach ($a as $k => $v) {
   echo "\$a[$k] => $v.<br>";
}
?> 
