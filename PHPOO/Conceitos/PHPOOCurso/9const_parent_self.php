<?php
// https://www.youtube.com/watch?v=6u-IPyqAOJk&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=9

class Pessoa{
    const NOME = 'Rodrigo';

    public function exibirNome(){
        echo self::NOME;
    }    
    
}

class Rodrigo extends Pessoa{
    const NOME = 'Oliveira';

    // Para utilizar a constante da classe pai, usuamos parente e self para a classe filha onde estamos
    public function exibirNome(){
//        echo self::NOME;
        echo parent::NOME;
    }    
    
}

$r = new Rodrigo();
$r->exibirNome();// Mostra constante de Rodrigo, classe filha, pois self diz respeito à constante local

