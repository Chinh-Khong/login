<?php
    require_once("../Model/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Submit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</head>
<style>
    a{
        text-decoration: none;
    }
   .align-self-center{
    margin-left: 225px;
   }
   
</style>
<body>
    <?php
        session_start();
        if (!isset($_SESSION["email"])) {
            header("location:../View/login.php");
        }
        
    ?>
    <div class="container my-5">
    <div class="align-self-center">
    <h1>Đăng nhập thành công</h1>
    <button name="display" type="submit" class="btn btn-primary my-5"><a class="text-light" href="../View/display.php">Display</a></button>
    <button name="login" type="submit" class="btn btn-primary my-5"><a class="text-light" href="../View/login.php">Login</a></button>

    </div>
    </div>
</body>
</html>