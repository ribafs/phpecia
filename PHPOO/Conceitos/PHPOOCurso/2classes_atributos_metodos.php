<?php
// https://www.youtube.com/watch?v=eWW5M1n2Pq8&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=2

class Pessoa{
    // propriedades/atributos
    public $nome;
    public $idade;

    // métodos/ações
    public function falar(){
        echo 'Falou<br>';
    }
// Observação importante:
// proproedades tem apenas nome precedido de $: $nome
// método é precedido de function, sem $ e termina com (): function falar()
}

// Geralmente instanciamos noutro arquivo
$rodrigo = new Pessoa();
//var_dump($rodrigo);
$rodrigo->falar();
$rodrigo->nome = 'Rodrigo';
$rodrigo->idade = 25;
//var_dump($rodrigo);
echo $rodrigo->nome;
