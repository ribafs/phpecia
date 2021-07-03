## Instalação

Criar um diretório e acessá-lo

Executar
composer require izniburak/router

Criar dentro dele um .htaccess contendo:

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]

Criar um índex.php com:

<?php
require 'vendor/autoload.php';

$router = new Buki\Router();

$router->get('/', function() {
    return 'Hello World!';
});

$router->get('/sobre', function() {
    return 'Sobre RibaFS!';
});

$router->get('/controller', 'TestController@main');

$router->run();

Adicione quantos $router->get() precisar

https://github.com/izniburak/php-router
https://github.com/izniburak/php-router/wiki

$router = new \Buki\Router([
  'paths' => [
    'controllers' => 'app/Controllers',
    'middlewares' => 'app/Middlewares',
  ],
  'namespaces' => [
    'controllers' => 'App\Controllers',
    'middlewares' => 'App\Middlewares',
  ]
]);

$router->get('/', function() {
    return 'Hello World!';
});

$router->run();

# index.php file

$router = new \Buki\Router([
  'paths' => [
      'controllers' => 'Controllers',
  ],
  'namespaces' => [
      'controllers' => 'Controllers',
  ],
]);

$router->get('/', 'IndexController@main');
$router->get('/create', 'IndexController@create');
$router->post('/store', 'IndexController@store');
$router->get('/edit/:id', 'IndexController@edit');
$router->put('/update/:id', 'IndexController@update');
$router->delete('/delete/:id', 'IndexController@delete');

$router->get('/create', 'Backend.IndexController@create');
$router->post('/store', 'Backend.IndexController@store');

# OR 

$router->get('/create', 'Backend\\IndexController@create');
$router->post('/store', 'Backend\\IndexController@store');


