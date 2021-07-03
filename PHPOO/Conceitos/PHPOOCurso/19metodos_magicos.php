<?php
// https://www.youtube.com/watch?v=KlpiwanZat8&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=19
// invoke, toString, get, set

class Pessoa {
    private $nome;

    // Atribue valor para nome
    public function __set($nome, $valor) {
        $this->nome = $valor;
    }

    public function __get($nome) {
        return $this->nome;
    }

}

$pessoa = new Pessoa();
$pessoa->nome = 'Roberto';
echo $pessoa->nome;
