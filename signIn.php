<?php
session_start();
$isRestricted_as_admin = false;
$isRestricted_as_user = false;
if (isset($_SESSION['auth_as_admin']) && $_SESSION['auth_as_admin'] === true){
    $isRestricted_as_admin = true;
}
if (isset($_SESSION['auth_as_user']) && $_SESSION['auth_as_user'] === true){
    $isRestricted_as_user = true;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body{
            padding-top: 3rem;
            background-color:black;
            color: white;
        }
        .container {
            width: 400px;
            background-color:black;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if(!$isRestricted_as_admin && !$isRestricted_as_user):?>
    <h3>Sign In</h3>
    <form action="auth.php" method="post">
        <div class="row">
            <div class="field">
                <label>E-mail: <input type="email" name="email"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Password: <input type="password" name="password"style="color:white"><br></label>
            </div>
        </div>
        <input type="submit" class="btn" value="Sign In" style="background :#263238">
    </form>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
    <a class="btn" href="signUp.php"style="background :#263238">Sign Up</a>
    <?php else:?>
    <span>
         to Sign Out click <a href="signOut.php">here</a>
    </span>
    <?php endif;?>
</div>
</body>
</html>