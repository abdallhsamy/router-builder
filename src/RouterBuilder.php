<?php

namespace Abdallhsamy\RouterBuilder;
use Illuminate\Routing\Router as IlluminateRouter;

class RouterBuilder extends IlluminateRouter
{
//    private $controller;
//    private $prefix1;
//    private array $methods;
//    private $middleware1;
//    private bool $resourceRouter = false;
//    private bool $apiRsourceRouter = false;
//    private array $routes;
//    private $router;
//
//    /**
//     * RouterBuilder constructor.
//     * @param IlluminateRouter $illuminateRouter
//     */
//    public function __construct(IlluminateRouter $illuminateRouter)
//    {
//        $this->router = $illuminateRouter;
//
//    }
//
//    /**
//     * Set Controller
//     * @param $controller
//     * @return RouterBuilder
//     */
//    public function class($controller): RouterBuilder
//    {
//        $this->controller = $controller;
//        return $this;
//    }
//
//    /**
//     * Set Prefix
//     * @param $prefix
//     * @return RouterBuilder
//     */
//    public function prefix($prefix): RouterBuilder
//    {
//        $this->prefix1 = $prefix;
//        return $this;
//    }
//
//    /**
//     * Set Middleware
//     * @param $middleware
//     * @return RouterBuilder
//     */
//    public function middleware($middleware): RouterBuilder
//    {
//        $this->middleware1 = $middleware;
//        return $this;
//    }
//
//    /**
//     * Set RouterBuilder as resource router
//     * @return RouterBuilder
//     */
//    public function resource(): RouterBuilder
//    {
//        $this->resourceRouter = true;
//        return $this;
//    }
//
//    /**
//     * Set RouterBuilder as apiResource router
//     * @return RouterBuilder
//     */
//    public function apiResource(): RouterBuilder
//    {
//        $this->apiRsourceRouter = true;
//        return $this;
//    }
//
//    /**
//     * add router to the group
//     * @return RouterBuilder
//     */
//    public function newRouter($method, $uri, $action, $name): RouterBuilder
//    {
//        $route = $this->router->$method();
//        $this->routes[] = $route;
//        return $this;
//    }

    private $controller;
    private $prefix;
    private bool $grouped = false;
    private array $siblings;


    public function setController($controller): RouterBuilder
    {
        $this->controller = $controller;
        return $this;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function grouped(): RouterBuilder
    {
        $this->grouped = true;
        return $this;
    }


    /**
     * add router to the group
     * @param string $method
     * @param string $uri
     * @param string $action
     * @param string|null $name
     * @return RouterBuilder
     */
    public function newRouter(
        string $method = 'get',
        string $uri = '/',
        string $action = '__invoke',
        string $name = null
    ): RouterBuilder
    {
        $route = $this->$method($uri, [$this->controller, $action]);

        if ($name) {
            $route->name($name);
        }

        $this->siblings[] = $route;
        return $this;
    }

    public function generate()
    {
        $this->prefix($this->prefix)->group(function (RouterBuilder $router) {
            $this->siblings;
            foreach ($this->siblings as $route) {
                $this->$route->method($route->uri, [$this->controller, $route->action]);
            }
        });
        return $this;
    }
}
