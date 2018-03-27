<?php

class page {

    private $database;

    public function __construct(database $database) {
            $this->database = $database;
    }

    public function getAllPages() {
        header('Content-Type: application/json');
        $result = $this->database->executeUpdate("SELECT * FROM page");
        print_r(json_encode($result));
    }

    public function getShow() {
        if(!isset($_GET['id']) || empty($_GET['id'])) {
            $_GET['id'] = 1;
        }
        $results = $this->database->executeUpdate("SELECT * FROM page WHERE page_id=" . $_GET['id']);
        return $results[1];
    }
}