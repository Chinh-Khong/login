<?php
require_once("../Model/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</head>
<style>
    a {
        text-decoration: none;
    }

    .err {
        color: #FF0000;
    }

    h1 {
        text-align: center;
    }


    .dd {
        text-align: center;
        color: #FF0000;
        font-weight: 500;

    }
</style>

<body>
    <?php
    require_once("../Controller/loginController.php");
    ?>
    <?php
    session_start();
    $err = "";
    if (isset($_POST["login"]) && $_POST["email"] != "" && $_POST["password"] != "") {
        $email = $_POST["email"];
        $password = $_POST["password"]= md5($password);
        
        $sql = "select * from asmphp where Email = '$email' and Password = '$password'";
        $result = mysqli_query($conn, $sql);
        // $password = md5($password);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION["email"] = $email;
            header("location:../View/login_submit.php");
        }else {
            $err = "Wrong email or password information";
        }
    } 
    // else {
    //     $err = "Wrong email or password information";
    // }
    
    ?>
    <div class="container my-5">

        <h1>Login Page</h1>
        <div class="dd">
            <?php
            echo $err;
            ?>
        </div>
        <br>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email address:</label>
                <span class="err">
                    <?php echo $emailErr; ?>
                </span>
                <input name="email" type="text" class="form-control" placeholder="Enter email"
                    value="<?php echo (!empty($_POST["email"])) ? $_POST["email"] : false; ?>">
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <span class="err">
                    <?php echo $passwordErr; ?>
                </span>
                <input name="password" type="password" class="form-control" placeholder="Enter password"
                    value="">
            </div>
            <button name="login" type="submit" class="btn btn-primary my-5">Login</button>
            <button name="reset" type="submit" class="btn btn-primary my"><a class="text-light"
                    href="../View/login.php">Reset</a></button>
            <button name="register" type="submit" class="btn btn-primary my"><a class="text-light"
                    href="../View/register.php">Register</a></button>
        </form>

    </div>
</body>

</html>