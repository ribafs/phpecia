<?php

// Getter e Setter. Idealmente todas as propriedades devem ser private. Então para passar o valor das propriedades para os objetos usamos métodos public, chamados
// getter e setter.

class GetterSetter
{
    private $nome = 'João Brito';

    // O getter serve para receber o valor da propriedade
    public function getNome(){
        return $this->nome;
    }

    // O setter serve para atribuir novo valor para a propriedade, ou seja, alterar seu valor atual
    public function setNome($nome){
        $this->nome = $nome;
    }
}

$nome = new GetterSetter();

print $nome->getNome();
$nome->setNome('Segundo Nome');
print '<hr>';
print $nome->getNome();
