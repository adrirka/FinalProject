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
    
    /**
    * @var string
    */
    private $name;
            
    
    /**
    * @var string
    */
    private $email;

    
    /**
    * @var string
    */
    private $subject;
    
    /**
    * @var string
    */
    private $message;

    
            


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

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }

    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function getDisplayableStatus()
    {
        switch ($this->status) {
            case 'accepted':
                return 'Accepté';
            case 'pending':
                return 'En attente';
            case 'refused':
                return 'Refusé';
        }
    }
}
