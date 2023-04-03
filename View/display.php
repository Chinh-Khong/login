<?php
require_once("../Model/connect.php");
// làm phân trang 
// tính số bản ghi
$ceil = "select * from asmphp";
$sql = mysqli_query($conn, $ceil);
$SoBanGhi = mysqli_num_rows($sql);
// số bản gi trong một trang
$limit = 5;
//số trang
$page = ceil($SoBanGhi / $limit);
// lấy trang hiện tại
$cr_page = (isset($_GET["page"]) ? $_GET["page"] : 1);
//tinh start
$start = ($cr_page - 1) * $limit;
// query sử dụng limit
$sql = mysqli_query($conn, "select * from asmphp limit $start,$limit");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
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

    .pagination {
        justify-content: center;
        justify-items: center;
    }
    li:hover{
        background-color: red;
    }
    a:hover{
        background-color: red;
    }
</style>

<body>
    <div class="container my-5">
        <button type="submit" class="btn btn-primary"><a class="text-light" href="../View/register.php">Add
                admin</a></button>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($sql) {
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $id = $row["Id"];
                        $fname = $row["fName"];
                        $lname = $row["lName"];
                        $email = $row["Email"];
                        $password = $row["Password"];

                        echo '<tr>
            <th scope="row">' . $id . '</th>
            <td>' . $fname . '</td>
            <td>' . $lname . '</td>
            <td>' . $email . '</td>
            <td>' . $password . '</td>
            <td>    <button type="submit" name="update" class="btn btn-primary"><a class="text-light" href="../Model/update.php?updateid=' . $id . '">Update</a>
            <td>    <button type="submit" name="delete" class="btn btn-danger"><a class="text-light" href="../Model/delete.php?deleteid=' . $id . '">Delete</a>
            </button>
            </td>
          </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $page; $i++) { ?>

                    <li class="page-item"><a class="page-link" href="display.php?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                <?php } ?>
            </ul>
        </nav>
        <button type="submit" class="btn btn-primary"><a class="text-light" href="../View/login.php">Log
                Out</a></button>

    </div>
</body>

</html>