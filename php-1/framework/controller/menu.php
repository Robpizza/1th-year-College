<?php

class menu {

    private $mvc;

    public function __construct(mvc $mvc) {
            $this->mvc = $mvc;
    }

    /**
     * @return mvc
     */
    public function getMvc(): mvc {
        return $this->mvc;
    }
}