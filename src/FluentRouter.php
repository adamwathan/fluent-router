<?php namespace AdamWathan\FluentRouter;

class FluentRouter
{
    private $router;
    private $routes = [];

    public function __construct(\Illuminate\Routing\Router $router)
    {
        $this->router = $router;
    }

    public function get($uri, $target = null)
    {
        return $this->addRoute('get', $uri, $target);
    }

    public function post($uri, $target = null)
    {
        return $this->addRoute('post', $uri, $target);
    }

    public function put($uri, $target = null)
    {
        return $this->addRoute('put', $uri, $target);
    }

    public function patch($uri, $target = null)
    {
        return $this->addRoute('patch', $uri, $target);
    }

    public function delete($uri, $target = null)
    {
        return $this->addRoute('delete', $uri, $target);
    }

    protected function addRoute($method, $uri, $target)
    {
        $route = new Route($uri, $target);
        $this->routes[$method][] = $route;
        return $route;
    }

    public function registerRoutes()
    {
        foreach ($this->routes as $method => $routes) {
            foreach ($routes as $route) {
                $this->router->{$method}($route->uri, $route->extras);
            }
        }
    }
}
