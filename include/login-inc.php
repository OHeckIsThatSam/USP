<?php

if(isset( $_POST['submit'] )) {
    require 'database.php';
    require_once 'entities\user.php';
    $user = new User();
    $user -> setUsername($_POST['username']);
    $user -> setPassword($_POST['password']);

    echo($user -> getUsername());

    exit();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        header("Location: ../login.php&error=PleaseFillOutAllFields");
        exit();
    }

    $query = "SELECT username FROM user WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)){
        header("Location: ../login.php&error=sqlError");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $rowCount = mysqli_num_rows($stmt);
    if($rowCount == 0) {
        header("Location: ../login.php&error=UsernameOrPasswordIncorrect");
        exit();
    }

    while ($row = mysqli_fetch_assoc($result)) {
        
    }
}