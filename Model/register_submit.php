<?php
    require_once("../Model/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Succesful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <style>
        a{
            text-decoration: none;
        }
        .ThanhCong{
            margin-top: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="ThanhCong">
        <h2>Bạn đã đăng kí thành công</h2>
        <button type="submit" class="btn btn-primary"><a class="text-light" href="../View/login.php">Login</a></button>
        <button type="submit" class="btn btn-primary"><a class="text-light" href="../View/register.php">Register</a></button>
    </div>
    </div>
</body>
</html>