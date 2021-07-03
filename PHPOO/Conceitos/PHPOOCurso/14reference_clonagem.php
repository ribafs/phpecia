<?php
// https://www.youtube.com/watch?v=EAn1YRJZ8Q8&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=14
// Referência e clonagem de objetos

class Pessoa{
    public $idade;

    // Método mágico que é executado sempre que executamos o comando clone como na linha 23
    public function __clone(){
        echo 'Objeto clonado ';
    }
}

$pessoa = new Pessoa();
$pessoa->idade = 25;

// Criar novo objeto que faz referência ao objeto $pessoa
$pessoa2 = $pessoa;
$pessoa2->idade = 35;
echo $pessoa->idade;// 35

// Clonando objeto $pessoa, criando outro objeto
$pessoa3 = clone $pessoa;
$pessoa3->idade = 65;
echo '<br>'.$pessoa->idade; // 35

echo '<br>'.$pessoa3->idade; // 65
