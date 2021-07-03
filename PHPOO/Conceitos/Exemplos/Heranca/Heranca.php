<?php

class Humano
{
    private $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function falar($mensagem)
    {
        print $mensagem .'<br>';
    }

    public function identificar()
    {
        print $this->nome.'<br>';
    }
}

class Homem extends Humano
{
    // Criar um método novo, que não tem na classe pai, pois tudo da classe pai é herdado e está disponível aqui
    public function fazendo()
    {
        print 'Varrendo a casa<br><br>';
    }
}

class Mulher extends Humano
{
    // Criar um método novo, que não tem na classe pai, pois tudo da classe pai é herdado e está disponível aqui
    public function fazendo()
    {
        print 'Fazendo o almoço<br><br>';
    }
}

$homem1 = new Homem('Ribamar');
$homem1->identificar();
$homem1->fazendo();

$mulher1 = new Mulher('Maria');
$mulher1->identificar();
$mulher1->fazendo();

Podemos criar outros objetos da classe Humano: $homem2, $homem3, etc.

// Classes que existem somente para ser herdadas, são abstract class 
