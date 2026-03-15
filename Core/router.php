<?php

namespace Core;
class Router {
    protected $routes = [];

    public function add($url, $controller, $method)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method
        ];
    }
    public function get($url, $controller)
    {
        $this->add($url, $controller, "GET");
    }

    public function post($url, $controller)
    {
        $this->add($url, $controller, "POST");
    }

    public function delete($url, $controller)
    {
        $this->add($url, $controller, "DELETE");
    }

    public function put($url, $controller)
    {
        $this->add($url, $controller, "PUT");
    }

    public function patch($url, $controller)
    {
        $this->add($url, $controller, "PATCH");
    }

    public function route($url, $method)
    {
     foreach($this->routes as $route) {
         if($route['url'] === $url && $route['method'] === strtoupper($method)) {
             return require base_path($route['controller']);
         }
     }

    $this -> abort(404);
    }

    protected function abort($code = 404) {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}