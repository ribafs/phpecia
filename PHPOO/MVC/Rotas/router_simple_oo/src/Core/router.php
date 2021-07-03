<?php

    function url(){
        $url1 = explode('/', $_SERVER['REQUEST_URI']);// Captura a URL
        $url2 = explode('/', dirname(__DIR__));// Captura a URL. Depende do nível do diretório onde o router está no aplicativo
                                               // Como está um nível abaixo, ou seja, em core, então usamos um dirname. Se no segundo dois
        $url='';
        $url3 = [];
        $param = '';
        foreach($url1 as $value) {
            if(in_array($value, $url2)) {
                $url .= $value.'/';
            }else{
                $param .= $value;
            }

        }
        $url3 = [$url, $param];
        return $url3;
    }
$url = url();
$url = $url[0];
$param = $url[1];

/**
 * Holds the registered routes
 *
 * @var array $routes
 */
$routes = [];

/**
 * Register a new route
 *
 * @param $action string
 * @param \Closure $callback Called when current URL matches provided action
 */
function route($action, Closure $callback)
{
    global $routes,$url;
    $action = trim($action, $url);
    $routes[$action] = $callback;
}

/**
 * Dispatch the router
 *
 * @param $action string
 */
function dispatch($action)
{
    global $routes,$url;
    $action = trim($action, $url);

    if($routes[$action]){
    $callback = $routes[$action];

    echo call_user_func($callback);
    }
}

// Nas linhas 19 e 31 precisaremos sempre indicar a pasta do aplicativo, dentro da URL completa.
// Exemplos: /nomeapp, /pasta/nomeapp. 
// Ou então estando sozinho no raiz de um virtualhost e com apenas /
