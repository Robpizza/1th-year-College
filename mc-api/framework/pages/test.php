<?php
$instance = new Instances();
$userManager = $instance->getUserManager();

$user = new User($_SESSION['user_id'], $instance->getMySQL());

if(!$userManager->hasPerms(1, $user)) {
        header('Location: /home');
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>TEST PAGE <small>Don't mind this page</small>
        </h1>
    </section>
    <section class="content container-fluid">


        <b>Test page reached</b>
    </section>
</div>