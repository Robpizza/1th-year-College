<?php
require '../framework/core/mvc.php';
$mvc = new mvc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Php</title>
        <link rel="stylesheet" href="css.css"/>
    </head>

    <?php
    echo $mvc->getMenu();
    echo $mvc->getFeedback();
    ?>

</html>
