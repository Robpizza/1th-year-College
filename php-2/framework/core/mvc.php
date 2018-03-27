<?php
require 'database.php';
include 'menu.php';

class mvc {

    private $controller;
    private $action;
    private $controllerObject;
    private $method;
    private $database = null;

    public function __construct() {

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
        $this->database = new database();

        if(is_file('../framework/controller/' . $this->controller . '.php')) {
            include '../framework/controller/' . $this->controller . '.php';
        } else {
            echo "Error: Controller [" . $this->controller . "] does not exist!";
            die(0);
        }
        $this->controllerObject = new $this->controller($this->database);
    }

    private function checkVar($var) {
        if(isset($_GET[$var]) && !empty($_GET[$var])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getMethod(): string {
        return $this->method;
    }

    public function getFeedback() {
        if (method_exists($this->controllerObject, $this->method)) {
            $controller = $this->controllerObject;
            $method = $this->method;

            if (strpos($method, "All") !== false) {
                echo $controller->$method();
                die();
            }

            return $controller->$method();
        } else {
            die("Action [" . $this->method . "] does not exist!");
        }
    }

    public function getMenu() {
        $menu = new menu($this->database);
        return $menu->getNavBar();
    }
}