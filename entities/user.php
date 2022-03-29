<?php

class User {

    private $id;
    private $username;
    private $password;
    private $email;
    private $secondEmail;
    private $firstName;
    private $lastName;
    private $phoneNumber;
    private $address;
    private $dateOfBirth;
    private $description;
    private $reported;

    public function fillByRow(array $row) {
        $this -> setId($row['id']);
        $this -> setUsername($row['username']);
        $this -> setPassword($row['password']);
        $this -> setEmail($row['email']);
        $this -> setSecondEmail($row['secondEmail']);
        $this -> setFirstName($row['firstName']);
        $this -> setLastName($row['lastName']);
        $this -> setPhoneNumber($row['phoneNumber']);
        $this -> setAddress($row['address']);
        $this -> setDateOfBirth($row['dateOfBirth']);
        $this -> setDescription($row['description']);
        $this -> setReported($row['reported']);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUserName($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSecondEmail() {
        return $this->secondEmail;
    }

    public function setSecondEmail($secondEmail) {
        $this->secondEmail = $secondEmail;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getReported() {
        return $this->reported;
    }

    public function setReported($reported) {
        $this->reported = $reported;
    }
}