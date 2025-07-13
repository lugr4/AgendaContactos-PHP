<?php
/** 
 * 
 *  
*/

define('LUA_VERSION','1.0.0');
define('LUA_NAME','agenda');
define('LUA_DEBUG', true);
define('LUA_DIR', __DIR__);
define('LUA_URL', '/lua/agendacontactos/index.php');


if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    echo '<div class="error"><p><strong>Error:</strong> Composer autoload file not found. Please run <code>composer install</code> in the project directory.</p></div>';
    return;
}
require_once __DIR__ . '/vendor/autoload.php';

use Lua\Core\App;
use DI\Container;
use DI\ContainerBuilder;

/** 
 * Función para retornar una instacia del container PHP-DI para injeccion de instancias 
 * 
*/
function get_container():Container {
    global $container;

    if (null === $container) {
        $builder = new ContainerBuilder();
        $builder->useAutowiring(true);
        $builder->useAttributes(true);
        
        $container = $builder->build();
    
    }
    return $container;

}

function init():void{
     try {
        $container = get_container();
        /** @var App $app */
        $app = $container->get(App::class);
        $app->run();
    } catch (Exception $e) {
        echo '<div class="error"><p><strong>Error:</strong> Failed to initialize. ' . $e->getMessage() . '</p></div>';
    }
}

init();


