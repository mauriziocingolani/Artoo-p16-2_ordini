<?php

class Database {

    private $connection;
    private static $istanza;

    private function __construct() {
        
    }

    public function chiedi($sqlString) {
        $result = $this->connection->query($sqlString);
        if ($this->connection->errno > 0)
            throw new Exception($this->connection->error);
        return $result;
    }

    public function chiudi() {
        if (!$this->connection instanceof mysqli)
            throw new Exception('Connessione già chiusa!');
        $this->connection->close();
        $this->connection = null;
//        self::$istanza=null;# NOOOOOOO!!!
    }

    public static function GetIstanza($host, $user, $password) {
        if (self::$istanza == null) {
            self::$istanza = new self();
            # connessione
            self::$istanza->connection = new mysqli($host, $user, $password);
            if (self::$istanza->connection->connect_errno > 0)
                throw new Exception(self::$istanza->connection->connect_error);
        } else {
            if (!self::$istanza->connection) :
                # connessione
                self::$istanza->connection = new mysqli($host, $user, $password);
                if (self::$istanza->connection->connect_errno > 0)
                    throw new Exception(self::$istanza->connection->connect_error);
            endif;
        }
        return self::$istanza;
    }

}
