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
    <title>Conversations</title>
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
                    <a href="conversations.php"><i class='fa fa-comments-o' style="font-size:35px"></i></a>
                    <a href="editProfile.php"><i class="fa fa-user-circle" style="font-size:35px"></i></a>
                    <a href="mentor.php"><i class="fa fa-user-times" style="font-size:35px"></i></a>
                </div>
            </header>
        </div>
        <div id="content">
            <section>
                <h1>Conversations</h1>
                <?php
                require_once 'C:\xampp\htdocs\USP\entities\conversation.php';
                require_once 'C:\xampp\htdocs\USP\entities\message.php';

                $conversations = findAllUserConversations($sessionUser->getId());
                
                $out = "<div class='searchResults'>";
                foreach($conversations as &$conversation) {
                    if($sessionUser->getId() == $conversation->getUserId1()) {
                        $otherUser = findUserById($conversation->getUserId2());
                    } else {
                        $otherUser = findUserById($conversation->getUserId1());
                    }
                    $out .= "<div class='conversationBlock'><h4>".$otherUser->getFirstName()." ".$otherUser->getLastName()."</h4>";
                    $messages = findMessagesByConversationId($conversation->getId());
                    $out .= "<p>".end($messages)->getContent()."</p>";
                    $out .= "<a href=\"viewConversation.php?id=".$conversation->getId()."\">View Conversation</a></div>";
                }
                $out .= "</div>";
                echo($out);
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