<?php
if(isset( $_POST['submit'] )) {
    include 'database.php';
    // Takes form values from the request
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $secondEmail = $_POST['secondEmail'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $dateOfBirth = $_POST['dateOfBirth'];

    if(empty($username) || empty($password) || empty($email) || empty($secondEmail) || empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($dateOfBirth)) {
        header("Location: ../signUp.php");
        exit();
    }

    $query = "INSERT INTO user (username, password, email, secondEmail, firstName, lastName, phoneNumber, address, dateOfBirth) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
}