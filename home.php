<?php
require_once 'include/database-inc.php';
require_once 'entities/user.php';
session_start();

if(is_null($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$sessionUser = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" media="only screen and (min-width:720px)" href="css/desktop.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="images/logoBlack.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> -->
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
                        <?php
                        $out = "";
                        if(!isset($sessionUser)) {
                            $out .= "<li><a href='login.php'>Login</a></li>";
                        } 
                        if(userIsAdmin($sessionUser->getId())) {
                            $out .= "<li><a href='adminDashboard.php'>Admin Dashboard</a></li>";
                        }
                        echo($out);
                        ?>
                    </ul>
                </nav>
                <div class="ic">
                <a href="conversations.php"><i class='fa fa-comments-o' style="font-size:35px"></i></a>
                <a href="editProfile.php"><i class="fa fa-user-circle" style="font-size:35px"></i></a>
                <a href="becomeMentor.php"><i class="fa fa-user-times" style="font-size:35px"></i></a>
                </div>
            </header>
        </div>
        <div id="content">
            <section>
                <h1>Home</h1>
            </section>
        </div>
        <!-- <div class="post-input-container">
                        <textarea class="textho" rows="3" placeholder="What's your thoughts?"></textarea>
                        <form action="/action_page.php">
                            <input type="file" id="myFile" name="filename">
                            <button class="submitted">Submit</button>
                        </form> 
            </div> -->
            <div class="Post-Box">
                <div class="wrapper">
                    <section class="post">
                        <h1 class="Create-post">Create Post</h1>
                        <form action="#">
                            <div class="contenntt">
                                <img class="user-icon" src="images/profilepicture.jpg" alt="Profile">
                                <div class="details">
                                    <p>Asad Imtiaz</p>
                                <div class="privacy">
                                <i class='fas fa-user-friends'></i>
                                    <span>Friends</span>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                                </div>
                            </div>
                            <textarea  placeholder="What's your thoughts" required ></textarea>
                            <div class="theme-emoji">
                                <img src="images/theme-svgrepo-com.svg" alt="" style="width: 25px;" >
                                <img src="images/smiley-svgrepo-com.svg" alt=""  style="width: 25px;">
                            </div>
                            <div class="options">
                                <p>Add to your post</p>
                                <ul class="list">
                                    <li><img src="images/gallery-svgrepo-com.svg" alt="" style="width: 25px;"></li>
                                    <li><img src="images/tag-svgrepo-com.svg" alt="" style="width: 25px;"></li>
                                    <li><img src="images/wink-emoji-svgrepo-com.svg" alt="" style="width: 25px;"></li>
                                    <li><img src="images/more-svgrepo-com.svg" alt="" style="width: 25px;"></li>
                                </ul>
                            </div>
                            <button>Post</button>
                        </form>
                    </section>
                </div>
            </div>
            <br> <br> <br>
        <footer>
            <div>
                <a href="#">Contact/Find Us</a>
            </div>
            <div>
                <p id="copyright">Copyright &copy; of USP <script>document.write(new Date().getFullYear())</script></p>  
            </div>
        </footer>
    </div>
    <script src="JS/main.js"></script>
</body>
</html>