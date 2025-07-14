<?php

/** 
 * 
 * 
*/

namespace Lua\Core;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;


/** 
 * Clase manejador para el logger
 * 
*/
class CLogger {

  private static array $loggers = [];

    // logError('Algo falló', ['id' => 123], 'booster');
    // logInfo('Módulo iniciado', [], 'boosters');
    /**
     * Obtener logger principal o específico
     */
    public static function getLogger(string $channel = 'lua'): Logger {
        if (!isset(self::$loggers[$channel])) {
            $logDir = LUA_DIR . 'logs/';
            $logPath = $logDir . "{$channel}.log";
    
            if (!is_dir($logDir)) {
                mkdir($logDir, 0755, true);
            }
            $logger = new Logger($channel);
            $logger->pushHandler(new StreamHandler($logPath, Logger::DEBUG));
    
            self::$loggers[$channel] = $logger;
        }
    
        return self::$loggers[$channel];
    }
    
    

    /**
     * Loguear en el log general y en uno específico (si se indica)
     */
    public static function logError(string $message, array $context = [], string $extraChannel = null): void {
        self::getLogger()->error($message, $context); // app.log
        if ($extraChannel) {
            self::getLogger($extraChannel)->error($message, $context); // boosters.log, etc.
        }
    }

    public static function logInfo(string $message, array $context = [], string $extraChannel = null): void {
        self::getLogger()->info($message, $context);
        if ($extraChannel) {
            self::getLogger($extraChannel)->info($message, $context);
        }
    }

}