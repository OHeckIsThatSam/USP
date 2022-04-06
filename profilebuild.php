<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Build</title>
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" media="only screen and (min-width:720px)" href="css/desktop.css">
</head>
<body>
<div id="pageContainer">
        <div class="container">
            <header>

                <div class="logoContainer">
                <a href="index.php">
                    <img alt="logo" src="images/logoBlack.png">
                </a>
                </div>
            </header>
        </div>
        <h1>Profile Build</h1>
        <div class="pro-build">
            <form action="build" method="post">
                    <label for="usernam">Please enter the username you want:</label> <br> 
                    <input name="usernam" type="text"><br> <br>
                    <label for="brief">Please give us a brief about yourself:</label><br>
                    <!-- <input name="brief" type="text"><br> -->
                    <textarea name="" id="" cols="32" rows="3"></textarea> <br> <br> <br>
                    <label for="timeline">Please enter some information you would like to appear on your timeline.</label> <br>
                    <textarea name="" id="" cols="32" rows="3"></textarea><br> <br>
            </form>
        </div>
     <div class="pictures">
        <p class="Text-here">If you would like a profile picture, please upload this here:</p>
        <form action="/action_page.php">
        <input type="file" id="myFile" name="filename">
        </form>
    </div> <br> <br> <br>
        <button class="conu">Confirm</button> <br> <br>
</div>
</body>
</html>