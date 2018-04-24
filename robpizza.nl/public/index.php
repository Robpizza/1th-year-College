<?php
require '../framework/core/mvc.php';
require '../framework/core/database.php';
include_once "../framework/exceptions/ControllerNotFoundException.php";
include_once "../framework/exceptions/MethodNotFoundException.php";
include_once "../framework/exceptions/ViewNotFoundException.php";

$mvc = new mvc(new database());
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Php</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>


    </head>
    <body>


        <!-- Navbar goes here -->
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">Logo</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>


        <!-- Page Layout here -->
        <div class="row">

            <div class="col s3">
                <!-- Grey navigation panel -->
                <ul id="slide-out" class="sidenav">
                    <li><div class="user-view">
                            <div class="background">
                                <img src="images/office.jpg">
                            </div>
                            <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                            <a href="#name"><span class="white-text name">John Doe</span></a>
                            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                        </div></li>
                    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                    <li><a href="#!">Second Link</a></li>
                    <li><div class="divider"></div></li>
                    <li><a class="subheader">Subheader</a></li>
                    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
                </ul>
            </div>

            <div class="col s9">
                <div>Hi i'm the page content</div>
                <!-- Teal page content  -->
            </div>

        </div>


        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script>
    </body>
</html>
