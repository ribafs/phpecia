<?php
// A função "__autoload()" é automaticamente chamada no caso de você tentar usar uma classe/interface que ainda não foi definida. 
// Ao chamar essa função o 'scripting engine' tem uma última chance para carregar a classe antes que o PHP falhe com erro.

include_once('./includes.php');

$um = new Um();
print 'Classe '.$um->classe;

print '<br>';
$dois = new Dois();
print 'Classe '.$dois->classe;

print '<br>';
$tres = new Tres();
print 'Classe '.$tres->classe;

print '<br>';
$quatro = new Quatro();
print 'Classe '.$quatro->classe;

print '<br>';
$cinco = new Cinco();
print 'Classe '.$cinco->classe;

?>
