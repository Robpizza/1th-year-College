<?php

class database {

    private $database = null;

    public function  __construct() {
        $this->database = new mysqli("localhost", "feedbackSysteem", "", "feedbackSysteem");
    }

    /**
     * @return mysqli|null
     */
    public function getConnection(): mysqli {
        return $this->database;
    }
}