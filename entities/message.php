<?php

class Message {

    private $id;
    private $content;
    private $timeSent;

    public function fillByRow(array $row){
        $this -> setId($row['id']);
        $this -> setContent($row['content']);
        $this -> setTimeSent($row['timeSent']);
    }
 
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getTimeSent() {
        return $this->timeSent;
    }

    public function setTimeSent($timeSent) {
        $this->timeSent = $timeSent;
    }
}