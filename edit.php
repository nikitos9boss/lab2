<?php
session_start();
require 'db.php';
$isRestricted_as_admin = false;
if (isset($_SESSION['auth_as_admin']) && $_SESSION['auth_as_admin'] === true){
    $isRestricted_as_admin = true;
}
if(!empty($_POST['id'])){
    $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $_SESSION['id_edit_user'] = $id;
}else{
    $_SESSION['id_edit_user'] = null;
}
$sql = "SELECT * FROM users WHERE id ='".$_SESSION['id_edit_user']."'"; 
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $surname = $row['surname'];
                $email = $row['email'];
                $role = $row['role'];
                $path  ="<img src='".$row['path_to_img']."'width = 100 height = 111/>";
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
<body>
<div class="container">
<?php if($isRestricted_as_admin&& $_SESSION['id_edit_user'] !== null ):?>
    <h3> Edit Profile</h3>
    <div class="row">
    <?php 
    echo""."<img src='".$path."'width = 100 height = 111/>";
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
    <hr>
    <form action="updateAfterEdit.php" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="field">
                <label>Name: <input type="text" name="name" value = "<?php echo "".$name;?>"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Surname: <input type="text" name="surname"value = "<?php echo "".$surname;?>"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>E-mail: <input type="email" name="email"value = "<?php echo "".$email;?>"style="color:white"><br></label>
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
    <input type="submit" class="btn" value="Delete"style="background :#263238">
    <form action="comment.php" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="field">
                <label>Comment here<input type="text" name="comment" value = ""style="color:white"></label>
            </div>
            <input type="submit" class="btn" value="add comment"style="background :#263238">
        </div>
    </form>
    <?php endif;?>  
    <?php if($_SESSION['id_edit_user'] === null):?>
    <h3> id field is empty</h3> 
    <?php endif;?>  
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>