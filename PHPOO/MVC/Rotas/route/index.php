<?php
//https://www.codediesel.com/php/how-do-mvc-routers-work/ 
/* index.php */
 
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

/*
In our example the ‘add_route’ method adds the url path name (route) to the array and the associated action that should be taken for that url (route). This action can be a a simple function or a callback, passed as a closure. Now when we execute the router with the ‘execute’ method it checks if any matching url (route) is defined in the $routes array and if found executes the function or callback.

If you do a var_dump of the $routes array you should see the content of the array. For each route defined there is a associated closure object stored.

array (size=3)
  '/' => 
    object(Closure)[2]
  '/greetings' => 
    object(Closure)[3]
  '/callback' => string 'myFunction' (length=10)

The execution is carried out by the following lines. The ‘$this->routes[$path]’ statement returns a closure as saved in the array for a specified path (route) which is then executed, note the ‘()’ at the end of the statement.

$this->routes[$path]();
// or
$this->routes['/']();

The above example is a simple demonstration of how a router works, for simplicity we have not handled any errors or taken care of security measures.
*/
