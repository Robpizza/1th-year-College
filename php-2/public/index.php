<?php
require '../framework/core/mvc.php';
require '../framework/core/database.php';

$mvc = new mvc(new database());

echo $mvc->generateHTML();

