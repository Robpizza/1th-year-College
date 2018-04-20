<?php
$instance = new Instances();


if(isset($_GET['user'])) {
    if(is_numeric($_GET['user'])) {
        $user = new User($_GET['user'], $instance->getMySQL());
        if($user == null) {
            $error = "User not found :(";
        }
    } else {
        $error = "<p>User not found!</p>";
    }
} else {
    $user = new User($_SESSION['user_id'], $instance->getMySQL());
}

$ownProfile = null;
if($_SESSION['user_id'] == $user->getId()) {
    $ownProfile = true;
} else {
    $ownProfile = false;
}





// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if ($_FILES['fileToUpload']['error'] > 0) {
        $output = "Error: " . $_FILES['fileToUpload']['error'] . "<br />";
    } else {
        $validExtension = array('.jpg', '.jpeg', '.png', '.gif');
        $fileExtension = strrchr($_FILES['fileToUpload']['name'], ".");

        if(in_array($fileExtension, $validExtension)) {

            $newName = time() . '_' . $_FILES['fileToUpload']['name'];
            $manipulator = new ImageManipulator($_FILES['fileToUpload']['tmp_name']);
            $newImage = $manipulator->resample(256, 256);
            $destination = '/home/RobHutten/web/robpizza.nl/public_html/public/resources/user_images/';
            $manipulator->save($destination . $newName);
            $user->setUserPicture('/public/resources/user_images/' . $newName);
            $output = "Done...";
        } else {
            $output = "You must upload an image...";
        }
    }
}


?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo $user->getName() ?>'s profile</h1>
    </section>
    <section class="content container-fluid">

        <div class="profile">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <div class="profile-tab">
                        <h4>
                            <?php echo $user->getName() ?></h4>
                        <p><?php echo $user->getRank() ?></p>
                        <img src="<?php echo $user->getPicture() ?>" alt="Avatar">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <h4>Username: <small><?php echo $user->getName() ?></small></h4>
                    <h4>Status: <small><?php echo $user->getStatusText() ?></small></h4>
                    <h4>Age: <small><?php echo $user->getAge() ?></small></h4>
                    <h4>Minecraft account name: <small><?php echo $user->getMinecraftName() ?></small></h4>
                    <h4>First join: <small><?php echo $user->getJoinDate() ?></small></h4>
                    <h4>Last login: <small><?php echo $user->getLastOnline() ?></small>
                    </h4><small>This is both Site/Ingame</small>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-8">
                    <?php
                    if($ownProfile) {
                        ?>
                        <form method="post" enctype="multipart/form-data">
                            Select image to upload:
                            <input type="file" name="fileToUpload" id="fileToUpload" />
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                        <?php
                        if(isset($output)) {
                            echo $output;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>