<?php
/* exemplo 1 - Controla o fluso no for*/
echo "<br><br>1- ";
for ($i = 1; $i <= 10; $i++) {
   echo $i;
}
echo "<br><br>2- ";
/* exemplo 2 - Controle o fluxo no if interno*/
for ($i = 1; ; $i++) {
   if ($i > 10) {
       break;
   }
   echo $i;
}
echo "<br><br>3- ";
/* exemplo 3 - Controle o fluxo no if interno*/
$i = 1;
for (; ; ) {
   if ($i > 10) {
       break;
   }
   echo $i;
   $i++;
}
echo "<br><br>4- ";
/* exemplo 4 */
for ($i = 1; $i <= 10;$i++);
	echo $i;
?>
