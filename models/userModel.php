<?php
class UserModel {

    public function create($user){
        require_once '../entities/user.php';
        require '../include/database.php';

        $query = "INSERT INTO user (username, password, email, secondEmail, firstName, lastName, phoneNumber, address, dateOfBirth) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssss", $user -> getUsername(), $user -> getPassword(), $user -> getEmail(), $user -> getSecondEmail(), 
        $user -> getFirstName(), $user -> getLastName(), $user -> getPhoneNumber(), $user -> getAddress(), $user -> getDateOfBirth());
        $stmt->execute();
    }

    public function getUserById($id){
        require_once '../entities/user.php';
        require '../include/database.php';

        $query = "SELECT id, username, password, email, secondEmail, firstName, lastName, phoneNumber, address, dateOfBirth, description, reported
        FROM user WHERE id = ?";
    
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
    
        $user = new User();
        $user -> fillByRow($row);
        return $user;
    }

    public function loginDetailsCorrect($username, $password){
        require '../include/database.php';

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

        $user = $this -> getUserById($row['id']);
        return $user;
    }
}


