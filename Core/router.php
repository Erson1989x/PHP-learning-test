<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function add($url, $controller, $method)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }
    public function get($url, $controller)
    {
        return $this->add($url, $controller, "GET");
    }

    public function post($url, $controller)
    {
        return $this->add($url, $controller, "POST");
    }

    public function delete($url, $controller)
    {
        return $this->add($url, $controller, "DELETE");
    }

    public function put($url, $controller)
    {
        return $this->add($url, $controller, "PUT");
    }

    public function only ($middleware)
    {
        $route = array_pop($this->routes);
        $route['middleware'] = $middleware;
        $this->routes[] = $route;

        return $this;
    }

    public function patch($url, $controller)
    {
        return $this->add($url, $controller, "PATCH");
    }

    public function route($url, $method)
    {
     foreach($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === strtoupper($method)) {
                if ($route['middleware']) {
                    $middleware = Middleware::MAP[$route['middleware']];

                    (new $middleware())->handle();
                }
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