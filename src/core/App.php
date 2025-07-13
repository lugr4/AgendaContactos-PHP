<?php

/** 
 * 
 * 
*/

namespace Lua\Core;

class App{

    private RoutesManager $router;

    public function __construct(RoutesManager $router) {
        $this->router = $router;
    }

    /** 
     * Inicia proyecto
     * 
    */
    public function run(){
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $basePath = LUA_URL;
        if (str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath));
            if ($uri === '') $uri = '/';
        }
        // echo $uri;
        $this->router->dispatch($httpMethod, $uri);
    }

}