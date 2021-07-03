I am personally a fan of pretty much limiting the "routing" aspect of a front-controller like this to just getting the request to the proper controller for further processing.

But before talking about that, I want to ask you whether what you really have here is a "router" or a "URI parser"? It seems like just a URL parser to me in that is does no routing. If your goal is to create a one-fits-all URI parser, you are probably engaging in a fool's errand. As you change your application/API's behaviors and endpoint signatures, you are going to continually add more complexity to this central parser. This is probably a bad path.

Now let's think about a true "router" (this thinking exercise ideally getting towards addressing your problem with not understanding how to implement MVC). What is a router intended to do? It is intended to interpret something like a URI string and do nothing other than to route that string (and of course any payload passed to POST/PUT) to an appropriate piece of logic that knows what to do with it.

The RESTful URI structure you present really only requires one level of routing. That can be as simple as looking at first path segment of the URI, comparing against configuration mapping controllers with each "first segment" value, then instantiating the controller and passing it the remaining URI so it can determine what to do to with it from there. You might find yourself using a combination of classes such as

Router (a class to look a "first segment" and route configuration and instantiate appropriate controller and relenquish control to that controller)
RouterConfig (a class to wrap router config settings)
Controller (an abstract class all other controllers can extend from)
*Controller (specific controller implementations for each of your resources)
Request (a class to store info on request perhaps built from parse_url or similar)

Update

I also should have noted that you currently are not doing any validation on your input here. You are working directly with $_SERVER['REQUEST_URI'] which must be considered as user-input data and thus unsafe. Most good front controller implementations will have some sort of class that is instantiated to represent the request being made. This gives you an opportunity to validate/sanitize the input as well as establish a common authoritative representation of the request - the request type (GET, POST, PUT, DELETE), content type, URI, POST/PUT payload and/or parametric data, etc. - that can be passed about in the system.

I have added a more detailed code example below for what a router might look like in MVC system. This is is pretty much close to production level code other than the need to add namespacing, document blocks, and (ideally) unit tests (and of course fill in missing logic pieces).

Notice in this code how we strive to always pass around objects that we can type-hint for in the method signature. This largely eliminates the need to have parameter validation in your methods if you are disciplined about only letting objects be used in the system once they have been put into expected state (with exception being thrown otherwise.) You can see this allows us to really be efficient with the code we write.

<?php
// this is example of static router
class Router
{
    // store global route config
    protected static $config;

    // restrict this class to static usage
    private function __construct() {}

    // setter for config, likely to be called in bootstrap file of some sort
    public static function setConfig(RouterConfig $config) {
        self::$config = $config;
    }

    // main method to instantiate a controller based on route config
    public static function route(Request $request) {
        $controllerClass = self::getControllerClass($request);
        // some form of object instantiation
        return new {$controllerClass}($request);
    }

    public static function getControllerClass(Request $request) {
        self::validateConfig();
        $resourceName = $request->getUriPathSegment(0);
        // have getClassForResource return default 404 class name if match not found
        $className = {self::$config}::getClassForResource($resourceName);

        // validate that name returned maps to an existing class
        if(!class_exists($className )) {
            throw new Exception("Class: '" . $className . " not found");
        }

        return $className;
    }

    private static function validateConfig {
        if (self::config instanceof RouterConfig) return;
        throw new Exception(
            'Router::config has not bet set! You must call Router::setConfig() before calling this method.'
        );
    }            
}

// example usage

// in bootstrap/config file
Router::setConfig(/* RouterConfig object */);

// in main routing script
try {
    // some form of Request object instantiation
    $request = new Request();
    $controller = Router::route($request);
    $controller->execute();
    exit(0);
} catch (Exception $e) {
    // Perhaps log exception.
    // Perhaps handle end user messaging by instantiating 500-series controller
    // or don't catch at all and just use top-level exception handler
    exit(1);
}


