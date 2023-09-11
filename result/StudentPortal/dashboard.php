

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compitable" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Dashboard</title>
    <!--Bootstarp-->
  <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
	<link rel="stylesheet" href="textEdit/redactor/redactor.css" />
	<link rel="stylesheet" href="../css/loading/loading.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.x-git.min.js"></script>
	<script src="textEdit/redactor/redactor.min.js"></script>
	<script type="text/javascript" src="../js/loading/pace.min.js"></script>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
<body>
		<table class="table table-hover" style="font-size: 18px;">

				<tr>
					<td></td>
					<td align="center"><?php
        @session_start();
        @date_default_timezone_set('Asia/Dhaka');
        require_once("../db_connect/config.php");
        require_once("../db_connect/conect.php");
        $db = new database();
        $select="SELECT * FROM `student_portal_dashboard`";
	    $checked_query=$db->select_query($select);
	   
	   if($checked_query)
		{
			//$fetch_zero=$checked_query->fetch_array();
		//	print $fetch_zero[2];
	    }
	   
	    $key = "encryption key";
        $stdNewID= bin2hex(openssl_encrypt($_SESSION["useridid"],'AES-128-CBC', $key));
        $selectRoll="SELECT * FROM `running_student_info` WHERE `student_id`='".$_SESSION["useridid"]."'";
        $que=$db->select_query($selectRoll);
        $fetchGroup=$que->fetch_array();
        if($fetchGroup['group_id']=="321710120016")
        {
                // Business Studies
	   ?>
	         <h1>
	             
	              <a href="http://fgc.gov.bd/exam/qspaper.php?exid=130601&std=<?php print $stdNewID ;?>" target='_blank'> Click Here:<br> 1st Year Half Yearly Exam-2021 Subject :Demo  </a>  </h1><br>
	        
	          
	   <?php
        }
        else if($fetchGroup['group_id']=="321710120017")
        {

            // Humanaties
        ?>
                <a href="http://fgc.gov.bd/exam/qspaper.php?exid=130601&std=<?php print $stdNewID ;?>" target='_blank'> Click Here:<br> 1st Year Half Yearly Exam-2021 Subject :Demo  </a>  </h1><br>
                
               
       <?php  }
       else if($fetchGroup['group_id']=="321710120018")
       {
           // science 
       ?>
                <a href="http://fgc.gov.bd/exam/qspaper.php?exid=130601&std=<?php print $stdNewID ;?>" target='_blank'> Click Here:<br> 1st Year Half Yearly Exam-2021 Subject :Demo  </a>  </h1>
       <?php
       }
       ?>
	   
	   </td>
					<td></td>
				</tr>

				<tr>
				<td></td>
				<td></td>
				<td></td>
				</tr>
		</table>	
</body>
</html>