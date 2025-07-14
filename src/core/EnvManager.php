<?php
/** 
 * 
 * 
*/

namespace Lua\Core;

use Dotenv\Dotenv;

/** 
 * 
*/
class EnvManager {
    private static bool $loaded = false;

    /**
     * Carga el archivo .env si aún no ha sido cargado
     */
    private static function load_env(): void {
        if (!self::$loaded) {
            $env_path = defined('LUA_DIR') ? LUA_DIR : dirname(dirname(__DIR__)); 
            if (file_exists($env_path . '/.env')) {
                $dotenv = Dotenv::createImmutable($env_path);
                $dotenv->safeLoad();
            } else {
                
            }
            self::$loaded = true;
        }
    }

    /**
     * Obtener una variable de entorno segura
     *
     * @param string $key     Clave a obtener
     * @param mixed  $default Valor por defecto si no está definida
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed {
        self::load_env();
        return $_ENV[$key] ?? $default;
    }

    
}