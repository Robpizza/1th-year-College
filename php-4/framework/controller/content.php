<?php

class content {

    private $database;
    public $output = null;

    public function __construct(database $database) {
            $this->database = $database;
    }

    public function show() {
        if(!isset($_GET['id']) || empty($_GET['id'])) {
            $_GET['id'] = 1;
        }
        $results = $this->database->executeQuery("SELECT page_name, page_content FROM page WHERE page_id=" . $_GET['id']);
        array_shift($results);
        $this->output = $results[0];
        return $this->output;
    }
}