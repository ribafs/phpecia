<?php
// https://www.youtube.com/watch?v=cOZUJmGraaw&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=16
// Relação entre objetos (Associação)

class Pedido{
    public $numero;
    public $cliente;
}

class Cliente{
    public $nome;
    public $endereco;
}

$cliente = new Cliente();
$cliente->nome = 'João Brito';
$cliente->endereco = 'R dos Anzóis, 127';

$pedido = new Pedido();
$pedido->numero = 123;
$pedido->cliente = $cliente; // Criada uma associação entre os dois objetos, $pedido e $cliente

// Caso queiramos gravar alguns dados no banco
/*
$dados = array(
    'numero' => $pedido->numero,
    'nome_cliente' => $pedido->cliente->nome,
    'endereco_cliente' => $pedido->cliente->endereco
);
*/
// ou assim
$dados = [
    'numero' => $pedido->numero,
    'nome_cliente' => $pedido->cliente->nome,
    'endereco_cliente' => $pedido->cliente->endereco
];
var_dump($dados);
