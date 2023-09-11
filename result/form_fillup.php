<?php
require_once("db_connect/config.php");
require_once("db_connect/conect.php");
date_default_timezone_set('Asia/Dhaka');
$db = new database();

if(isset($_POST["submit"])){
    $regNo = $_POST['registrationNo'];
    $condition = $_POST['condition'];
    $subject = $_POST['subject'];
    
    $sql =$db->link->query("INSERT INTO `registration` (`registrationNo`, `position`, `subject`) VALUES ('$regNo','$condition','$subject')");
    // $query=$db->link->query($sql);
    if($sql)
    {
        echo "Student Add Succesffully";
    }
    else
    {
        echo "Data Insert Unsuccessfull!";
    }

}

		

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
    </style>
  </head>
  <body>
    <div class="container my-3">
    <div class="card">
        <div class="card-header">
        <h4 class="text-center">Student registration</h4>
        </div>
        <div class="container px-0">
        <div class='card-body bg-light py-2'>
        <form method="POST" class="px-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label style="border-bottom: 2px solid grey;" class="form-label">Registration No:</label>
                <input type="number" class="form-control" name="registrationNo">
            </div>
            <div class="mb-1">
            <label style="border-bottom: 2px solid grey;" class="form-label">Form fill up:</label><br>
                <input type="radio" class="my-2" name="condition" value="Private"/>&nbsp;&nbsp;Private
                <br>
                <input type="radio" class="my-2" name="condition" value="Irregular"/>&nbsp;&nbsp;Irregular
                <br>
                <input type="radio" class="my-2" name="condition" value="Improvement"/>&nbsp;&nbsp;Improvement
                <br>
            </div>
            
            <label style="border-bottom: 2px solid grey;" class="form-label mt-3">Subject:</label>
                <div>
                <input type="radio" class="my-2" name="subject" value="Subject 1"/>&nbsp;&nbsp;Subject 1
                <br>
                <input type="radio" class="my-2" name="subject" value="Subject 2"/>&nbsp;&nbsp;Subject 2
                <br>
                <input type="radio" class="my-2" name="subject" value="Subject 3"/>&nbsp;&nbsp;Subject 3
                <br>
                <input type="radio" class="my-2" name="subject" value="Subject 4"/>&nbsp;&nbsp;Subject 4
                <br>
                <input type="radio" class="my-2" name="subject" value="Subject 5"/>&nbsp;&nbsp;Subject 5
                <br>
                <input type="radio" class="my-2" name="subject" value="Subject 6"/>&nbsp;&nbsp;Subject 6
                <br>
            <button type="submit" name="submit" class="btn btn-primary my-3">Submit</button>
            <!--<a href='viewRegistrationNo.php' type="submit" name="view" class="btn btn-success my-3">View</a>-->
        </form>
        </div>
        </div>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>