<?php
// O método __toString permite que uma classe decida como se comportar quando for convertida para uma string. 
class ClasseTeste
{
    public $foo;

    public function __construct($foo) {
        $this->foo = $foo;
    }

    public function __toString() {
        return $this->foo;
    }
}

// Se eliminarmos o método __toString() da classe não poderemos usar o echo como abaixo
$classe = new ClasseTeste('Olá');
echo $classe;
?>

