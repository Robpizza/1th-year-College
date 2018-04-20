<?php

class User {

    private $connection = null;


    private $user_id = null;
    private $user_name = null;
    private $user_email = null;
    private $user_picture = null;
    private $user_password = null;
    private $user_verified = null;


    private $user_rank_id = null;
    private $user_minecraft_name = null;
    private $user_status_text = null;
    private $user_age = null;
    private $user_join_date = null;
    private $user_last_online = null;
    private $user_money = null;
    private $user_votes = null;
    private $user_ow = null;

    private $user_online = null;

    public function __construct(int $id, MySQL $instance) {
        $this->user_id = $id;
        $this->connection = $instance->getConnection();

        $result_user = $this->connection->query("SELECT user_id, user_name, user_email, user_picture, user_password, user_verified FROM users WHERE user_id='$id' LIMIT 1");
        $result_data = $this->connection->query("SELECT * FROM user_data WHERE user_id='$id' LIMIT 1");
        if($result_user->num_rows == 1 && $result_data->num_rows == 1) {
            $userRow = $result_user->fetch_assoc();
            $dataRow = $result_data->fetch_assoc();
            $this->user_name = $userRow['user_name'];
            $this->user_email = $userRow['user_email'];
            $this->user_picture = $userRow['user_picture'];
            $this->user_password = $userRow['user_password'];
            $this->user_verified = $userRow['user_verified'];
            $this->user_online = 1;

            $this->user_rank_id = $dataRow['user_rank_id'];
            $this->user_minecraft_name = $dataRow['user_minecraft_name'];
            $this->user_status_text = $dataRow['user_status_text'];
            $this->user_age = $dataRow['user_age'];
            $this->user_join_date = $dataRow['user_join_date'];
            $this->user_last_online = $dataRow['user_last_login'];
            $this->user_money = $dataRow['user_money'];
            $this->user_votes = $dataRow['user_votes'];
            $this->user_ow = $dataRow['user_warnings'];
        } else {
            return 0;
        }
    }

    /**
     * @return int|null
     */
    public function getId(): int {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->user_name;
    }

    /**
     * @return string
     */
    public function getEmail() : string {
        return $this->user_email;
    }

    /**
     * @return string
     */
    public function getPicture() : string {
        return $this->user_picture;
    }

    /**
     * @param null $user_picture
     */
    public function setUserPicture($user_picture) {
        $this->user_picture = $user_picture;
        $this->connection->query("UPDATE users SET user_picture='$user_picture' WHERE user_id='$this->user_id'");
    }




    /**
     * @return string
     */
    public function getPassword() : string {
        return $this->user_password;
    }

    /**
     * @return bool
     */
    public function getVerified() : bool {
        return $this->user_verified;
    }

    /**
     * @return bool
     */
    public function getStatus() : bool {
        return $this->user_online;
    }

    public function getStatusHTML() {
        if($this->user_online) {
            return '<a href="#"><i class="fa fa-circle text-success"></i> Online</a>' . PHP_EOL;
        } else {
            return '<a href="#"><i class="fa fa-circle text-red"></i> Offline</a>' . PHP_EOL;
        }
    }

    /**
     * @return null
     */
    public function getRank() {
        return $this->user_rank_id;
    }

    /**
     * @return null
     */
    public function getMinecraftName() {
        return $this->user_minecraft_name;
    }


    /**
     * @return null
     */
    public function getStatusText() {
        return $this->user_status_text;
    }

    /**
     * @return null
     */
    public function getAge() {
        return $this->user_age;
    }

    /**
     * @return null
     */
    public function getJoinDate() {
        return $this->user_join_date;
    }

    /**
     * @return null
     */
    public function getLastOnline() {
        return $this->user_last_online;
    }

    /**
     * @return double
     */
    public function getMoney() {
        return $this->user_money;
    }

    /**
     * @return int
     */
    public function getVotes() : int {
        return $this->user_votes;
    }

    /**
     * @return int
     */
    public function getWarnings() : int {
        return $this->user_ow;
    }

}