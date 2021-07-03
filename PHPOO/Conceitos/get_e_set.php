<?php
/*
Sobrecarga

Sobrecarga em PHP provê recursos para "criar" dinamicamente membros e métodos. Estas entidades dinâmicas são processadas via métodos mágicos que podem estabelecer em uma classe para vários tipos de ações.

Os métodos sobrecarregados são invocados quando interagem com membros ou métodos que não foram declarados ou não são visíveis no escopo corrente. O resto desta seção usará os termos "membros inacessíveis" e "métodos inacessíveis" para se referirir a esta combinação de declaração e visibilidade.

Todos os métodos sobrecarregados devem ser definidos como públicos. 

 __set() é executado ao se escrever dados para membros inacessíveis.

__get() é utilizados para ler dados de membros inacessíveis. 
*/

class PropertyTest
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'<br>";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'<br>";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    /**  As of PHP 5.1.0  */
    public function __isset($name)
    {
        echo "Is '$name' set?<br>";
        return isset($this->data[$name]);
    }

    /**  As of PHP 5.1.0  */
    public function __unset($name)
    {
        echo "Unsetting '$name'<br>";
        unset($this->data[$name]);
    }

    /**  Not a magic method, just here for example.  */
    public function getHidden()
    {
        return $this->hidden;
    }
}


echo "<pre><br>";

$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "<br><br>";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "<br>";

echo $obj->declared . "<br><br>";

echo "Let's experiment with the private property named 'hidden':<br>";
echo "Privates are visible inside the class, so __get() not used...<br>";
echo $obj->getHidden() . "<br>";
echo "Privates not visible outside of class, so __get() is used...<br>";
echo $obj->hidden . "<br>";
?>
