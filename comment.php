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
<H3>comment have been added</H3>
<?php if($isRestricted_as_user || $isRestricted_as_admin):?>
    <?php
    require 'db.php';
    $sql = "SELECT * FROM users WHERE id='".$_SESSION['id']."'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id_user = $row['id'];
            $role = $row['role'];
        }
    }
    if(!empty($_POST['comment'])){
        $today = date("Y-m-d H:i:s",time());
        $id_profile = $_SESSION['id'];
        $comment = filter_input(INPUT_POST, 'comment',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "INSERT INTO comments (id_user,id_profile, role,text,date) VALUES ('$id_user','$id_profile','$role','$comment','$today')";
        print_r($sql);
        echo"<br>";
        $result = $conn->query($sql);
    }else{
        echo"comment wasn't add";
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