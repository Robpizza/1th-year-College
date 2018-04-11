<?php

class post {

    private $instance = null;
    private $con = null;

    public function __construct(database $instance) {
        $this->instance = $instance;
        $this->con = $this->instance->getConnection();
    }

    public function insert(string $name, string $content) {
        return $this->con->query("INSERT INTO posts(post_id, post_author, post_content, post_data) VALUES (DEFAULT ,'$name','$content',DEFAULT )");
    }

    public function getPosts() {
        $result = $this->con->query("SELECT * FROM posts ORDER BY post_id DESC");
        if($result->num_rows > 0) {


            $out = "";
            while($row = $result->fetch_assoc()) {
                $out .= '<div class="post">' . PHP_EOL;
                $out .= '<h1>' . $row['post_author'] . "</h1>" . PHP_EOL;
                $out .= '<p>' . $row['post_content'] . "</p>" . PHP_EOL;
                $out .= '<p class="post_footer">' . $row['post_data'] . "</p>" . PHP_EOL;
                $out .= '</div>';
            }
            return $out;
        }
        return 0;
    }
}