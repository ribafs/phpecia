<?php
include_once 'ActiveRecord.php';
//include_once 'Cliente.php';
// O nome da classe deve ser o mesmo da tabela com inicial maiúsculas. Tabela: produto, classe Produto, tabela: produtos, classe Produtos
include_once 'Produto.php';
include_once 'Connection.php';

Produto::setConnection(Connection::getInstance('./config.php'));

$pro = new Produto();
 
$pro->nome = "Banana Prata";
$pro->unidade = "kg";
$pro->preco = 5;

if ($pro->save()) {
    echo "Registro salvo!";
} else {
    echo "Registro <b>NÃO FOI</b> salvo!";
}

echo "<pre>";
var_dump(Produto::all());
echo "</pre>";

echo Produto::numTotal();


/*
$cliente = Cliente::find(1);
 
echo "<pre>";
var_dump($cliente);
echo "</pre>";
 
$cliente->nome = "Fulano de Tal";
$cliente->endereco = "Endereco modificado para fulano de tal";
$cliente->save();
unset($cliente);
 
$cliente = Cliente::find(1);
echo "<hr>";
echo "<pre>";
var_dump($cliente);
echo "</pre>";


for ($c = 1; $c <= 10; $c++) { 
    $cliente = new Cliente; $cliente->nome = "Cliente {$c}";
    $cliente->endereco = "Rua do Cliente {{$c}}";
 
 
    if ($cliente->save()) {
        echo "Registro {$c} salvo!";
    } else {
        echo "Registro <b>NÃO FOI</b> salvo!";
    }
}
 
$todos = Cliente::all();
 
echo "
<pre>";
var_dump($todos);
echo "</pre>
 
";


$cliente = Cliente::findFisrt("nome = 'Cliente 4'");
 
echo "
<pre>";
var_dump($cliente);
echo "</pre>
 
";

for ($c = 11; $c <= 20; $c++) { $cliente = new Cliente; $cliente->nome = "Cliente {$c}";
    $cliente->endereco = "Rua do Cliente {$c}";
 
 
    if ($cliente->save()) {
        echo "Registro {$c} salvo!
";
    } else {
        echo "Registro <b>NÃO FOI</b> salvo!
";
    }
}
 
$cliente12 = Cliente::find(12);
 
echo "
<pre>";
var_dump($cliente12);
echo "</pre>
 
";
echo "
<hr>
 
";
 
sleep(2);
$cliente12->nome = "Cliente 12 Atualizado";
$cliente12->save();
 
$cliente12upd = Cliente::find(12);
echo "
<pre>";
var_dump($cliente12upd);
echo "</pre>
 
";


