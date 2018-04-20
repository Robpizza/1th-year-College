<?php
require '../framework/Instances.php';


$instance = new Instances();
$framework = new Framework($instance);

$userManager = $instance->getUserManager();

if(!$userManager->checkLogin()) {
    header('Location: /login.php');
}


$id = $_SESSION['user_id'];
$user = new User($id, $instance->getMySQL());
?>
<!DOCTYPE html>
<html>
    <?php echo $framework->loadHeader() ?>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="#" class="logo">
                    <span class="logo-mini"><b>U</b>M</span>
                    <span class="logo-lg"><b>User</b>Menu</span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!--                            <li class="dropdown messages-menu">-->
                            <!--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                            <!--                                    <i class="fa fa-envelope-o"></i>-->
                            <!--                                    <span class="label label-success">0</span>-->
                            <!--                                </a>-->
                            <!--                                <ul class="dropdown-menu">-->
                            <!--                                    <li class="header">You have 0 messages</li>-->
                            <!--                                    <li>-->
                            <!--                                        <ul class="menu">-->
                            <!--                                            <li>-->
                            <!--                                                <a href="#">-->
                            <!--                                                    <div class="pull-left">-->
                            <!--                                                        <img src="resources/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                            <!--                                                    </div>-->
                            <!--                                                    <h4>-->
                            <!--                                                        Support Team-->
                            <!--                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                            <!--                                                    </h4>-->
                            <!--                                                    <p>Why not buy a new awesome theme?</p>-->
                            <!--                                                </a>-->
                            <!--                                            </li>-->
                            <!--                                        </ul>-->
                            <!--                                    </li>-->
                            <!--                                    <li class="footer"><a href="#">See All Messages</a></li>-->
                            <!--                                </ul>-->
                            <!--                            </li>-->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-danger">1</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 1 notifications</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="#"><i class="fa fa-gears text-aqua"></i>Website is still in progress!</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--                                    <li class="footer"><a href="#">View all</a></li>-->
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo $user->getPicture() ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $user->getName() ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?php echo $user->getPicture() ?>" class="img-circle" alt="Avatar">

                                        <p>
                                            <?php echo $user->getRank() . " - " . $user->getName() ?>
                                            <small>Member since <?php echo $user->getJoinDate() ?></small>
                                        </p>
                                    </li>
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <p>Money</p>
                                                <p>&dollar;<?php echo $user->getMoney() ?></p>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <p>Votes</p>
                                                <p><?php echo $user->getVotes() ?></p>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <p>OW's</p>
                                                <p><?php echo $user->getWarnings() ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-footer">
                                        <!--                                        <div class="pull-left">-->
                                        <!--                                            <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                        <!--                                        </div>-->
                                        <div class="pull-right">
                                            <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $user->getPicture() ?>" class="img-circle" alt=" Image" style="height: 45px; width: 45px;">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user->getName() ?></p>
                            <?php echo $user->getStatusHTML() ?>
                        </div>
                    </div>
                    <ul class="sidebar-menu" data-widget="tree">
                        <?php echo $framework->getMenuItems(); ?>
                    </ul>
                </section>
            </aside>


            <?php echo $framework->loadPage(); ?>



            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    Powered by AdminLTE
                </div>
                <strong>Copyright &copy; 2001 - 2018 <a href="#">RobHutten</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- REQUIRED JS SCRIPTS -->

        <?php echo $framework->loadJS() ?>
    </body>
</html>