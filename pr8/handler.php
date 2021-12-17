<?php
require 'db.php';
include 'uploads.php';
$flag = false;
if(!empty($_POST['name'])&&(!empty($_POST['surname']) && !empty($_POST['role']) && !empty($_POST['email'])){
    $flag = true;
    $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $surname = filter_input(INPUT_POST, 'surname',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $role = $_POST['role'];
    $sql = "INSERT INTO users (email, name, role, password, path_to_img) VALUES ('$email','$name','$surname','role', '111111', '$filePath')";
    echo $sql;
    $res = mysqli_query($conn, $sql);

    if($res) {
        $valid = true;
    }
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
        .container {
            width: 400px;
        }
    </style>
</head>
<body style="padding-top: 3rem;">

<div class="container">
    <?php
    if($flag){
        echo "User Added ".$_POST['name']."<br>";
        echo "Email ".$_POST['email'];
        echo " Role ".$_POST['role'];
    }else{
        echo "Invalid Data</p>";
    }
    ?>
    <hr>
    <a class="btn" href="adduser.php">return back</a>
    <a class="btn" href="table.php">view list</a>
</div>
</body>
</html>