<?php
require '../framework/core/mvc.php';

if(!isset($_GET['controller']) || empty($_GET['controller'])) {
    header('Location: ?controller=page&action=show');
}

$mvc = new mvc();

$_action = $mvc->getAction();
$_method = $mvc->getMethod();
$_return = $mvc->getFeedback();

echo "Action: " . $_action . "<br/>";
echo "Method: " . $_method . "<br/>";
echo "Return: " . $_return . "<br/>";
?>