<?php
require 'Router.php';
    // In case one is using PHP 5.4's built-in server
    $filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }

    // Create a Router
    $router = new \Bramus\Router\Router();

    // Custom 404 Handler
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '<h3>404, route not found!</h3>';
    });

    // Before Router Middleware
    $router->before('GET', '/.*', function () {
        header('X-Powered-By: bramus/router');
    });

        $router->get('/', function () {
          header('location: clientes');
        });

    // Subrouting
    $router->mount('/clientes', function () use ($router) {

        require 'ClientesController.php';
        $router->get('/', function () {
          $cli = new ClientesController();
          $cli->index();        
        });

        $router->get('/delete/(\d+)', function ($id) {
          $cli = new ClientesController();
          $cli->delete($id);        
        });

        //$router->post('/add', function () {
        $router->get('/add', function () {
          $cli = new ClientesController();
          $cli->add();        
        });

        //$router->put('/edit/(\d+)', function ($id) {
        $router->get('/edit/(\d+)', function ($id) {
          $cli = new ClientesController();
          $cli->edit(htmlentities($id));        
         });
    });

    // Subrouting
    $router->mount('/vendedores', function () use ($router) {

        require 'VendedoresController.php';
        $router->get('/', function () {
          $cli = new VendedoresController();
          $cli->index();        
        });

        $router->get('/delete/(\d+)', function ($id) {
          $cli = new VendedoresController();
          $cli->delete($id);        
        });

        //$router->post('/add', function () {
        $router->get('/add', function () {
          $cli = new VendedoresController();
          $cli->add();        
        });

        //$router->put('/edit/(\d+)', function ($id) {
        $router->get('/edit/(\d+)', function ($id) {
          $cli = new VendedoresController();
          $cli->edit(htmlentities($id));        
         });
    });

    // Thunderbirds are go!
    $router->run();

// EOF

// https://github.com/bramus/router/

/*
EXEMPLOS
http://localhost/router/  será redirecionado para http://localhost/router/clientes
http://localhost/router/clientes
http://localhost/router/clientes/edit/4
http://localhost/router/clientes/delete7

http://localhost/router/vendedores
http://localhost/router/vendedores/add
http://localhost/router/vendedores/edit6

*/
