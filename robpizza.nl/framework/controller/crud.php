<?php

class crud {

    private $database;
    public $output;

    public function __construct(database $database) {
        $this->database = $database;
    }



    /*
     *  CREATE function
     *  Creates a new page in the database.
     */
    public function create() {
        if(isset($_POST['send'])) {
            $name = $_POST['name'];
            $content = $_POST['content'];
            if($this->database->executeUpdate("INSERT INTO `page`(`page_id`, `page_name`, `page_content`) VALUES (DEFAULT, '$name', '$content')")) {
                header('Location: ?controller=crud&action=read');
                return true;
            } else {
                return $this->database->getErrorMessage();
            }
        }
    }



    /*
     *  READ function
     *  Get all the values from the db
     */
    public function read() {
        $results = $this->database->executeQuery("SELECT page_id, page_name, page_content FROM page ORDER BY page_id ASC");
        array_shift($results);
        $this->output = $results;
    }



    /*
     *  UPDATE function
     *  Update a field from the db.
    */
    public function update() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            if(!isset($_POST['send'])) {
                $results = $this->database->executeQuery("SELECT page_name, page_content FROM page WHERE page_id=" . $id);
                array_shift($results);
                $this->output = $results[0];
            } else {
                $name = $_POST['name'];
                $content = $_POST['content'];
                if($this->database->executeUpdate("UPDATE `page` SET `page_name`='$name',`page_content`='$content' WHERE page_id=$id")) {
                    header('Location: ?controller=crud&action=read');
                    return true;
                } else {
                    return $this->database->getErrorMessage();
                }
            }
        }
    }



    /*
     *  DELETE function
     *  Delete a record from the db.
    */
    public function delete() {
        if(isset($_GET['id'])) {
            if($this->database->executeUpdate("DELETE FROM `page` WHERE page_id=" . $_GET['id'])) {
                header('Location: ?controller=crud&action=read');
            } else {
                return $this->database->getErrorMessage();
            }
        }
    }
}