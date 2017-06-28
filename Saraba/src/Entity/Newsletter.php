<?php


namespace Entity;

class Newsletter {
    /*
     * @var int
     */
    private $id;
    
    /*
     * @var string
     */
    private $email;
    
    /*
     * @var string
     */
    private $date;
    
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDate() {
        return $this->date;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }


}
