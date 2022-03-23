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