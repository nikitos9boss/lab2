<?php
session_start();
require 'db.php';
$isRestricted_as_admin = false;
if (isset($_SESSION['auth_as_admin']) && $_SESSION['auth_as_admin'] === true){
    $isRestricted_as_admin = true;
}
if(!empty($_POST['id'])){
    $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $_SESSION['id_edit_comment'] = $id;
}else{
    $_SESSION['id_edit_comment'] = null;
}
$sql = "SELECT * FROM comments WHERE id_comments ='".$_SESSION['id_edit_comment']."'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['id_edit_comment'] = $row['id_comments'];
        $text = $row['text'];
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
<?php if($isRestricted_as_admin&& $_SESSION['id_edit_comment'] !== null ):?>
<form action="updateAfterEditC.php" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="field">
                <label>your comment: <input type="text" name="comment" value = "<?php echo "".$text;?>"style="color:white"></label>
            </div>
        </div>
    <input type="submit" class="btn" value="Edit"style="background :#263238">
</form>
<?php endif;?>  
    <?php if($_SESSION['id_edit_comment'] === null):?>
    <h3> id field is empty</h3> 
    <?php endif;?>  
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>