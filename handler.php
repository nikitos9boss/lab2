<?php
require 'db.php';
include 'uploads.php';
$flag = false;
if(!empty($_POST['name'])&&!empty($_POST['surname'])&& !empty($_POST['email']) && !empty($_POST['role']) && !empty($_POST['password'])&& !empty($_POST['password2'])){
    $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $surname = filter_input(INPUT_POST, 'surname',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $role = $_POST['role'];
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $check_email = false;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($_POST['email'] == $row['email']){
                $check_email = true;
            }
        }
    }
    if($password === $password2 && strlen($password)>=6 && strlen($password2)>=6 && $check_email !== true){
        $options = [
            'cost' => 12,
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        $flag = true;
        $sql = "INSERT INTO users (email, name, surname, role, password, path_to_img) VALUES ('$email','$name','$surname','$role', '$password', '$filePath')";
    }else{
        echo"<br>";
       echo"Invalid data,try to input email again, same email already is used by our user";
    }
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
<body style="padding-top: 3rem;">

<div class="container">
    <?php
    if($flag){
        echo "User Added ".$_POST['name'] .$_POST['surname']."<br>";
        echo "Email ".$_POST['email'];
        echo " Role ".$_POST['role'];
    }else{
        echo "Invalid Data</p>";
    }
    ?>
    <hr>
    <?php if(!$flag):?>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
    <a class="btn" href="signIn.php"style="background :#263238">Sign In</a>
    <a class="btn" href="signUp.php"style="background :#263238">Sign Up Again</a>
    <?php else:?>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
    <a class="btn" href="signIn.php"style="background :#263238">Sign In</a>
    <?php endif;?>
</div>
</body>
</html>