<?php
// https://www.youtube.com/watch?v=nRsLrAXZw4A&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=5

class Veiculo{
    // propriedades
    public $modelo;
    public $cor;
    public $ano;

    // métodos
    public function andar(){
        echo 'Andou';
    }

    public function parar(){
        echo 'Parou';
    }
}

// Cada classe deve ficar em um arquivo separado
class Carro extends Veiculo{
}

class Moto extends Veiculo{
}

// É interessante criar uma classe básica com estes métodos e propriedades e as classes filhas ehrdarem (extends) dela
// Todas as filhas herdam automaticamente tudo da classe pai.

// Testando

$carro = new Carro();
$carro->modelo = 'Gol';
$carro->cor = 'Preto';
$carro->ano = 2019;
$carro->andar();
var_dump($carro);

$moto = new Moto();
$moto->modelo = 'Honda ML 125';
$moto->cor = 'Preta';
$moto->ano = 2018;
$moto->parar();
var_dump($moto);

