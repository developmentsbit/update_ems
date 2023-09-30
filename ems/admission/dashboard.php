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
  $select="SELECT * FROM `onlineapplicantdashboard`";
	   $checked_query=$db->select_query($select);
	   if($checked_query)
		{
			$fetch_zero=$checked_query->fetch_array();
			print $fetch_zero[2];
	   }
	   ?></td>
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