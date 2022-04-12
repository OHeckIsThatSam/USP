<?php
require_once 'include/database.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USP : Become Mentor</title>
    <link rel="stylesheet" href="css/mobile.css"> 
    <link rel="stylesheet" media="only screen and (min-width:720px)" href="css/desktop.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="images/logoBlack.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body>
    <div id="pageContainer">
        <div class="container">
            <header>

                <div class="logoContainer">
                <a href="index.php">
                    <img alt="logo" src="images/logoBlack.png"> 
                </a>
                </div> <br>
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="searchPeople.php">Find People</a></li>
                        <li><a href="conversations.php">Conversations</a></li>
                        <li><a href="viewProfile.php">Profile</a></li>
                        <li><a href="index.php">LogOut</a></li>
                    </ul>
                </nav>
                <div class="icooonss">
                    <a href="conversations.php"><i class='fa fa-comments-o' style="font-size:35px"></i></a>
                    <a href="editProfile.php"><i class="fa fa-user-circle" style="font-size:35px"></i></a>
                    <a href="becomeMentor.php"><i class="fa fa-user-times" style="font-size:35px"></i></a>
                </div>
            </header>
        </div>
        <div id="content">
            <section>
                <h1>Become A Mentor</h1>
            </section>
        </div> 
        <h2>Want to be a mentor... Please fill in this form!</h2>
    <div class="mentor-quest1">
        <p>What Industry you have experience in?</p>
        <textarea name="" id="" cols="30" rows="5"></textarea>
    </div>
    <div class="mentor-quest2">
        <p>Why do you want to be a mentor?</p>
        <textarea name="" id="" cols="30" rows="5"></textarea>
    </div>
    <div class="proof">
        <p class="Text-here">Please upload proof of your relevant experience here</p>
        <form action="/action_page.php">
        <input type="file" id="myFile" name="filename">
        <!-- <input type="submit"> -->
        </form>
    </div> <br> <br> <br> <br>
    <a href="home.php"><button class="Mentor-SUb">submit</button></a> 
        <br> <br>
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