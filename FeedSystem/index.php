<?php
require 'database.php';
require 'post.php';

$databaseInstance = new database();
$postInstance = new post($databaseInstance);
$connection = $databaseInstance->getConnection();
$result = $connection->query("SELECT * from posts");


if(isset($_POST['send'])) {
    if (empty($_POST['name']) || empty($_POST['content']) || $_POST['name'] == "" || $_POST['content'] == "") {
        echo "Vul aub alles in.";
        $error = 1;
    }
    if(!isset($error)) {

        $postInstance->insert($_POST['name'], $_POST['content']);

    }
}

?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>FeedBack | System</title>
        <link rel="stylesheet" href="recourses/css/main.css"/>
    </head>

    <body>
        <div class="container">
            <form method="post">
                <label>Naam: </label>
                <input type="text" name="name">

                <label>Content: </label>
                <textarea name="content" maxlength="175" placeholder="Voer hier je feedback in. (max 175)"></textarea>

                <input type="submit" name="send" value="send">
            </form>

            <?php
            echo $postInstance->getPosts();
            ?>
        </div>
        <footer>
            <p>COPYRIGHT &copy; ROBHUTTEN 2001 - 2018</p>
        </footer>
    </body>
</html>

