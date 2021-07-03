<?php
class SimpleRouter {
 
    /* Routes array where we store the various routes defined. */
    private $routes;
 
    /* The methods adds each route defined to the $routes array */
    function add_route($route, callable $closure) {
        $this->routes[$route] = $closure;
    }
 
    /* Execute the specified route defined */
    function execute() {
        $path = $_SERVER['PATH_INFO'];
 
        /* Check if the given route is defined,
         * or execute the default '/' home route.
         */
        if(array_key_exists($path, $this->routes)) {
            $this->routes[$path]();
        } else {
            $this->routes['/']();
        }
    }   
}
