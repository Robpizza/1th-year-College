<?php

class page {

    private $database;

    public function __construct(database $database) {
            $this->database = $database;
    }

    public function getAllPages() {
        header('Content-Type: application/json');
        $result = $this->database->executeQuery("SELECT * FROM pajge");
        return json_encode($result);
    }

    public function getShow() {
        if(!isset($_GET['id']) || empty($_GET['id'])) {
            $_GET['id'] = 1;
        }
        $results = $this->database->executeQuery("SELECT page_content FROM page WHERE page_id=" . $_GET['id']);
        array_shift($results);
        return $results[0]['page_content'];
    }
}