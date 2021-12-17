<?php
session_start();
require 'db.php';
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
    <h3>Edit comment </h3>
    <form action="editCo.php" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="field">
                <label>Write here id of comment which you wanna edit:<input type="text" id = "textInput" name="id"style="color:white"></label>
            </div>
        </div>
        <input type="submit" class="btn" name = "Submit" value="edit"style="background :#263238">
    </form>
    <button class="btn" id = "clearBtn" style="background :#263238">clear search </button>
    <br>
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
    <a class="btn" href="profile.php" style="background :#263238"><?php echo "".$_SESSION['name'];?></a>
    <a class="btn" href="signOut.php" style="background :#263238">Sign Out</a>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
</div>
</body>
</html>
<script type="text/javascript" src="btn.js"></script>