<?php

class database {

    private $connection = null;

    public function __construct() {
        $this->connection = new mysqli();
    }

    /**
     * @return mysqli|null
     */
    public function getConnection(): mysqli {
        return $this->connection;
    }
}