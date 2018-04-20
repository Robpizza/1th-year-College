<?php
require '../framework/Instances.php';
$instance = new Instances();
$userManager = $instance->getUserManager();

if($userManager->checkLogin()) {
    header('Location: index.php');
}

if(isset($_POST['send'])) {
    $error = 0;
    if(empty($_GET['uname']) || $_POST['uname'] == "") {
        $error .= "Please fill in your username!<br/>";
    }

    if(empty($_GET['psw']) || $_POST['psw'] == "") {
        $error .= "Please fill in your password!<br/>";
    }

    if($error == 0) {
        if($userManager->login($_POST['uname'], $_POST['psw'])) {
            header('Location: http://robpizza.nl');
        } else {
            $error = $userManager->getErrorMsg();
        }
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');

            html, body {
                height: 100%;
                font-family: 'Source Sans Pro', sans-serif;
                background: #0d2a54;
            }

            body {
                margin: 0;
                padding: 0;
            }

            .flex-container {
                height: 100%;
                padding: 0;
                margin: 0;
                display: -webkit-box;
                display: -moz-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                align-items: center;
                justify-content: center;
            }


            /* Bordered form */
            form {
                border: 3px solid #f1f1f1;
                width: 30%;
                margin: auto;
                background: #f1f1f1;
            }

            /* Full-width inputs */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #468faf;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            /* Add a hover effect for buttons */
            button:hover {
                opacity: 0.8;
            }

            /* Center the avatar image inside this container */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
            }

            /* Avatar image */
            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            /* Add padding to containers */
            .container {
                padding: 16px;
            }

            /* The "Forgot password" text */
            span.psw {
                float: right;
                padding-top: 16px;
            }

            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {-webkit-transform: scale(0)}
                to {-webkit-transform: scale(1)}
            }

            @keyframes animatezoom {
                from {transform: scale(0)}
                to {transform: scale(1)}
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-container">
            <form class="animate" method="post">
                <div class="imgcontainer">
                    <img src="/public/resources/img/login-avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <?php
                    if(isset($error)) {
                        echo $error . "<br/>";
                    }
                    ?>
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" value="<?php if(isset($_POST['uname'])) { echo $_POST['uname']; } ?>">

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" value="<?php if(isset($_POST['psw'])) { echo $_POST['psw']; } ?>">

                    <button type="submit" name="send">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>