<?php
include 'xml_lido.php';

$xml = simplexml_load_string($xmlstr);

echo $xml->filme[0]->comentario; // "So this language. It's like..."
print '<br>';
echo $xml->filme[0]->titulo;
print '<br>';
echo $xml->filme[0]->personagens[0]->personagem[0]->nome;
print '<br>';
echo $xml->filme[0]->votos[0];
print '<br>';
echo $xml->filme[0]->votos[1];
?> 