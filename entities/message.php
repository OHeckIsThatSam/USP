<?php

class Message {

    private $id;
    private $senderId;
    private $conversationId;
    private $content;
    private $timeSent;

    public function fillByRow(array $row){
        $this->setId($row['id']);
        $this->setSenderId($row['senderId']);
        $this->setConversationId($row['conversationId']);
        $this->setContent($row['content']);
        $this->setTimeSent($row['timeSent']);
    }
 
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSenderId() {
        return $this->senderId;
    }

    public function setSenderId($senderId) {
        $this->senderId = $senderId;
    }

    public function getConversationId() {
        return $this->conversationId;
    }

    public function setConversationId($conversationId) {
        $this->conversationId = $conversationId;
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