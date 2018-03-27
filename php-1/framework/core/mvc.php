<?php
require 'database.php';
class mvc {

    private $controller;
    private $action;
    private $controllerObject;
    private $method;
    private $database = null;

    public function __construct() {
        $this->controller = ucfirst($_GET['controller']);
        $this->action = ucfirst($_GET['action']);
        $this->method = ucfirst($_GET['action']);
        $this->database = new database();

        if(is_file('../framework/controller/' . $_GET['controller'] . '.php')) {
            include '../framework/controller/' . $_GET['controller'] . '.php';
        } else {
            echo "Error: Controller [" . $_GET['controller'] . "] does not exist!";
            die(0);
        }
        $this->controllerObject = new $this->controller($this->database);
    }

    /**
     * @return string
     */
    public function getAction(): string {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getMethod(): string {
        return $this->method;
    }

    public function getFeedback() {
        if(method_exists($this->controllerObject, $this->method)) {
            $controller = $this->controllerObject;
            $method = $this->method;
            return $controller->$method();
        } else {
            die("Action [" . $this->method . "] does not exist!");
        }
        //return $controller->$method();
    }
}