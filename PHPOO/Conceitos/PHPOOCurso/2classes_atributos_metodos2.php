<?php
// https://www.youtube.com/watch?v=eWW5M1n2Pq8&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=2

class Pessoa{
    // propriedades/atributos
    public $nome;
    public $idade;

    // métodos/ações
    public function falar(){
        echo $this->nome.' com '. $this->idade.' Falou<br>';
        // Para usar propriedades dentro da classe, precisamos usar $this: $this->nome
    }
// Observação importante:
// proproedades tem apenas nome precedido de $: $nome
// método é precedido de function, sem $ e termina com (): function falar()
}

// Geralmente instanciamos noutro arquivo
$rodrigo = new Pessoa();

//$rodrigo->falar(); // Observe que ainda não têm valor as propriedades
$rodrigo->nome = 'Rodrigo';
$rodrigo->idade = 25;
$rodrigo->falar();
