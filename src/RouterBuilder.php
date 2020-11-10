<?php

namespace Abdallhsamy\RouterBuilder;
use Illuminate\Routing\Router as IlluminateRouter;

class RouterBuilder
{
    private $controller;
    private $prefix1;
    private array $methods;
    private $middleware1;
    private bool $resourceRouter = false;
    private bool $apiRsourceRouter = false;
    private array $routes;
    private $router;

    /**
     * RouterBuilder constructor.
     */
    public function __construct(IlluminateRouter $illuminateRouter)
    {
        $this->router = $illuminateRouter;

    }

    /**
     * Set Controller
     * @param $controller
     * @return RouterBuilder
     */
    public function class($controller): RouterBuilder
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * Set Prefix
     * @param $prefix
     * @return RouterBuilder
     */
    public function prefix($prefix): RouterBuilder
    {
        $this->prefix1 = $prefix;
        return $this;
    }

    /**
     * Set Middleware
     * @param $middleware
     * @return RouterBuilder
     */
    public function middleware($middleware): RouterBuilder
    {
        $this->middleware1 = $middleware;
        return $this;
    }

    /**
     * Set RouterBuilder as resource router
     * @return RouterBuilder
     */
    public function resource(): RouterBuilder
    {
        $this->resourceRouter = true;
        return $this;
    }

    /**
     * Set RouterBuilder as apiResource router
     * @return RouterBuilder
     */
    public function apiResource(): RouterBuilder
    {
        $this->apiRsourceRouter = true;
        return $this;
    }

    /**
     * add router to the group
     * @return RouterBuilder
     */
    public function newRouter($method, $uri, $action, $name): RouterBuilder
    {
        $route = $this->router->$method();
        $this->routes[] = $route;
        return $this;
    }

}
