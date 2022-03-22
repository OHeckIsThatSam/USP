<?php
$dbHost="localhost";
$dbUser="root";
$bdPass="";
$dbName="db_usp";

$conn = mysqli_connect($dbHost, $dbUser, $bdPass, $dbName);

if ($conn) {
    # code...
} else {
    die("Database connection failed!");
}

?>