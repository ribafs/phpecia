<?php
$arr = array(1,2,3,4,5,6,7,8);
while (list ($key, $value) = each ($arr)) {
   if (!($key % 2)) { // pula itens pares, ou seja, processa somente ímpares
       continue;
   }
   echo ($value);
}
echo "<br>";
$i = 0;
while ($i++ < 5) {
   echo "Fora<br />";
   while (1) {
       echo "&nbsp;&nbsp;Meio<br />";
       while (1) {
           echo "&nbsp;&nbsp;Dentro<br />";
           continue 3;
       }
       echo "Isto nunca será exibido.<br />";
   }
   echo "Nem isso.<br />";
}

// Outro exemplo
  for ($i = 0; $i < 5; ++$i) {
     if ($i == 2)
         continue
     print "$i\n";
  }
?>
