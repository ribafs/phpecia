<?php
// Mostrar o conteúdo do arquivo completo
$arquivo = "html.txt";
$file_handle = fopen($arquivo, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   echo $line.'<br>';
}
fclose($file_handle);

// Excluir uma linha
$linha = 3;    // Number of the line we are deleting
$recebe = file($arquivo); // Read the whole file into an array

//Delete the recorded line
unset($recebe[$linha]);

//Recorded in a file
file_put_contents($arquivo, implode("", $recebe));


// Mostrar o conteúdo do arquivo sem a linha
print '<br><br><br>';
$file_handle = fopen($arquivo, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   echo $line.'<br>';
}
fclose($file_handle);

