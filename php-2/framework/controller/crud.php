<?php

class crud {

    private $database;

    public function __construct(database $database) {
        $this->database = $database;
    }


    
    /*
     *  CREATE function
     *  Creates a new page in the database.
     */
    public function create() {
        //  Check if the form is send or not
        //  If not generate a form and return.
        if(!isset($_POST['send'])) {
          $form =  '<form method="post">';
          $form .= '<input type="text" name="name" placeholder="name">';
          $form .= '<input type="text" name="content" placeholder="content">';
          $form .= '<input type="submit" name="send" value="send">';
          $form .= '</form>';
          return $form;

        } else {
            $name = $_POST['name'];
            $content = $_POST['content'];

            //Check if the query succeeded if so return TRUE else return the error.
            if($this->database->executeUpdate("INSERT INTO `page`(`page_id`, `page_name`, `page_content`) VALUES (DEFAULT, '$name', '$content')")) {
                header('Location: ?controller=crud&amp;action=read');
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
        //Get all the pages and the values
        $results = $this->database->executeQuery("SELECT page_id, page_name, page_content FROM page ORDER BY page_id ASC");

        //Remove the first value/ (contains "success" and "query")
        array_shift($results);

        //Generate the HTML code
        $output =  "<table class='read'>" . PHP_EOL;
        $output .= "<tr>" . PHP_EOL;
        $output .= "<th>ID</th>". PHP_EOL;
        $output .= "<th>Name</th>". PHP_EOL;
        $output .= "<th>Edit</th>". PHP_EOL;
        $output .= "<th>Delete</th>". PHP_EOL;
        $output .= "</tr>". PHP_EOL;
        foreach ($results as $value) {
            $output .= "<tr>". PHP_EOL;
            $output .= "<td>" . $value['page_id'] . "</td>". PHP_EOL;
            $output .= "<td>" . $value['page_name'] . "</td>". PHP_EOL;
            $output .= "<td><a href='?controller=crud&amp;action=update&amp;id=" . $value['page_id'] . "'>EDIT</a></td>". PHP_EOL;
            $output .= "<td><a href='?controller=crud&amp;action=delete&amp;id=" . $value['page_id'] . "'>[X]</a></td>". PHP_EOL;
            $output .= "</tr>". PHP_EOL;
        }
        $output .= "<tr>". PHP_EOL;
        $output .= "<td>". PHP_EOL;
        $output .= "<a href='?controller=crud&amp;action=create'>[ADD]</a>". PHP_EOL;
        $output .= "</td>". PHP_EOL;
        $output .= "</table>". PHP_EOL;
        return $output;
    }



    /*
     *  UPDATE function
     *  Update a field from the db.
    */
    public function update() {
        //If there is an ID specified in the URL
        if(isset($_GET['id'])) {
            if(!isset($_POST['send'])) {
                $form =  '<form method="post">';
                $form .= '<input type="text" name="name" placeholder="New name">';
                $form .= '<input type="text" name="content" placeholder="New content">';
                $form .= '<input type="submit" name="send" value="send">';
                $form .= '</form>';
                return $form;
            } else {
                $id = $_GET['id'];
                $name = $_POST['name'];
                $content = $_POST['content'];

                //Check if the query succeeded if so return TRUE else return the error.
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
     *  Update a field from the db.
    */
    public function delete() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            if($this->database->executeUpdate("DELETE FROM `page` WHERE page_id=" . $id)) {
                header('Location: ?controller=crud&action=read');
                return true;
            } else {
                return $this->database->getErrorMessage();
            }
        }
    }
}