<?php
/** 
 * Archivo de rutas
 * 
 * @package AgendaContactos
 * @since 1.0.0
*/

use FastRoute\RouteCollector;

return function(RouteCollector $r){
    $r->addRoute('GET', '/', ['App\Controllers\HomeController', 'index']);
    $r->addRoute('GET', '/pagina', ['App\Controllers\PaginaController', 'index']);
};
