<?php
    require_once("../Model/connect.php");
    if (isset($_GET["deleteid"])) {
        $id = $_GET["deleteid"];
        $delete = "delete from asmphp where Id = '$id'";
        $result = mysqli_query($conn,$delete);
        if ($result) {
            header("location:../View/display.php");
        }else{echo "Delete failed";}
    }
?>