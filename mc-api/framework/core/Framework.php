<?php
define('PHP_TAB', "\t");
session_start();
class Framework {


    private $instance;
    private $page;
    private $objPage = null;
    private $activePage;
    private $user;

    public function __construct(Instances $instances) {
        $this->instance = $instances;

        /***
         * Check if the user gave an page
         */
        if(isset($_GET['page'])) {
            if(strpos(strtoupper($_GET['page']), "LOGOUT") !== false) {
                $_SESSION = array();
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }
                session_destroy();
                header('Location: http://robpizza.nl');
            }
            $this->page = $_GET['page'];
        } else {
            $this->page = 'home';
        }





        /***
         * Make all the necessary class Instances
         */
        $this->user = new User($_SESSION['user_id'], $this->instance->getMySQL());
    }





    public function loadPage() {
        $selected = __DIR__ . "/../pages/$this->page.php";
        $this->objPage = new Page($this->page, $this->instance->getMySQL());
        if(is_file($selected && !$this->instance->getUserManager()->hasPerms($this->objPage->getViewRank(), $this->user))) {
            $this->activePage = $this->page;

            ob_start();
            include_once $selected;
            return ob_get_clean();
        } else {
            ob_start();
            include_once __DIR__ . "/../pages/not-found.php";
            return ob_get_clean();
        }
    }


    public function loadJS() {
        $output = '<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<script src="/public/resources/libraries/jquery/dist/jquery.min.js"></script>' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<script src="/public/resources/libraries/bootstrap/dist/js/bootstrap.min.js"></script>' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<script src="/public/resources/js/adminlte.min.js"></script>' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<script src="/public/resources/js/Chart.bundle.js"></script>' . PHP_EOL;
        return $output;
    }

    public function loadHeader() {
        $output = '<head>' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<title>' . $this->page . '| UserPanel</title>' . PHP_EOL;
        $output .= PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<meta charset="utf-8">' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">' . PHP_EOL;
        $output .= PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<link rel="stylesheet" href="/public/resources/libraries/bootstrap/dist/css/bootstrap.min.css" />' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<link rel="stylesheet" href="/public/resources/libraries/font-awesome/css/font-awesome.min.css" />' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<link rel="stylesheet" href="/public/resources/libraries/Ionicons/css/ionicons.min.css" />' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<link rel="stylesheet" href="/public/resources/css/AdminLTE.min.css" />' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<link rel="stylesheet" href="/public/resources/css/skins/skin-red.min.css" />' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<link rel="stylesheet" href="/public/resources/css/profile.css" />' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<link rel="stylesheet" href="/public/resources/css/login.css" />' . PHP_EOL;
        $output .= PHP_TAB . PHP_TAB . '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />' . PHP_EOL;
        $output .= PHP_TAB . '</head>' . PHP_EOL;
        return $output;
    }


    public function getMenuItems() {
        $connection = $this->instance->getMySQL()->getConnection();
        $result = $connection->query("SELECT menu_name, menu_icon, menu_link, menu_view_rank FROM site_menu_items");


        $output = "";
        $output .= '<li class="header">OPTIONS</li>' . PHP_EOL;

        while ($row = $result->fetch_assoc()) {
            if(strpos(strtoupper($row['menu_name']), strtoupper($this->page)) !== false) {
                $output .= PHP_TAB . PHP_TAB . PHP_TAB . PHP_TAB . PHP_TAB . PHP_TAB . '<li class="active"><a href="' . $row["menu_link"] . '"><i class="fa fa-' . $row["menu_icon"] . '"></i> <span>' . $row["menu_name"] . '</span></a></li>' . PHP_EOL;
            } else {
                if(!($this->user->getRank() >= $row['menu_view_rank'])) {
                    continue;
                }
                $output .= PHP_TAB . PHP_TAB . PHP_TAB . PHP_TAB . PHP_TAB . PHP_TAB . '<li><a href="' . $row["menu_link"] . '"><i class="fa fa-' . $row["menu_icon"] . '"></i> <span>' . $row["menu_name"] . '</span></a></li>' . PHP_EOL;
            }
        }
        return $output;
    }
}