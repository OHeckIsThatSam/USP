<?php

class Tag {
    
    private $id;
    private $name;

    public function fillByRow(array $row){
        $this -> setId($row['id']);
        $this -> setName($row['name']);
    }
 
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}