<?php
$a = array("a" => "maçã", "b" => "banana");
$b = array("a" =>"pêra", "b" => "framboesa", "c" => "morango");

$c = $a + $b; // Uniao de $a e $b
echo "União de \$a e \$b: <br>";
var_dump($c);

$c = $b + $a; // União de $b e $a
echo "<br><br>União de \$b e \$a: <br>";
var_dump($c);
?>
