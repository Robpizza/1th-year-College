<?php

class api {

    private $database;
    private $table;
    private $action;

    public $output;

    public function __construct(database $database) {
        header('Content-Type: application/json');
        $this->database = $database;

        if(isset($_GET['table']) && !empty($_GET['table']) && isset($_GET['action']) && !empty($_GET['action'])) {
            $this->table = $_GET['table'];
            $this->action = $_GET['action'];
        } else {
            $error = json_encode(["succes" => false, "message" => "Table or Action is empty!"]);
            die($error);
        }
    }

    public function get() {
        $result = $this->database->executeQuery("SELECT * FROM $this->table");
        array_shift($result);
        $this->output = json_encode($result);
    }

}