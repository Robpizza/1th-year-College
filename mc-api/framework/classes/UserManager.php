<?php
class UserManager {


    private $connection = null;
    private $errorMsg = null;


    public function __construct(MySQL $instance) {
        $this->connection = $instance->getConnection();
    }



    public function login(string $username, string $password) {
        $error = 0;


        if($username == "") {
            $error = 1;
            $this->errorMsg = "Please enter an username!<br/>";
        }
        if($password == "") {
            $error = 1;
            $this->errorMsg .= "Please enter a password!";
        }

        if(!$error) {

            $user_id = 0;
            $user_verified = 0;
            $stmt = $this->connection->prepare("SELECT user_id, user_verified FROM users WHERE user_name=? AND user_password=? LIMIT 1");
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            $stmt->bind_result($user_id, $user_verified);
            $stmt->store_result();

            if($stmt->num_rows == 1) {
                if($stmt->fetch()) {
                    if($user_verified == 1) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['user_id'] = $user_id;
                        $stmt->close();
                        return true;
                    } else {
                        $this->errorMsg = "Je account moet nog geactiveerd worden!";
                        return false;
                    }
                }
                $stmt->close();
                return false;
            }
            $this->errorMsg = "Je staat niet in onze database!";
            $stmt->close();
            return false;
        }
        return false;
    }


    public function checkLogin() {
        if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
            return true;
        } else {
            return false;
        }
    }

    public function hasPerms(int $i, User $user) {
        if($user->getRank() >= $i) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return null
     */
    public function getErrorMsg() {
        return $this->errorMsg;
    }

}