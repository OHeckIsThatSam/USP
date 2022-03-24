<?php

if(isset( $_POST['submit'] )) {
    require 'database.php';
    require_once '../entities/user.php';
    require_once '../models/userModel.php';
    $userModel = new UserModel();
    
    // Get username and password from http header
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if ethier values are null
    if(empty($username) || empty($password)) {
        header("Location: ../login.php&error=PleaseFillOutAllFields");
        exit();
    }

    $user = $userModel -> loginDetailsCorrect($username, $password);

    if(empty($user)) {
        header("Location: ../login.php&error=UsernameOrPasswordIncorrect");
        exit();
    }

    session_start();
    $_SESSION['user'] = $user;
    header("Location: ../home.php");
    exit();
}