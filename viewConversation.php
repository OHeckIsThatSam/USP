<?php
require_once 'include/database-inc.php';
require_once 'C:\xampp\htdocs\USP\entities\user.php';
require_once 'C:\xampp\htdocs\USP\entities\conversation.php';
require_once 'C:\xampp\htdocs\USP\entities\message.php';
session_start();

if(is_null($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$sessionUser = $_SESSION['user'];

if(isset($_POST['send'])) {
    createMessage($sessionUser->getId(), $_POST['id'], date("Y-m-d h:i:s"), $_POST['message']);
}

if(is_null($_REQUEST['id'])) {
    header("Location: conversations.php");
    exit();
}
$conversation = findConversationById($_REQUEST['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Conversation</title>
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
                <a href="conversation.php"><i class="fa fa-comments-o" style="font-size:35px"></i></a>
                <a href="editProfile.php"><i class="fa fa-user-circle" style="font-size:35px"></i></a>
                <a href="mentor.php"><i class="fa fa-user-times" style="font-size:35px"></i></a>
                </div>
            </header>
        </div>
        <div id="content">
            <section>
                <h1>View Conversation</h1>
                <?php
                $out = "<div id='chatBox'>";
                $messages = $conversation->getMessages();
                foreach($messages as &$message) {
                    if($sessionUser->getId() == $message->getSenderId()){
                        $float = "floatRight";
                    }else{
                        $float = "floatLeft";
                    }
                    $out .= "<p class='".$float."'>".$message->getContent();
                }
                $out .= "</div>";
                echo($out);
                ?>
                <form action="viewConversation.php" method="post">
                    <input type="hidden" name="id" value="<?php echo($conversation->getId()) ?>">
                    <input type="text" name="message" placeholder="Message here...">
                    <input type="submit" value="Send" name="send">
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