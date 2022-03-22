<?php
require_once 'include/database.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USP</title>
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" media="only screen and (min-width:720px)" href="css/desktop.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <div id="pageContainer">
        <div name="container">
            <header>
            </header>
        </div>
    
        <div id="content">
            <section>
                <h1>Sign Up</h1>
                <form action="test.php" method="post">
                    <label for = "name" >Name: </label><br>
                    <input type = "text" id = "name" name = "name" >
                    <input type = "submit" name = "submit">
                </form>

                <?php
                // Query to get all entites from the table
                $sql = "SELECT * FROM tbl_test";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                
                if ($rowCount > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['message'];
                    }
                } else {
                    echo "No results found.";
                }
                /*
                Code for getting data from form
                if(isset( $_POST['submit'] )) {
                    $name = $_REQUEST['name'];
                    echo('Your name is ' .$name);
                }
                */
                ?>  
            </section>
        </div>
</body>