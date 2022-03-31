<?php

// User bussiness logic
function create($user){
    require_once 'C:\xampp\htdocs\USP\entities\user.php';
    require 'database.php';

    $query = "INSERT INTO user (username, password, email, secondEmail, firstName, lastName, phoneNumber, address, dateOfBirth) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssss", $user -> getUsername(), $user -> getPassword(), $user -> getEmail(), $user -> getSecondEmail(), 
    $user -> getFirstName(), $user -> getLastName(), $user -> getPhoneNumber(), $user -> getAddress(), $user -> getDateOfBirth());
    $stmt->execute();
}

function findUserById($id){
    require_once 'C:\xampp\htdocs\USP\entities\user.php';
    require 'database.php';

    $query = "SELECT * FROM user WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $user = new User();
    $user -> fillByRow($row);
    return $user;
}

function loginDetailsCorrect($username, $password){
    require 'database.php';

    // If the username is correct
    $query = "SELECT id FROM user WHERE username = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    if($row == null) {
        return;
    }

    // If the password is also correct
    $query = "SELECT id FROM user WHERE password = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $password);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    if($row == null) {
        return;
    }

    $user = findUserById($row['id']);
    return $user;
}

function findUsersByTags($tags){
    require_once 'C:\xampp\htdocs\USP\entities\user.php';
    require_once 'C:\xampp\htdocs\USP\entities\tag.php';
    require 'database.php';

    $users = [];
    foreach($tags as &$tag) {
        $query = "SELECT userId FROM user_tags WHERE tagId = ?";

        $stmt = $conn->prepare($query);
        $tagId = $tag->getId();
        $stmt->bind_param("i", $tagId);
        $stmt->execute();

        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) {
            $user = findUserById($row);
            if(!in_array($user, $users)) {
                $users[] = $user;
            } 
        }
    }
    return $users;
}

// Tag bussiness logic

function findTagById($id){
    require_once 'C:\xampp\htdocs\USP\entities\tag.php';
    require 'database.php';
    
    $query = "SELECT * FROM tag WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $tag = new Tag();
    $tag -> fillByRow($row);
    return $tag;
}

function findAllTags(){
    require_once 'C:\xampp\htdocs\USP\entities\tag.php';
    require 'database.php';
    
    $query = "SELECT * FROM tag ORDER BY name";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->get_result();

    $tags = [];
    while ($row = $result->fetch_assoc()) {
        $tag = new Tag();
        $tag -> fillByRow($row);
        $tags[] = $tag;
    }
    return $tags;
}

function userTagExists($userId, $tagId){
    require_once 'C:\xampp\htdocs\USP\entities\tag.php';
    require 'database.php';

    $query = "SELECT id FROM user_tags WHERE userId = ? AND tagId = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userId, $tagId);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if(is_null($row)) {
        return False;
    }
    return True;
}

function createUserTag($userId, $tagId){
    require 'database.php';

    if(!userTagExists($userId, $tagId)) {
        $query = "INSERT INTO user_tags (userId, tagId) VALUES (?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $userId, $tagId);
        $stmt->execute();
    }
}

function findAllUserTags($userId){
    require_once 'C:\xampp\htdocs\USP\entities\tag.php';    
    require 'database.php';

    $query = "SELECT tagId FROM user_tags WHERE userId = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    $result = $stmt->get_result();

    $tags = [];
    while ($row = $result->fetch_assoc()) {
        $tag = findTagById($row['tagId']);
        $tags[] = $tag;
    }
    return $tags;
}

function findTagsByStringArray($stringArray){
    require_once 'C:\xampp\htdocs\USP\entities\tag.php';    
    require 'database.php';

    $tags = [];
    foreach($stringArray as &$tagName) {
        $query = "SELECT * FROM tag WHERE name LIKE ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $tagName);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if(!is_null($row)) {
            $tag = new Tag();
            $tag->fillByRow($row);
            $tags[] = $tag;
        }
    }
    return $tags;
}

// Message bussiness logic

function findMessageById($messageId){
    require_once 'C:\xampp\htdocs\USP\entities\message.php';
    require 'database.php';

    $query = "SELECT * FROM message WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $messageId);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $message = new Message();
    $message -> fillByRow($row);
    return $message;
}

function findAllMessages(){
    require_once 'C:\xampp\htdocs\USP\entities\message.php';
    require 'database.php';

    $query = "SELECT * FROM message ORDER BY DATE(timeSent) DESC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $message = new Message();
        $message -> fillByRow($row);
        $messages[] = $message;
    }
    return $messages;
}

function createMessage($senderId, $conversationId, $timeSent, $content){
    require_once 'C:\xampp\htdocs\USP\entities\message.php';
    require 'database.php';

    $query = "INSERT INTO message (senderId, conversationId, timeSent, content) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiss", $senderId, $conversationId, $timeSent, $content);
    $stmt->execute();
}

function findConversationById($conversationId){
    require_once 'C:\xampp\htdocs\USP\entities\conversation.php';
    require 'database.php';

    $query = "SELECT * FROM conversation WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $conversationId);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $conversation = new Conversation();
    $conversation->fillByRow($row);
    $conversation->setMessages(findMessagesByConversationId($conversationId));
    return $conversation;
}

function findMessagesByConversationId($conversationId){
    require_once 'C:\xampp\htdocs\USP\entities\message.php';
    require 'database.php';

    $query = "SELECT * FROM message WHERE conversationId = ? ORDER BY DATE(timeSent)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $conversationId);
    $stmt->execute();

    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $message = new Message();
        $message -> fillByRow($row);
        $messages[] = $message;
    }
    return $messages;
}

function findAllUserConversations($userId){
    require_once 'C:\xampp\htdocs\USP\entities\conversation.php';
    require_once 'C:\xampp\htdocs\USP\entities\message.php';
    require 'database.php';

    // Get all conversations where the user is involved
    $query = "SELECT * FROM conversation WHERE userId1 = ? OR userId2 = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userId, $userId);
    $stmt->execute();

    $result = $stmt->get_result();
    $conversations = [];
    while ($row = $result->fetch_assoc()) {
        $conversation = new Conversation();
        $conversation->fillByRow($row);
        
        // Populate the conversation object with the messages
        $conversation->setMessages(findMessagesByConversationId($conversation->getId()));

        // Add the conversation to the array
        $conversations[] = $conversation;
    }
    return $conversations;
}

/*-----milestone logic------*/

