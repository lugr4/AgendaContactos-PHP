<?php

/** 
 * 
 * 
 * 
*/
namespace Lua\Core;

use mysqli;

/** 
 * 
 * 
*/
class DatabaseManager {
    private mysqli|null $connection = null;

    public function __construct() {
       
    }
    
    /** 
     * 
     * 
    */
    public function get_connection(): ?mysqli {
         if ($this->connection !== null && empty($this->connection->connect_error)) {
            return $this->connection;
        }

        $dbname     = EnvManager::get('LUA_DB_NAME');
        $dbuser     = EnvManager::get('LUA_DB_USER');
        $dbpassword = EnvManager::get('LUA_DB_PASS');
        $dbhost     = EnvManager::get('LUA_DB_HOST');

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

        if (!empty($this->connection->error)) {
            $this->connection = null;
            die("Connection failed: " . mysqli_connect_error());
            return null;
        }
        
        return $this->connection;
    }


    private function close_connection(){
        if ($this->connection instanceof mysqli && method_exists($this->connection, 'close')) {
            $this->connection->close();
            $this->connection = null;
        }
    }

    private function __destruct(){
        $this->close_connection();
        
    }

}