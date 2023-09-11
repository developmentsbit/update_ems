    <?php
    error_reporting(1);
    

        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        date_default_timezone_set("Asia/Dhaka");
        $db = new database();
    
     


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>
        
     <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
  
  
    <link rel="stylesheet" href="textEdit/redactor/redactor.css" />
    <script type="text/javascript" src="textEdit/lib/jquery-1.9.0.min.js"></script>
    <script src="textEdit/redactor/redactor.min.js"></script>
	
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="datespicker/datepicker.css">
    <link rel="stylesheet" href="datespicker/bootstrap.min.css">

   
     <script src="datespicker/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
   
          $(document).ready(function () {
                    
                    $('#example1').datepicker({
                        format: "yyyy-mm-dd"
                    });  
                
                });

          </script>
</head>
<body>
        <form name="frmbody" method="POST"> 
        <table class="table table-hover table-bordered" style="max-width: 900px;" align="center">
            <tr>
                <td colspan="3"><h3 style="text-align: center;">SMS Notification Report </h3></td>
             
            </tr> 

            <tr> 
                <td>Date</td>
                <td>:</td>
                <td><input type="text"  id="example1" name="date" class="form-control" autocomplete="off" ></input></td>
            </tr>

            <tr> 
                <td colspan="3" align="center"><input type="submit" value="Show" name="Show"  class="btn btn-success"></input></td>
                
            </tr>


                        <tr>
                                <td colspan="3" align="center"> <table width="100%" style="  padding: 0px; " align="center" >
        <tr>    
                <td width="10%"></td>
                <td>
                        <div style="float: left; clear: right; width: 15%; text-align: center;  ">  
                            <img src="all_image/logoSDMS2015.png" style="max-width: 80px; max-height: 80px; " /> 
                        </div>
                            

                        <div style="float: left; clear: right; text-align: center; width: 70% ">   
                                <ul>
                    
                                <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;">Al Helal Academy</li>

                               <li style="list-style: none; ">

                                    <p style="font-size:16px;font-family:Arial, Helvetica, sans-serif">মেইন রোড, সোনাগাজী, ফেনী। 
                                </p>

                                </li>

                             
                             </ul> 

                      </div>

                      <div style="float: right;  width: 15%; text-align: center;">  
                         

                    </div>
                </td>
                <td width="10%"></td>
        </tr>
            

        </table> 
</td>
                        </tr>

                        <tr>

                            <td colspan="3">
                                
                                        <table class="table table-hover">
                                            
                                                    <tr>
                                                            <td>SL</td>
                                                            <td>Date</td>
                                                            <td>Roll</td>
                                                            <td>Mobile No.</td>
                                                            <td>SMS</td>
                                                    </tr>

                                                    <?php
                                                    $i=1;

                                                        $sql="SELECT * FROM `sms_sent_tab` WHERE `date`='".$_POST['date']."'";

                                                        $r=$db->link->query($sql);
                                                        while($fetch=$r->fetch_array())
                                                        {
                                                            ?>

                                                                <tr>
                                                                        <td><?php print $i++;?></td>
                                                                        <td><?php print $fetch[1]?></td>
                                                                        <td><?php print $fetch[2]?></td>
                                                                        <td><?php //print $fetch[3]?></td>
                                                                        <td><?php print $fetch[4]?></td>
                                                                </tr>

                                                            <?php
                                                        }

                                                    ?>
                                        </table>

                            </td>
                        </tr>


        </table>
        </form>

            
</body>
</html>