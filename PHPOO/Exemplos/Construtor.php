<?php

// O método construtor obrigatoriamente precisa ser public

class Construtor
{
    private $nome = 'João Brito';

    public function __construct(){
        print 'O nome é ' . $this->nome;
    }
}

$nome = new Construtor();

Veja que logo após instanciar o objeto da classe Construtor, automaticamente o método __construct() é executado
