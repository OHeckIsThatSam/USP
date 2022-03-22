<?php
if(isset( $_POST['submit'] )) {
    require 'database.php';
    // Takes form values from the request
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $secondEmail = $_POST['secondEmail'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $dateOfBirth = $_POST['dateOfBirth'];

    if(empty($username) || empty($password) || empty($email) || empty($secondEmail) || empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($address) || empty($dateOfBirth)) {
        header("Location: ../signUp.php");
        exit();
    }

    $query = "INSERT INTO user (username, password, email, secondEmail, firstName, lastName, phoneNumber, address, dateOfBirth) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)){
        header("Location: ../signUp.php&error=sqlError");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssssss", $username, $password, $email, $secondEmail, $firstName, $lastName, $phoneNumber, $address, $dateOfBirth);
    mysqli_stmt_execute($stmt);
    header("Location: ../login.php");
    exit();
}