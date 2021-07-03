<?php
require_once "src/Core/Router.php";
$route = new Router();

print '<a href="about">About</a><br>';
print '<a href="produtos">Produtos</a><br><br><br>';

$route->route('/', function () {
    return "Hello World";
});

$route->route('/about', function () {
    return "Hello form the about route";
});

$route->route('/como', function () {
    return "Como vai você?";
});

$route->route('/produtos', function () {
    require 'Controller/ProdutosController.php';
    $prod = new ProdutosController();
    echo $prod->index();
});

$action = $_SERVER['REQUEST_URI'];
$route->dispatch($action);
