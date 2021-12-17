<?php
session_start();
require 'db.php';
$sql = "DELETE FROM users  WHERE  id=".$_SESSION['id'];
print_r($sql);
echo"<br>";
$result = $conn->query($sql);
header('Location: signOut.php');
?>