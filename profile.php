<?php
session_start();
require 'db.php';
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
<?php if($isRestricted_as_user && !$isRestricted_as_admin):?>
    <h3>Profile</h3>
    <div class="row">
    <?php 
    echo""."<img src='". $_SESSION['path_to_img']."'width = 100 height = 111/>";
    ?>
            <div class="file-field input-field">
                <div class="btn"style="background :#263238">
                    <span>Photo</span>
                    <input type="file" name="photo" id="fileToUpload" accept="image/png, image/gif, image/jpeg image/jpg">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
    <form action="update.php" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="field">
                <label>Name: <input type="text" name="name" value = "<?php echo "".$_SESSION['name'];?>"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Surname: <input type="text" name="surname"value = "<?php echo "".$_SESSION['surname'];?>"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>E-mail: <input type="email" name="email"value = "<?php echo "".$_SESSION['email'];?>"style="color:white"><br></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Password: <input type="password" name="password"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Repeat Password: <input type="password" name="password2"style="color:white"></label>
            </div>
        </div>
        <input type="submit" class="btn" value="Edit"style="background :#263238">
    </form>
    <form action="delete.php" method="post" enctype="multipart/form-data">
    <input type="submit" class="btn" value="Delete"style="background :#263238">
    </form>
    <form action="comment.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="field">
                <label>Comment here<input type="text" name="comment" value =""style="color:white"></label>
            </div>
            <input type="submit" class="btn" value="add comment"style="background :#263238">
        </div>
    </form>
    <?php
    $sql = "SELECT * FROM comments WHERE id_profile = '".$_SESSION['id']."'";
    $result = $conn->query($sql);
    $users = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = [
                'id_comments' => $row['id_comments'],
                'id_user' => $row['id_user'],
                'role' => $row['role'],
                'text' => $row['text'],
                'date' => $row['date'],
            ];
        }
    }
    echo "<table>";
        echo "<thead>";
            echo"<tr>";
                echo "<th>id_comments</th>";
                echo "<th>id_user</th>";
                echo "<th>role</th>";
                echo "<th>text</th>";
                echo "<th>date</th>";
            echo   "</tr>";
        echo "</thead>";
    foreach ($users as $key=>$user){
        echo "<tr>";
        foreach ($user as $value){
            echo "<td>$value</td>"; 
        }
        echo "</tr>";
    }
    ?>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
    <hr>
    <H3>Comments</H3>
    <hr>
    <?php endif;?>
    <?php if(!$isRestricted_as_user && $isRestricted_as_admin):?>
    <h3>Profile</h3>
    <div class="row">
    <?php 
    echo""."<img src='". $_SESSION['path_to_img']."'width = 100 height = 111/>";
    ?>
            <div class="file-field input-field">
                <div class="btn"style="background :#263238">
                    <span>Photo</span>
                    <input type="file" name="photo" id="fileToUpload" accept="image/png, image/gif, image/jpeg image/jpg">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
    <form action="update.php" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="field">
                <label>Name: <input type="text" name="name" value = "<?php echo "".$_SESSION['name'];?>"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Surname: <input type="text" name="surname"value = "<?php echo "".$_SESSION['surname'];?>"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>E-mail: <input type="email" name="email"value = "<?php echo "".$_SESSION['email'];?>"style="color:white"><br></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Password: <input type="password" name="password"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Repeat Password: <input type="password" name="password2"style="color:white"></label>
            </div>
        </div>
        <input type="submit" class="btn" value="Edit"style="background :#263238">
    </form>
    <form action="delete.php" method="post" enctype="multipart/form-data">
    <input type="submit" class="btn" value="Delete"style="background :#263238">
    </form>
    <form action="comment.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="field">
                <label>Comment here<input type="text" name="comment" value = ""style="color:white"></label>
            </div>
            <input type="submit" class="btn" value="add comment"style="background :#263238">
        </div>
    </form>
    <?php
    $sql = "SELECT * FROM comments WHERE id_profile = '".$_SESSION['id']."'";
    $result = $conn->query($sql);
    $users = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = [
                'id_comments' => $row['id_comments'],
                'id_user' => $row['id_user'],
                'role' => $row['role'],
                'text' => $row['text'],
                'date' => $row['date'],
            ];
        }
    }
    echo "<table>";
        echo "<thead>";
            echo"<tr>";
                echo "<th>id_comments</th>";
                echo "<th>id_user</th>";
                echo "<th>role</th>";
                echo "<th>text</th>";
                echo "<th>date</th>";
            echo   "</tr>";
        echo "</thead>";
    foreach ($users as $key=>$user){
        echo "<tr>";
        foreach ($user as $value){
            echo "<td>$value</td>"; 
        }
        echo "</tr>";
    }
    ?>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
    <hr>
    <H3>Comments</H3>
    <hr>
    <a class="btn" href="editCom.php"style="background :#263238">edit comment</a>
    <a class="btn" href="deleteCom.php"style="background :#263238">delete comment</a>
    <?php endif;?>