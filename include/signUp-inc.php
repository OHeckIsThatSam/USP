<?php
if(isset( $_POST['submit'] )) {
    require 'database.php';
    require_once '../entities/user.php';
    require_once '../models/userModel.php';

    $userModel = new UserModel();
    $user = new User();

    $user -> setUsername($_POST['username']);
    $user -> setPassword($_POST['password']);
    $user -> setEmail($_POST['email']);
    $user -> setSecondEmail($_POST['secondEmail']);
    $user -> setFirstName($_POST['firstName']);
    $user -> setLastName($_POST['lastName']);
    $user -> setPhoneNumber($_POST['phoneNumber']);
    $user -> setAddress($_POST['address']);
    $user -> setDateOfBirth($_POST['dateOfBirth']);

    $userModel -> create($user);

    header("Location: ../login.php?");
    exit();
}