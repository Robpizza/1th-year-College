<?php
include_once 'classes/User.php';
include_once 'classes/UserManager.php';
include_once 'classes/ImageManipulator.php';
include_once 'classes/Page.php';
include_once 'core/Framework.php';
include_once 'core/MySQL.php';

class instances {

    private $UserManager = null;
    private $MySQL = null;

    public function __construct() {

        $this->MySQL = new MySQL();
        $this->UserManager = new UserManager($this->MySQL);

    }

    /**
     * @return MySQL|null
     */
    public function getMySQL(): MySQL {
        return $this->MySQL;
    }

    /**
     * @return null|UserManager
     */
    public function getUserManager(): UserManager {
        return $this->UserManager;
    }

}