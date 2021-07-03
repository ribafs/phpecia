<?php

class Router
{
    /**
     * Holds the registered routes
     *
     * @var array $routes
     */
    private $routes = [];
    private $action = null;

    private $url=null;
    private $urlController;
    private $urlAction;
    private $param=null;

    public function __construct(){
        $this->url();

        $this->url = $this->url();
        $this->url;
        $this->url = $this->url[0];
        $this->urlController = $this->url[1];
        $this->urlAction = $this->url[2];
    }

    private function url(){
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

    /**
     * Register a new route
     *
     * @param $action string
     * @param \Closure $callback Called when current URL matches provided action
     */
    public function route($action, Closure $callback)
    {
        $this->action = trim($action, $this->url);
        $this->routes[$this->action] = $callback;
    }

    /**
     * Dispatch the router
     *
     * @param $action string
     */
    public function dispatch($action)
    {
        $this->action = trim($action, $this->url);
        $callback = $this->routes[$this->action];

        echo call_user_func($callback);
    }
}
