<?php
require 'framework/core/MySQL.php';
$con = new MySQL();
$con->getConnection();
?>
<!DOCTYPE html>
<html>
    <head>

        <title>AdminLTE 2 | Starter</title>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


        <link rel="stylesheet" href="public/resources/libraries/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/resources/libraries/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/resources/libraries/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="public/resources/css/AdminLTE.min.css">
        <link rel="stylesheet" href="public/resources/css/skins/skin-blue.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
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
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">0</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 0 messages</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="public/resources/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">0</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 0 notifications</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="public/resources/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">%USERNAME%</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="public/resources/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            %RANK% - %USERNAME%
                                            <small>Member since %FIRST_JOIN%</small>
                                        </p>
                                    </li>
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <p>%MONEY%</p>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <p>%VOTES%</p>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <p>%OW'S%</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
                            <img src="public/resources/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>%USERNAME%</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> %STATUS%</a>
                        </div>
                    </div>
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">OPTIONS</li>
                        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Coming soon</span></a></li>
                        <li><a href="#"><i class="fa fa-link"></i> <span>Coming soon</span></a></li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Panel Dashboard
                        <small>Welcome %USERNAME%</small>
                    </h1>
                </section>
                <section class="content container-fluid">

                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Unique Players</span>
                            <span class="info-box-number">93,139</span>
                        </div>
                    </div>





                </section>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    Powered by AdminLTE
                </div>
                <strong>Copyright &copy; 2001 - 2018 <a href="#">RobHutten</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- REQUIRED JS SCRIPTS -->
        <script src="public/resources/libraries/jquery/dist/jquery.min.js"></script>
        <script src="public/resources/libraries/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="public/resources/js/adminlte.min.js"></script>
        <script src="public/resources/js/Chart.bundle.js"></script>
    </body>
</html>