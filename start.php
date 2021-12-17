<?php
session_start();
$isRestricted = false;
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true){
    $isRestricted = true;
}
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
            width: 400px;
            background-color:black;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
<form action="search.php" method="post">
    <div class="row">
        <div class="field">
            <label>Search: <input type="text" id = "textInput" name="name"style="color:white"></label>
        </div>
    </div>
    <input type="submit" class="btn" value="Search" style="background :#263238">
</form>
<button class="btn" id = "clearBtn" style="background :#263238">clear search </button>
<?php if(!$isRestricted && !$isRestricted_as_admin && !$isRestricted_as_user):?>
    <?php require 'db.php';
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'surname' => $row['surname'],
                'email' => $row['email'],
                'role' => $row['role'],
                'path'=>"<img src='".$row['path_to_img']."'width = 100 height = 111/>"
            ];
        }
    }
    echo "<table>";
        echo "<thead>";
            echo"<tr>";
                echo "<th>#</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>Email</th>";
                echo "<th>Role</th>";
                echo "<th>Photo</th>";
            echo   "</tr>";
        echo "</thead>";
    foreach ($users as $key=>$user){
        echo "<tr>";
        foreach ($user as $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <hr>
    <a class="btn" href="signIn.php" style="background :#263238">Sign In</a>
    <a class="btn" href="signUp.php" style="background :#263238">Sign Up</a>
    <?php endif;?>
    <?php if($isRestricted_as_user && !$isRestricted_as_admin && !$isRestricted):?>
     <?php require 'db.php';
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'surname' => $row['surname'],
                'email' => $row['email'],
                'role' => $row['role'],
                'path'=>"<img src='".$row['path_to_img']."'width = 100 height = 111/>"
            ];
        }
    }
    echo "<table>";
        echo "<thead>";
            echo"<tr>";
                echo "<th>#</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>Email</th>";
                echo "<th>Role</th>";
                echo "<th>Photo</th>";
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
    <?php
    echo "</table>";
    ?>
    <hr>
    <a class="btn" href="profile.php" style="background :#263238"><?php echo "".$_SESSION['name'];?></a>
    <a class="btn" href="signOut.php" style="background :#263238">Sign Out</a>
    <?php endif;?>
    <?php if($isRestricted_as_admin && !$isRestricted_as_user && !$isRestricted):?>
     <?php require 'db.php';
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'surname' => $row['surname'],
                'email' => $row['email'],
                'role' => $row['role'],
                'path'=>"<img src='".$row['path_to_img']."'width = 100 height = 111/>"
            ];
        }
    }
    echo "<table>";
        echo "<thead>";
            echo"<tr>";
                echo "<th>#</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>Email</th>";
                echo "<th>Role</th>";
                echo "<th>Photo</th>";
            echo   "</tr>";
        echo "</thead>";
    foreach ($users as $key=>$user){
        echo "<tr>";
        foreach ($user as $value){
            echo "<td>$value</td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <hr>
    <a class="btn" href="profile.php" style="background :#263238"><?php echo "".$_SESSION['name'];?></a>
    <a class="btn" href="signOut.php" style="background :#263238">Sign Out</a>
    <a class="btn" href="adduser.php" style="background :#263238">Add user</a>
    <a class="btn" href="deleteUser.php" style="background :#263238">Delete user</a>
    <a class="btn" href="editUser.php" style="background :#263238">Edit user</a>
    <?php endif;?>
</div>
</body>
</html>
</body>
</html>
<script type="text/javascript" src="btn.js"></script>