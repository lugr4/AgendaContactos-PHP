<?php
/** 
 * Archivo.
 * 
 * @package AgendaContactos
 * @since 1.0.0
*/

namespace Lua\Core;

use FastRoute;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

/** 
 * Clase manejador de rutas
 * 
*/

class RoutesManager {

    private Dispatcher $dispatcher;

    public function __construct() {
        $routes = require_once __DIR__ . '/../Routes/web.php';
        $this->dispatcher = FastRoute\simpleDispatcher($routes);
    }

    /** 
     * Funcion dispatch
     * 
    */
    public function dispatch($httpMethod, $uri) {
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo 'NOT FOUND';
                // ... 404 Not Found
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                echo 'METHOD NOT ALLOWED';
                // ... 405 Method Not Allowed
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                
                list($class, $method) = $handler;
                $controller = get_container()->get($class);
                $response = call_user_func_array([$controller, $method], $vars);
                echo $response; 
                break;
        }
    }
}

