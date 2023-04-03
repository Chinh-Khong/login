<?php
require_once("../Model/connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</head>
<style>
    h1 {
        text-align: center;
    }

    .err {
        color: #FF0000;
    }

    h2 {
        text-align: center;
        color: #FF0000;
    }
</style>
<html>

<body>
    <?php
    require_once("../Controller/registerController.php");
    ?>
    <div class="container my-5">
        <h1>Register Page</h1>
        <span>
                <?php echo $sai; ?>
            </span>
        <form action="" method="post">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <span class="err">
                    <?php echo $fnameErr; ?>
                </span>
                <input name="fname" type="text" class="form-control" placeholder="Enter First Name" id="fname"
                    value="<?php echo (!empty($_POST["fname"])) ? $_POST["fname"] : false; ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <span class="err">
                    <?php echo $lnameErr; ?>
                </span>

                <input name="lname" type="text" class="form-control" placeholder="Enter Last Name" id="lname"
                    value="<?php echo (!empty($_POST["lname"])) ? $_POST["lname"] : false; ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <span class="err">
                    <?php echo $emailErr; ?>
                </span>
                <input name="email" type="text" class="form-control" placeholder="Enter email" id="email"
                    value="<?php echo (!empty($_POST["email"])) ? $_POST["email"] : false; ?>">

            </div>
            <br>
            <div class="form-group">
                <label for="password">Password:</label>
                <span class="err">
                    <?php echo $passwordErr; ?>
                </span>
                <input name="password" type="password" class="form-control" placeholder="Enter password" id="password"
                    value="<?php echo (!empty($_POST["password"])) ? $_POST["password"] : false; ?>">

            </div>
            <br>
            <div class="form-group">
                <label for="cpassword">Confirm Password:</label>
                <input name="cpassword" type="password" class="form-control" placeholder="Enter Confirm password"
                    id="cpassword" value="<?php echo (!empty($_POST["cpassword"])) ? $_POST["cpassword"] : false; ?>">
                <span class="err">
                    <?php echo $cpasswordErr; ?>
                </span>
            </div>
            <button name="register" type="submit" class="btn btn-primary my-5">Register</button>
            
        </form>
    </div>
</body>

</html>