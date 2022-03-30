<?php

class Conversation {

    private $id;
    private $userId1;
    private $userId2;

    private $messages = [];

    public function fillByRow(array $row){
        $this->setId($row['id']);
        $this->setUserId1($row['userId1']);
        $this->setUserId2($row['userId2']);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserId1() {
        return $this->userId1;
    }

    public function setUserId1($userId1) {
        $this->userId1 = $userId1;
    }

    public function getUserId2() {
        return $this->userId2;
    }

    public function setUserId2($userId2) {
        $this->userId2 = $userId2;
    }

    public function getMessages(){
        return $this->messages;
    }

    public function setMessages($messages) {
        $this->messages = $messages;
    }
}