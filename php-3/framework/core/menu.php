<?php

class menu {

    private $database;

    public function __construct(database $database) {
        $this->database = $database;
    }

    public function getNavBar() {
        $results = $this->database->executeQuery("SELECT menu_name, menu_href FROM menu ORDER BY menu_id ASC");
        array_shift($results);
        $output =   "<nav>" . PHP_EOL;
        $output .=  "<ul>" . PHP_EOL;

        foreach ($results as $menuItem) {
            $output .= "<li>" . PHP_EOL;
            $output .= "<a href='" . $menuItem['menu_href'] . "'>" . $menuItem['menu_name'] . "</a>" . PHP_EOL;
            $output .= "</li>" . PHP_EOL;
        }

        $output .=   "</ul>" . PHP_EOL;
        $output .=  "</nav>" . PHP_EOL;
        return $output;
    }
}