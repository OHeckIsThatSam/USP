<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=#, initial-scale=1.0">
    <title>Please fill in your details</title>
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
        </div>
     <br>
    <div id="signUpprocess">
        <h1>Tell us About your experience</h1>
        <h2>Work experience</h2> <br>
                    <form action="get">
                            <label for="work">Where do you currently work?</label><br>
                            <input name="work" type="text" class="input"><br>
                            <label for="role">What is your role?</label><br>
                            <input name="role" type="text" class="input"><br>
                            <label for="duration">How long have you worked there?</label><br>
                            <input name="duration" type="text" class="input"><br>
                            <label for="previous">Where did you work prevously?</label><br>
                            <input name="previous" type="text" class="input"><br>
                            <h2>Education</h2>
                            <label for="education">What is the highest form of education you've achieved?</label><br>
                            <input name="education" type="text" class="input"><br>
                            <label for="study">Where did you study?</label><br>
                            <input name="study" type="text" class="input"><br>
                            <input type="checkbox" id="mentor" name="mentor">
                            <label for="mentor">I want to be a mentor</label> <br>
                </form>
        </div>
        <button class="Confirm">Confirm</button>
    </div>
</body>
</html>