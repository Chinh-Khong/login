<?php
require_once("../Model/connect.php");
$id = $_GET["updateid"];
$sai = "";
$fname = $lname = $email = $password = $cpassword = "";
$fnameErr = $lnameErr = $emailErr = $passwordErr = $cpasswordErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (empty($_POST["fname"])) {
        $fnameErr = "First Name cannot empty";
    } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name cannot empty";
    } else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
            $lnameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }

    }
    if (empty($_POST["email"])) {
        $emailErr = "E-mail cannot empty";
    } else {
        
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    //Validates password
    if (!empty($_POST["password"]) && !empty($_POST["password"])) {
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        if (strlen($_POST["password"]) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } elseif (!preg_match('@[^\w]@', $password)) {
            $passwordErr = "Your password must contain at least 1 special character !";
        }
    } else {
        $passwordErr = $cpassword = "Password cannot empty";
    }
    if ($_POST["password"] != $_POST["cpassword"]) {
        $cpasswordErr = "Password does not match";
    }
    if ($_POST["fname"] == "" || $_POST["lname"] == "" || $_POST["email"] == "" || $_POST["password"] == "" || $_POST["cpassword"] == "" || $_POST["password"] != $_POST["cpassword"]) {
        $sai = "<h2>Please fill in all information correctly</h2>";
        $cpassword = "Password does not match";
    }

    // check nếu tài khoản nếu tồn tại thì yêu cầu nhập tk email khác 
    // r tiến hành insert vô mysql 
    elseif ($_POST["fname"] != "" || $_POST["lname"] != "" && $_POST["email"] != "" && $_POST["password"] != "" && $_POST["cpassword"] != "" && $_POST["password"] == $_POST["cpassword"]) {
        $check = "select* from asmphp where Email = '$email'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            $emailErr = "This email already exists, please re-enter another email";
        } elseif (isset($_POST["update"])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];
            $password = md5($password);
            $update = "update asmphp set fName = '$fname',lName='$lname',Email='$email',Password='$password' where Id='$id'";
            $result = mysqli_query($conn, $update);
            ;
            if ($result) {
                header("location:../View/display.php");
            } else {
                echo "update ko thành công";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
</style>

<body>
    <div class="container my-5">
        <form method="post" action="">
            <h1>Update</h1>
            <div class="form-group">
                <label for="fname">First Name</label>
                <span class="err">
                    <?php echo $fnameErr; ?>
                </span>
                <input type="text" name="fname" class="form-control" placeholder="input first name..."
                    value="<?php echo (!empty($_POST["fname"])) ? $_POST["fname"] : false; ?>">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <span class="err">
                    <?php echo $lnameErr; ?>
                </span>

                <input type="text" name="lname" class="form-control" placeholder="input last name..."
                    value="<?php echo (!empty($_POST["lname"])) ? $_POST["lname"] : false; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <span class="err">
                    <?php echo $emailErr; ?>
                </span>

                <input type="text" name="email" class="form-control" placeholder="input email..."
                    value="<?php echo (!empty($_POST["email"])) ? $_POST["email"] : false; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <span class="err">
                    <?php echo $passwordErr; ?>
                </span>

                <input type="password" name="password" class="form-control" placeholder="input password..."
                    value="<?php echo (!empty($_POST["password"])) ? $_POST["password"] : false; ?>">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password:</label>
                <span class="err">
                    <?php echo $cpasswordErr; ?>
                </span>

                <input type="password" name="cpassword" class="form-control" placeholder="input confirm assword:..."
                    value="<?php echo (!empty($_POST["cpassword"])) ? $_POST["cpassword"] : false; ?>">
            </div>
            <button type="submit" class="btn btn-primary my-5" name="update">Update</button>
        </form>
    </div>
</body>

</html>