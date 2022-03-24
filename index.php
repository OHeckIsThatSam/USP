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
            </header>
        </div>
        <div id="content">
            <section>
                <h1>Welcome</h1>
                <div class="Icons">
                        <i class="fa fa-comments-o" style="font-size:24px"></i>
                    </div>
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor neque odio, consequat tincidunt augue lobortis vel. 
                    Curabitur quis metus mauris. Donec urna nunc, ornare quis ullamcorper quis, ultricies sed justo. 
                    Sed lectus augue, rhoncus vitae feugiat ac, molestie nec velit. Integer aliquet eu dolor vitae eleifend. 
                    Fusce aliquet risus sit amet sapien placerat, quis imperdiet augue maximus. Vivamus pretium urna ac commodo finibus. 
                    Suspendisse lobortis neque dui, quis tempor nisi vulputate eget. Integer at nisl eget ligula luctus sodales. 
                    Nam ac ex luctus, auctor arcu id, pulvinar purus.
                </div>
            </section>
        </div>
        <div class="con">
            <img class="slideshow" name="slideshow"  alt="slideshow of photos "width="500" height="400"  />
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
    <script src="JS/main.js"></script>
</body>
</html>