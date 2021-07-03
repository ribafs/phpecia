<?php
/*
Para chamar uma constante de fora de uma classe não há necessidade de instanciar a classe, apenas NomeClasse::nomeconstante;
Para chamar de dentro da classe basta usar: 
self::nomeDaConstante;
*/

class MinhaClasse
{
    const constante = 'valor constante';

    function mostrarConstante() {
        echo  self::constante . "\n";
    }
}

echo MinhaClasse::constante . "\n";

$classname = "MinhaClasse";
echo $classname::constante; // A partir do PHP 5.3.0

$classe = new MinhaClasse();
$classe->mostrarConstante();

echo $classe::constante; // A partir do PHP 5.3.0
?>

