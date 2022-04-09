<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Sign Up</title>
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
                <a href="index.php">
                    <img alt="logo" src="images/logoBlack.png"> 
                </a>
                </div>
            </header>
        </div>
        <h1 style="text-align:left">Mentor Signup</h1>
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
    </div>
    <button class="Mentor-Done">submit</button>
</div>
</body>
</html>