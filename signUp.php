<?php
    include_once "include/signUp-inc.php"
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
    <link rel="shortcut icon" href="images/logoBlack.png" type="image/x-icon" />
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
                    <form action="include/signUp-inc.php" method="post">
                            <label for="username">Username:</label><br>
                            <input name="username" type="text" class="input"><br>
                            <label for="password">Password:</label><br>
                            <input name="password" type="text" class="input"><br>
                            <label for="email">Email:</label><br>
                            <input name="email" type="email" class="input"><br>
                            <label for="secondEmail">Backup Email:</label><br>
                            <input name="secondEmail" type="email" class="input"><br>
                            <label for="firstName">First Name:</label><br>
                            <input name="firstName" type="text" class="input"><br>
                            <label for="lastName">Last Name:</label><br>
                            <input name="lastName" type="text" class="input"><br>
                            <label for="phoneNumber">Phone Number:</label><br>
                            <input name="phoneNumber" type="text" class="input"><br>
                            <label for="address">Address:</label><br>
                            <input name="address" type="text" class="input"><br>
                            <label for="dateOfBirth">Date Of Birth:</label><br>
                            <input name="dateOfBirth" type="date" class="input"><br>
                            <input type="submit" value="Login" name="submit">
                    </form>
                </div>

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