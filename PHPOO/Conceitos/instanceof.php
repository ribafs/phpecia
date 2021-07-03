<?php
class MinhaClasse
{
}

class OutraClasse
{
}

$m = new MinhaClasse;

var_dump($m instanceof MinhaClasse);
print '<br>';
var_dump($m instanceof OutraClasse);
print '<br><br>';

// Exemplo com herança
class ParentClass
{
}

class MyClass extends ParentClass
{
}

$a = new MyClass;

var_dump($a instanceof MyClass);
print '<br>';
// Como foi herdado também é uma instância de (instanceof)
var_dump($a instanceof ParentClass);

?>

