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
    <h3>Add new user </h3>
    <form action="handler.php" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="field">
                <label>Name: <input type="text" name="name"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Surname: <input type="text" name="surname"style="color:white"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>E-mail: <input type="email" name="email"style="color:white"><br></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>
                    <input class="with-gap" type="radio" name="role" value="user"/>
                    <span>User</span>
                </label>
            </div>
            <div class="field">
                <label>
                    <input class="with-gap"  type="radio" name="role" value="admin"/>
                    <span>Admin</span>
                </label>
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
        <div class="row">
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
        <input type="submit" class="btn" name = "Submit" value="Add"style="background :#263238">
    </form>
    <a class="btn" href="start.php"style="background :#263238">Back to start page</a>
</div>
</body>
</html>