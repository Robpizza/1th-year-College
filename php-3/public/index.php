<?php
require '../framework/core/mvc.php';
require '../framework/core/database.php';

$mvc = new mvc(new database());
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
        <?php echo $mvc->getNavMenu() ?>
        <?php echo $mvc->render() ?>
        </body>
    </html>
