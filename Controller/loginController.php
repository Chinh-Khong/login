<?php
require_once("../Model/connect.php");
$email = $password = "";
$emailErr = $passwordErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (!empty($_POST["password"])) {
        $password = md5($password);
        $password = test_input($_POST["password"]);
        
    } else
        $passwordErr = "Password cannot empty";
}



?>