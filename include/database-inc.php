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

function createUserTags($userId, $tags){
    require_once 'C:\xampp\htdocs\USP\entities\tag.php';
    require 'database.php';
    
    // For each tag check if it has a relationship with user in the databse
    foreach($tags as &$tag) {
        $query = "SELECT id FROM user_tags WHERE userId = ? AND tagId = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $userId, $tag->getId());
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // If nothing is returned then create the relationship
        if(is_null($row)) {
            $query = "INSERT INTO user_tags (userId, tagId) VALUES (?, ?) ";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $userId, $tag->getId());
            $stmt->execute();
        }
    }
    unset($tag);
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