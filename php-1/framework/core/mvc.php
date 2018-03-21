<?php

class mvc {

    private $controller;
    private $action;
    private $controllerObject;
    private $method;

    public function __construct() {
        $this->controller = ucfirst($_GET['controller']);
        $this->action = ucfirst($_GET['action']);
        $this->method = 'get' . ucfirst($_GET['action']);

        if(is_file('../framework/controller/' . $_GET['controller'] . '.php')) {
            include '../framework/controller/' . $_GET['controller'] . '.php';
        } else {
            die("Controller does not exist!");
        }

        //$this->controllerObject = new $this->controller();
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
        $controller = $this->controllerObject;
        $method = $this->method;

        if(method_exists($this->controllerObject, $this->action)) {
            die("Controller exist!");
        } else {
            die("Controller does not exist!");
        }
        return $controller->$method();
    }
}