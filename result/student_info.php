<?php
require_once("db_connect/config.php");
require_once("db_connect/conect.php");
date_default_timezone_set('Asia/Dhaka');
$db = new database();
 $sms="";

        if(isset($_POST["Add"]))
        {
            $name=$_POST["name"];
            $roll=$_POST["roll"];
            $phone=$_POST["phone"];
            $department=$_POST["department"];
            
            
            $sql="INSERT INTO std_info_form (`name`,`roll`,`phone`,`dep`,`date`) VALUES('$name',' $roll',' $phone','$department','".date('Y-m-d  h:i:sa ')."')";
            $query=$db->link->query($sql);
            if($query)
            {
              $sms= "Save Successfully!!";
            }
            else
            {
              $sms= "Save Unsuccessfully!!";
            }
            
            
        }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Students Form</title>
  </head>
  <body>

<form method="POST" method="post">
<div class="container " style="background: #f4f4f4">

<div class="form-group">
    <h1 style="text-align: center">Feni Govt College</h1>
    <h3 style="text-align: center;">Students Information Form</h3>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="Name" placeholder="Enter Name" autocomplete="off" required>
    
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Roll</label>
    <input type="text" class="form-control" name="roll" aria-describedby="Roll" placeholder="Enter Roll" autocomplete="off" required>
    
  </div>


   <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="text" class="form-control" name="phone" aria-describedby="Mobile No" placeholder="Enter Mobile No." autocomplete="off" required>
    
  </div>

     <div class="form-group">
    <label for="exampleInputEmail1">Department</label>
   

    <select name="department" class="form-control">
        <option value="">Select Department</option>
        <option>Science</option>
        <option>Humanities</option>
        <option>Business Studies</option>


    </select>
    
  </div>



  <button type="submit" class="btn btn-primary" name="Add" >Submit</button>

<br>

<?php print  $sms; ?>

</div>

</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

