<?php
require '../framework/core/mvc.php';
$mvc = new mvc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Php</title>
        <link rel="stylesheet" href="public/main.css" />
        <link rel="stylesheet" href="public/crud_table.css" />
        <link rel="stylesheet" href="public/crud_form.css" />
    </head>

    <?php
    echo $mvc->getMenu();
    echo $mvc->getFeedback();
    ?>

</html>
