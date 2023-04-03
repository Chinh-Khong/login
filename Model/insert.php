<?php
require_once("../Model/connect.php");
if (isset($_POST["register"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = md5($password);
    $insert = "insert into asmphp (fName,lName,Email,Password) values ('$fname','$lname','$email','$password')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        header('location:../View/display.php');

    } else
        echo "insert ko thành công";
}
?>