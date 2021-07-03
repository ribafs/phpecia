<?php
require 'vendor/autoload.php';

$router = new Buki\Router();

$router->get('/', function() {
    return 'Hello World!';
});

$router->get('/sobre', function() {
    return 'Sobre RibaFS!';
});

$router->get('/view/clientes/index', function() {
    return 'Sobre cli!';
});

$router->get('/controller', 'TestController@main');

$router->run();

