<?php
require 'db.php';
session_start();
$sql = "SELECT * FROM users WHERE email ='".$_POST['email']."'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $password_hash = $row['password'];
    }
}
echo"".$password_hash;
echo"<br>";

if (password_verify($_POST['password'], $password_hash)) {
    $sql = "SELECT * FROM users WHERE email ='".$_POST['email']."' and password = '".$password_hash."'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            //$_SESSION['auth'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['path_to_img'] = $row['path_to_img'];
            if($_SESSION['role'] == "admin"){
                $_SESSION['auth_as_admin'] = true;
            }
            if($_SESSION['role'] == "user"){
                $_SESSION['auth_as_user'] = true;
            }
            
            header('Location: start.php');
        }
    }
} else {
    $_SESSION['auth'] = false;
    header('Location: signIn.php');
}

/*
$sql = "SELECT * FROM users WHERE email ='".$_POST['email']."' and password = '".$password."'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
         $_SESSION['auth'] = true;
         $_SESSION['id'] = $row['id'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['name'] = $row['name'];
         $_SESSION['surname'] = $row['surname'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['path_to_img'] = $row['path_to_img'];
        header('Location: start.php');
    }
}else{
    $_SESSION['auth'] = false;
    header('Location: signIn.php');
}
*/