<?php

class content {


    private $database;
    public $output;

    public function __construct(database $database) {
        $this->database = $database;
        $this->output = "This is my output";
    }

    /**
     * @return string
     */
    public function show(): string {
        return $this->output;
    }


}