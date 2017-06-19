<?php

namespace Entity;


class AddPartner {
    
    
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
    
    /**
     * @var string 
     */
    private $status;

    
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

    public function getStatus() {
        return $this->status;
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

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }


}
