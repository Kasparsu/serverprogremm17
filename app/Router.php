<?php 
namespace App;

class Router {
    private $method;
    private $uri;
    private $baseUri;
    private $routes;
    /**
     * Router constructor.
     * @param $method
     * @param $uri
     * @param $baseUri
     */
    public function __construct($method, $uri, $baseUri)
    {
        $this->method = $method;
        $this->uri = substr($uri,strlen($baseUri));
        $this->baseUri = $baseUri;
        $this->routes = include(__DIR__ . "/../routes.php");
    }
    public function match(){
        foreach($this->routes as $route => $method){
            if($this->uri == $route) {
                $controllerName = $method[1];
                $controller = new $controllerName();
                $controller->{$method[0]}();
                break;
            }
        }
    }
}