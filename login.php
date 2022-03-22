

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        </div> <br>
        <div id="content">
            <section>
                <h1 class="Log">Login Form</h1> <br> <br>
                <div id="loginContainer">
                    <form action="login.php" method="post">
                        <label for="username">Username:</label><br>
                        <input name="username" type="text" class="input"><br>
                        <label for="password">Password:</label><br>
                        <input name="password" type="text" class="input"><br>
                        <input type="submit" value="Login" name="submit">
                    </form> <br>
                    <a href="signUp.php">Not got an account? Click here to sign up.</a> 
                <div> <br> <br>

                <?php
                if(isset( $_POST['submit'] )) {
                    $username = $_REQUEST['username'];
                    $password = $_REQUEST['password'];
                    $out = '<p>Hello '.$username;
                    // $out .= '<p>Your password is '.$password; 
                    // echo($out);
                }
                ?>
                
            </section>
        </div>
    
        <footer>
            <div>
                <a href="#">Contact/Find Us</a>
            </div>
            <div>
                <p id="copyright">Copyright &copy; of USP <script>document.write(new Date().getFullYear())</script></p>  
            </div>
        </footer>
    </div>
</body>
</html>