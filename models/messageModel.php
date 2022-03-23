<?php

class MessageModel {

    public function findById($id){
        require_once '../entities/message.php';
        require '../include/database.php';

        $query = "SELECT * FROM message WHERE id = ?";
    
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    
        $message = new Message();
        $message->fillByRow($row);
        return $message;
    }
}