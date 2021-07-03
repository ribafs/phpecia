<?php
// https://www.youtube.com/watch?v=aixcrdigtsw&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=18
// Associação entre objetos do tipo Composição, quando uma classe cria instância de outra classe dentro de si própria
// Quando ela for destruída a outra classe também será

class Pessoa {
    public function atribuirNome($nome) {
        echo 'O nome da pessoa é '.$nome;
    }
}

class Exibe {
    public $pessoa; // Abrigará o objeto da classe Pessoa()
    public $nome;

    public function __construct($nome) {
        // Composição
        $this->pessoa = new Pessoa();
        $this->nome = $nome;
    }

    public function exibirNome() {
        echo $this->pessoa->atribuirNome($this->nome);
    }
}

$exibe = new Exibe('João');
$exibe->exibirNome();
