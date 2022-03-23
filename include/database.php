<?php
$dbHost="localhost";
$dbUser="root";
$bdPass="";
$dbName="usp";

$conn = new mysqli($dbHost, $dbUser, $bdPass, $dbName);

if (!$conn) {
    die("Database connection failed!");
}

?>