<?php
  require_once("../Model/connect.php");
  
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
      $password = test_input($_POST["password"]) ;
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
    elseif ($_POST["fname"] != "" || $_POST["lname"] != "" && $_POST["email"] != "" && $_POST["password"] != "" && $_POST["cpassword"] != "" && $_POST["password"] == $_POST["cpassword"]) {
      $check = "select* from asmphp where Email = '$email'";
      $result = mysqli_query($conn, $check);
     
      if (mysqli_num_rows($result) > 0) {
        $emailErr = "This email already exists, please re-enter another email";
      }
      
      else {
       
        require_once("../Model/insert.php");
      }
    }
  }

  ?>