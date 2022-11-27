<?php 

declare(strict_types=1);

namespace App\Core;

use App\Exceptions\Router\{RouteDuplicateException, RouteNotFoundException};

class Router
{
    private $routes;

    public function get(string $route, callable|array $action)
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action)
    {
        return $this->register('post', $route, $action);
    }

    public function resolve(string $uri, string $method)
    {
        $method = strtolower($method);

        $route = explode('?', $uri)[0];       
        $action = $this->routes[$method][$route] ?? null;

        try {
            if (!$action) {
                throw new RouteNotFoundException();
            }
            
            if (is_callable($action)) {
                return call_user_func($action);
            }
    
            if (is_array($action)) {
                [$class, $method] = $action;
    
                $class = new $class();
    
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
    
            throw new RouteNotFoundException();
            
        } catch (RouteNotFoundException $e) {
            http_response_code(404);

            return View::make('404', ['message' => $e->getMessage()]);
        }
    }

    private function register(string $method, string $route, callable|array $action)
    {
        try {
            if (isset($this->routes[$method][$route])) {
                throw new RouteDuplicateException();
            }

            $this->routes[$method][$route] = $action;

            return $this;
        } catch (RouteDuplicateException $e) {
            return $e->getMessage();
        }
    }
}