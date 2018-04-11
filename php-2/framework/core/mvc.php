<?php
include 'menu.php';

class mvc {

    private $controller;
    private $action;
    private $controllerObject;
    private $method;
    private $database;

    public function __construct(database $database) {

        //Controller is gezet en niet leeg
        if(isset($_GET['controller']) && !empty($_GET['controller'])) {
            $this->controller = ucfirst($_GET['controller']);
        } else {
            $this->controller = "page";
        }

        //Actin is gezet en niet leeg
        if(isset($_GET['action']) && !empty($_GET['action'])) {
            $this->method = ucfirst($_GET['action']);
        } else {
            $this->method = "getShow";
        }

        if(is_file('../framework/controller/' . $this->controller . '.php')) {
            include '../framework/controller/' . $this->controller . '.php';
        } else {
            echo "Error: Controller [" . $this->controller . "] does not exist!";
            die(0);
        }

        $this->database = $database;
        $this->controllerObject = new $this->controller($this->database);
    }


    private function getFeedback() {
        if (method_exists($this->controllerObject, $this->method)) {
            $controller = $this->controllerObject;
            $method = $this->method;
            return $controller->$method();
        } else {
            die("Action [" . $this->method . "] does not exist!");
        }
    }




    public function generateHTML() {
//
//        Check if the output contains JSON
//
        if($this->controller == "Api") {
            die($this->getFeedback());
        }

        $out = '<!DOCTYPE html>' . PHP_EOL;
        $out .= '<html>' . PHP_EOL;
        $out .= '<head>' . PHP_EOL;
        $out .= '<title>Php</title>' . PHP_EOL;
        $out .= '<link rel="stylesheet" href="public/css/main.css" />' . PHP_EOL;
        $out .= '<link rel="stylesheet" href="public/css/crud_table.css" />' . PHP_EOL;
        $out .= '<link rel="stylesheet" href="public/css/crud_form.css" />' . PHP_EOL;
        $out .= '</head>' . PHP_EOL;
        $out .= '<body>' . PHP_EOL;
        $out .= $this->getNavMenu() . PHP_EOL;
        $out .= $this->getFeedback() . PHP_EOL;
        $out .= '</body>' . PHP_EOL;
        $out .= '</html>' . PHP_EOL;
        return $out;
    }

    public function getNavMenu() {
        $menu = new menu($this->database);
        return $menu->getNavBar();
    }

}