<?php
include 'menu.php';

class mvc {

    private $controller;
    private $controllerObject;
    private $method;
    private $database;

    public function __construct(database $database) {

        //Controller is gezet en niet leeg
        if(isset($_GET['controller']) && !empty($_GET['controller'])) {
            $this->controller = ucfirst($_GET['controller']);
        } else {
            $this->controller = "content";
        }

        //Action is gezet en niet leeg
        if(isset($_GET['action']) && !empty($_GET['action'])) {
            $this->method = ucfirst($_GET['action']);
        } else {
            $this->method = "show";
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



    public function render() {
        if (method_exists($this->controllerObject, $this->method)) {
            $controller = $this->controllerObject;
            $method = $this->method;

            $controller->$method();

            return $this->getView($controller);

        }
        return "Error occured!";
    }

    public function getView($controller) {

        $filePath = "../framework/views/$this->controller/$this->method.phtml";
        $layout = "../framework/views/layout/html.phtml";

        if(is_file($filePath)) {

            ob_start();
            $file = file_get_contents($filePath);
            eval('?>' . $file);

        } else {
            echo "bestaat niet";
        }
        return ob_get_clean();
    }

    public function getNavMenu() {
        $menu = new menu($this->database);
        return $menu->getNavBar();
    }

}