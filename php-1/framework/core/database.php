<?php

class database {
    private $connection = null;
    private $errorMessage = "No errors occurred!";

    public function __construct() {
        $this->connection = new mysqli('localhost', 'robhutten', '', 'robhutten');
        if($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    /**
     * @return mysqli
     */
    public function getConnection(): mysqli {
        return $this->connection;
    }

    public function executeUpdate(string $query) {
        $connection = $this->connection;
        $result = $connection->query($query);

        if (!$result) {
            $out = 'Invalid query: ' . $this->connection->error;
            return $out;
        }

        if($result->num_rows > 0) {
            $out[] = array('succes' => true, 'message' => "Result for query: '" . $query . "'");
            while($row = $result->fetch_assoc()) {
                array_push($out, $row);
            }
        }

        return $out;
    }



    /**
     * @return string
     */
    public function getErrorMessage(): string {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    private function setErrorMessage(string $errorMessage) {
        $this->errorMessage = $errorMessage;
    }
}