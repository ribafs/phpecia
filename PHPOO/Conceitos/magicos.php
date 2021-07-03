<?php
// Métodos mágicos

class Magicos{
	// Para atributos/variáveis
	// __get() e __set() recebem os campos das tabelas como variáveis e outras variáveis não definidas
    public function __get($prop){
        return $this->data[$prop];
    }
    
    public function __set($prop, $value){
        $this->data[$prop] = $value;
    }

	// Para métodos
	/*
	mixed __call ( string $name , array $arguments )
	mixed __callStatic ( string $name , array $arguments )

	__call() é disparado quando invocando métodos inacessíveis em um contexto de objeto.

	__callStatic() é disparado quando invocando métodos inacessíveis em um contexto estático.

	O argumento $name (primeiro) é o nome do método sendo chamado. O argumento $arguments (segundo) é um array enumerado 
	contendo os parâmetros passados para o método $name. 
	*/
	// Outros métodos mágicos: __construct, __destruct, __isset, __unset, __sleep, __wakeup, __toString, __invoke, __set_state and __clone
    public function __call($name, $arguments) {
        // Nota: valor de $name é case sensitive.
        echo "Chamando método objeto '$name' "
             . implode(', ', $arguments). "\n";
    }

    /**  Como em PHP 5.3.0  */
    public static function __callStatic($name, $arguments) {
        // Nota: valor de $name é case sensitive
        echo "Chamando método estático '$name' "
             . implode(', ', $arguments). "\n";
    }
	// Ou exemplo na classe mydataobj do Vagner Rodrigues
}

$n = new Magicos;
print $n->nome;
?>
