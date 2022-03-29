<?php
if(isset( $_POST['submit'] )) {
    require 'database-inc.php';
    require_once '../entities/user.php';

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

    create($user);

    header("Location: ../login.php");
    exit();
}