<?php
//https://www.codediesel.com/php/how-do-mvc-routers-work/ 
/* index.php */
 
class SimpleRouter {
 
    /* Routes array where we store the various routes defined. */
    private $routes;
 
    /* The methods adds each route defined to the $routes array */
    public function add_route($route, callable $closure) {
        $this->routes[$route] = $closure;
    }
 
    /* Execute the specified route defined */
    public function execute() {
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
 
 
/* Create a new router */
$router = new SimpleRouter();
 
/* Add a Homepage route as a closure */
$router->add_route('/', function(){
    echo 'Hello World';
});
 
/* Add another route as a closure */
$router->add_route('/greetings', function(){
    echo 'Greetings, my fellow men.';
});
 
/* Add a route as a callback function */
$router->add_route('/callback', 'myFunction');
 
/* Callback function handler */
function myFunction(){
    echo "This is a callback function named '" .  __FUNCTION__ ."'";
}
  
/* Execute the router */
$router->execute();

