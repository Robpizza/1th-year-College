<?php
require '../framework/core/mvc.php';

if(!isset($_GET['controller']) || empty($_GET['controller'])) {
    header('Location: ?controller=page&action=getShow&id=1');
} else if(!isset($_GET['action']) || empty($_GET['action'])) {
    $_GET['action'] = 'getShow';
    $_GET['id'] = 1;
}

$mvc = new mvc();
$_return = $mvc->getFeedback();

if(strpos($_GET['action'], "All") !== false) {
    echo $_return;
    die();
}

?>
<!DOCTYPE hml>
<html>
    <?php
    echo $_return['page_name'] . "<br/>";
    echo $_return['page_content'];
    ?>
    <a href="?controller=page&action=getShow&id=1">Home</a>
    <a href="?controller=page&action=getShow&id=2">Over</a>
    <a href="?controller=page&action=getAllPages">Allemaal</a>
</html>
