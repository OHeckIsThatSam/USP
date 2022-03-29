<?php

class TagModel {

    public function findById($id){
        require '../include/database.php';
        require_once '../entities/tag.php';

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

    public function findAllTags(){
        require '../include/database.php';
        require_once '../entities/tag.php';

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

    public function createUserTags($userId, $tags){
        require '../include/database.php';
        require_once '../entities/tag.php';
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

    public function findAllUserTags($userId){
        require '../include/database.php';
        require_once '../entities/tag.php';

        $query = "SELECT tagId FROM user_tags WHERE userId = ?";
    
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $result = $stmt->get_result();
    
        $tags = [];
        while ($row = $result->fetch_assoc()) {
            $tag = $this -> findById($row['tagId']);
            $tags[] = $tag;
        }
        return $tags;
    }
}