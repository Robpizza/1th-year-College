<?php

class MySQL {


    private $connection = null;

    public function __construct() {
        $this->connection = new mysqli('localhost', 'RobHutten_User', 'Qxe41I7rJA', 'RobHutten_Website_Panel');
    }

    /**
     * @return mysqli|null
     */
    public function getConnection() {
        if ($this->connection->connect_errno) {
            printf("Connect failed: %s\n", $this->connection->connect_error);
            exit();
        }
        return $this->connection;
    }

    public function testConnection() {

    }
}