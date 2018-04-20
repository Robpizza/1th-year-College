<?php

class Page {


    private $id;
    private $name;
    private $icon;
    private $link;
    private $viewRank;

    private $connection;


    public function __construct(string $name, MySQL $instance) {
        $this->connection = $instance->getConnection();
        $result = $this->connection->query("SELECT * FROM `site_menu_items` WHERE menu_name='$name' LIMIT 1");
        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['menu_id'];
            $this->name = $row['menu_name'];
            $this->icon = $row['menu_icon'];
            $this->link = $row['menu_link'];
            $this->viewRank = $row['menu_view_rank'];
        } else {
            return 0;
        }
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * @return mixed
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getViewRank() {
        return $this->viewRank;
    }
}