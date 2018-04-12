<?php

class MySQL {


    private $connection = null;

    public function __construct() {
        $this->connection = new mysqli('localhost', 'RobHutten_User', 'xGTPQ5ggFK', 'RobHutten_Website_Panel');
    }

    /**
     * @return mysqli|null
     */
    public function getConnection() {
        return $this->connection;
    }
}