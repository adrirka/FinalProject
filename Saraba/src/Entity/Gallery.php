<?php

namespace Entity;

class Gallery {
    
    
    private $id;
    
    private $img;
    
    
    public function getId() {
        return $this->id;
    }

    public function getImg() {
        return $this->img;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setImg($img) {
        $this->img = $img;
        return $this;
    }


}
