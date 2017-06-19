<?php

namespace Entity;


class Partner {

    
    /*
    * @var int
    */
    private $id;
    
    /*
    * @var string
    */
    private $title;
    
    /*
    * @var string
    */
    private $content;
    
    /*
    * @var string
    */
    private $img;
    
    
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getImg() {
        return $this->img;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setImg($img) {
        $this->img = $img;
        return $this;
    }

}
