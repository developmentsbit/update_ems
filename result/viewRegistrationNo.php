<?php
require_once("db_connect/config.php");
require_once("db_connect/conect.php");
date_default_timezone_set('Asia/Dhaka');
$db = new database();

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Student registration</title>
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
        .card-header{
            justify-content: space-between;
        }
    </style>
  </head>
  <body>
    <div class="container my-3">
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="text-center">Registered Students List</h4>
            <a class="btn btn-primary" href="form_fillup.php">Add Students</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Registration Number</th>
                <th>Condition</th>
                <th>Subject</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php
                    $sql = $db->link->query("SELECT * FROM `registration`");
                    while($fetchData = $sql->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $fetchData[0]; ?></td>
                    <td><?php echo $fetchData[1]; ?></td>
                    <td><?php echo $fetchData[2]; ?></td>
                    <td><?php echo $fetchData[3]; ?></td>
                    <td>
                        <a href="form_fillup.php?edit=<?php echo $fetchData[0];?>" class="btn btn-info">Edit</a>
                        <a href="delete.php?del=<?php echo $fetchData[0];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tr>
        </table>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>