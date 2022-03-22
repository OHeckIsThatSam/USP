<?php
require_once 'include/database.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" media="only screen and (min-width:720px)" href="css/desktop.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <div id="pageContainer">
        <div class="container">
            <header>
                <div class="logoContainer">
                    <img alt="logo" src="images/logoBlack.png">
                </div>
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="searchPeople.php">Find People</a></li>
                        <li><a href="conversations.php">Conversations</a></li>
                        <li><a href="viewProfile.php">Profile</a></li>
                        <li><a href="adminDashboard.php">Admin Dashboard</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </nav>
            </header>
        </div>
        <div id="content">
            <section>
                <h1>Sign up</h1>

                <div id="signUpContainer">
                    <form action="signUp.php" method="post">
                            <label for="username">Username:</label><br>
                            <input name="username" type="text" class="input"><br>
                            <label for="password">Password:</label><br>
                            <input name="password" type="text" class="input"><br>
                            <input type="submit" value="Login" name="submit">
                    </form>
                </div>

                <?php
                if(isset( $_POST['submit'] )) {
                    $username = $_REQUEST['username'];
                    $password = $_REQUEST['password'];
                    $out = '<p>Hello '.$username;
                    $out .= '<p>Your password is '.$password; 
                    echo($out);
                }
                ?>

            </section>
        </div>
    
        <footer>
            <div>
                <a href="#">Contact/Find Us</a>
            </div>
            <div>
                <p id="copyright">Copyright &copy; of USP 2021</p>  
            </div>
        </footer>
    </div>
</body>
</html>