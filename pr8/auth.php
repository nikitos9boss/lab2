<?php
require 'db.php';
session_start();
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($_POST['email'] === $row['email'] && $_POST['password'] === $row['password']){
            $_SESSION['auth'] = true;
            header('Location: adduser.php');
        }else{
            $_SESSION['auth'] = false;
            header('Location: login.php');
        }
    }
}