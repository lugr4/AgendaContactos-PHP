<?php

use Lua\Core\CLogger;

if (!function_exists('log_error')) {
    function log_error(string $message, array $context = [], string $channel = null): void {
        CLogger::logError($message, $context, $channel);
    }
}

if (!function_exists('log_info')) {
    function log_info(string $message, array $context = [], string $channel = null): void {
        CLogger::logInfo($message, $context, $channel);
    }
}