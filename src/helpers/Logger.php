<?php

namespace Lua\Helpers;
use Lua\Core\CLogger;

class Logger {

    private const DEFAULT_CHANNEL = 'Core';

    /**
     * Log a message with the specified level.
     *
     * @param string $level The log level (e.g., 'error', 'info').
     * @param string $message The message to log.
     * @param array $context Additional context for the log entry.
     * @param string|null $channel Optional channel for the log entry.
     */
    public static function i_log_error(string $message, array $context = [], string $channel = null): void {
        CLogger::logError($message, $context, $channel ?? self::DEFAULT_CHANNEL); // Pasa el canal o el por defecto
    }

    public static function i_log_info(string $message, array $context = [], string $channel = null): void {
        CLogger::logInfo($message, $context, $channel ?? self::DEFAULT_CHANNEL);
    }
}