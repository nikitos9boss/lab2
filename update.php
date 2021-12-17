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
            width: 600px;
            background-color:black;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
<H3>information which have been edited</H3>
<?php if($isRestricted_as_user || $isRestricted_as_admin):?>
    <?php
    require 'db.php';
    /*include 'uploads.php';
    if(!empty($filePath)){
        $sql = "UPDATE users  SET path_to_img= ".$filePath." WHERE  id=".$_SESSION['id'];
        print_r($sql);
        echo"<br>";
        $result = $conn->query($sql);
    }else{
        echo"photo wasn't edit";
        echo"<br>";
    }
    */
    if(!empty($_POST['name'])){
        $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "UPDATE users  SET name= ".$name." WHERE  id=".$_SESSION['id'];
        print_r($sql);
        echo"<br>";
        $result = $conn->query($sql);
        
    }else{
        echo"name wasn't edit";
        echo"<br>";
    }
    if(!empty($_POST['name'])){
        $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "UPDATE users  SET name= ".$name." WHERE  id=".$_SESSION['id'];
        print_r($sql);
        echo"<br>";
        $result = $conn->query($sql);
        
    }else{
        echo"name wasn't edit";
        echo"<br>";
    }
    if(!empty($_POST['surname'])){
        $surname = filter_input(INPUT_POST, 'surname',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "UPDATE users  SET surname= ".$surname." WHERE  id=".$_SESSION['id'];
        print_r($sql);
        echo"<br>";
        $result = $conn->query($sql);
    }else{
        echo"surname wasn't edit";
        echo"<br>";
    }
    if(!empty($_POST['email'])){
        $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
        $sql = "UPDATE users  SET email= ".$email." WHERE  id=".$_SESSION['id'];
        print_r($sql);
        echo"<br>";
        $result = $conn->query($sql);
    }else{
        echo"email wasn't edit";
        echo"<br>";
    }
    if(!empty($_POST['password'])&& !empty($_POST['password2'])&& $_POST['password'] === $_POST['password2'] && strlen($_POST['password'])>=6 && strlen($_POST['password2'])>=6){
        $password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "UPDATE users  SET password= ".$password." WHERE  id=".$_SESSION['id'];
        print_r($sql);
        echo"<br>";
        $result = $conn->query($sql);
    }else{
        echo"password wasn't edit";
        echo"<br>";
    }
    ?>
    <?php endif;?>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
    <a class="btn" href="profile.php" style="background :#263238"><?php echo "".$_SESSION['name'];?></a>
    <a class="btn" href="signOut.php" style="background :#263238">Sign Out</a>
</div>
</body>
</html>
