<?php
require '../framework/core/mvc.php';
require '../framework/core/database.php';
include_once "../framework/exceptions/MethodNotFoundException.php";

$mvc = new mvc(new database());
$nav = $mvc->getNavMenu();
try {
    $render = $mvc->render();
} catch (MethodNotFoundException $e) {
    $render = $e->getMessage() . $e->getCode();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Php</title>
        <link rel="stylesheet" href="public/css/main.css" />
        <link rel="stylesheet" href="public/css/crud_table.css" />
        <link rel="stylesheet" href="public/css/crud_form.css" />
        </head>
    <body>
        <?php echo $nav ?>
        <?php echo $render ?>
        </body>
    </html>
