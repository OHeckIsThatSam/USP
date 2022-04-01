<?php
require_once 'include/database-inc.php';
require_once 'entities/user.php';
session_start();

if(isset($_REQUEST['userId'])) {
    $user = findUserById($_REQUEST['userId']);
} else {
    if(is_null($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
    $user = $_SESSION['user'];
}

if(isset($_POST['startConversation'])) { 
    createConversation($_POST['userId1'], $_POST['userId2']);
    $conversation = findConversationByUserIds($_POST['userId1'], $_POST['userId2']);
    header("Location: viewConversation.php?id=". $conversation->getId());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" media="only screen and (min-width:720px)" href="css/desktop.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="images/logoBlack.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="pageContainer">
        <div class="container">
            <header>

                <div class="logoContainer">
                    <img alt="logo" src="images/logoBlack.png">
                </div> <br>
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
                <div class="ic">
                <i class="fa fa-comments-o" style="font-size:35px"></i>
                <i class="fa fa-user-circle" style="font-size:35px"></i>
                <i class="fa fa-user-times" style="font-size:35px"></i>
                </div>
            </header>
        </div>
        <div id="content">
            <section>
                <h1>View Profile</h1>
                <img id="profilepicture" src="images/profilepicture.jpg" alt="profilepicture">
                <h2><?php echo($user->getFirstName());?> <?php echo($user->getLastName());?></h2>
                <div id="pc1">
                    <ul id="list1">
                        <li>Email: <?php echo($user->getEmail());?></li>
                        <li>Back up email: <?php echo($user->getSecondEmail());?></li>
                    </ul>

                    <form action="viewProfile.php" method="text">
                    <label for="goalIPT">Input a goal you have achieved here:</label><br>
                    <input type="text" id="goalIPT" name="goalIPT" value=""><br>
                    <input type="submit" value="Submit">
                    </form> 
                </div>
            </section>
            <?php
            if($user->getId() == $_SESSION['user']->getId()) {
                echo("<a href='editProfile.php'>Edit Profile</a>");
            } else {
                $out = "<form action='viewProfile.php' method='post'>";
                $out .= "<input type='hidden' name='userId1' value='".$_SESSION['user']->getId()."'>";
                $out .= "<input type='hidden' name='userId2' value='".$user->getId()."'>";
                $out .= "<input type='submit' name='startConversation' value='Start Conversation'>";
                $out .= "</form>";
                echo($out);
            }
            ?>
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