<?php
$arr = array('um', 'dois', 'três', 'quatro', 'PARE', 'cinco');
while (list (, $val) = each ($arr)) {
   if ($val == 'PARE') {
       break;    /* Você poderia colocar 'break 1;' aqui. */
   }
   echo "$val<br />";
}
echo "<br />";
/* Utilizando o argumento opcional. */

$i = 0;
while (++$i) {
   switch ($i) {
   case 5:
       echo "No 5<br />";
       break 1;  /* Sai somente do switch. */
   case 10:
       echo "No 10; saindo<br />";
       break 2;  /* Sai do switch e while. */
   default:
       break;
   }
}
?>
