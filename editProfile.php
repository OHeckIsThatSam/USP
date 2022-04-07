<?php
require_once 'include/database-inc.php';
require_once 'entities/user.php';
session_start();

if(is_null($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$sessionUser = $_SESSION['user'];

if(isset($_POST['addTag'])) {
    $userId = $sessionUser->getId();
    $tagId = $_POST['tagId'];
    createUserTag($userId, $tagId);
}

if(isset($_POST['removeTag'])) {
    $userId = $sessionUser->getId();
    $tagId = $_POST['removeTagId'];
    removeUserTag($userId, $tagId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
                <i class="fa fa-comments-o" style="font-size:35px"></i>
                <i class="fa fa-user-circle" style="font-size:35px"></i>
                <i class="fa fa-user-times" style="font-size:35px"></i>
                </div>
            </header>
        </div>
        <div id="content">
            <section>
                <h1>Edit Profile</h1>

                <h3>Your tags</h3>
                <ul id="tagList">
                <?php
                $userId = $sessionUser->getId();
                $tags = findAllUserTags($userId);

                $out = "";
                foreach($tags as &$tag) {
                    $out .= "<li>".$tag->getName();
                    $out .= "<form action='editProfile.php' method='post'>";
                    $out .= "<input type='hidden' name='removeTagId' value='".$tag->getId()."'>";
                    $out .= "<input type='submit' name='removeTag' value='Remove'>";
                    $out .= "</form></li>";
                }
                echo($out);
                ?>
                </ul>

                <h3>Add tags</h3>
                <form action="editProfile.php" method="post">
                <label for="tags">Add a tag: </label>
                <select name="tagId" id="tags">
                    <?php
                    $allTags = findAllTags();
                    $out = "";
                    foreach($allTags as &$tag){
                        $out .= "<option value='". $tag->getId() ."'>". $tag->getName() ."</option>";
                    }
                    echo($out);
                    ?>
                </select>
                <input type="submit" value="Add" name="addTag">
                </form>
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