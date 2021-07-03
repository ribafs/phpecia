<?php
// https://www.youtube.com/watch?v=_DM8gyA3cB4&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=17
// Associação do tipo agregação, que acontece quando uma classe precisa de outra para executar uma ação

class Produto{
    public $nome;
    public $valor;

    public function __construct($nome, $valor){
        $this->nome = $nome;
        $this->valor = $valor;
    }
}

class Carrinho{
    public $produto;

    // Agregação
    public function adicionar(Produto $produto){
        $this->produto[] = $produto;
    }

    public function exibir(){
        foreach($this->produto as $prod){
            echo $prod->nome. ' - '. $prod->valor.'<hr>';
        }
    }
}

$produto1 = new Produto('Notebook', 1500);
$produto2 = new Produto('Mouse', 50);

$carrinho = new Carrinho(); 
//Agregação
$carrinho->adicionar($produto1);
$carrinho->adicionar($produto2);
$carrinho->exibir();
