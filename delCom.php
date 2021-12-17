<?php
session_start();
$isRestricted_as_admin = false;
if (isset($_SESSION['auth_as_admin']) && $_SESSION['auth_as_admin'] === true){
    $isRestricted_as_admin = true;
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
<H3> delUser</H3>
<?php
require 'db.php';
if(!empty($_POST['id'])){
    $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sql = "DELETE FROM comments  WHERE  id_comments=".$_POST['id'];
    print_r($sql);
    echo"<br>";
    $result = $conn->query($sql);
    echo"comment have been deleted";
    echo"<br>";
}else{
    echo"user have not been deleted";
    echo"<br>";
}
?>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
    <a class="btn" href="profile.php" style="background :#263238"><?php echo "".$_SESSION['name'];?></a>
    <a class="btn" href="signOut.php" style="background :#263238">Sign Out</a>
</div>
</body>
</html>