<?php
$dbHost="localhost";
$dbUser="root";
$bdPass="";
$dbName="usp";

$conn = mysqli_connect($dbHost, $dbUser, $bdPass, $dbName);

if ($conn) {
    # code...
} else {
    die("Database connection failed!");
}

?>