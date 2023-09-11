<?php

error_reporting(1);
@session_start();

require_once("../../db_connect/conect.php");
$db = new database();

require_once(__DIR__."/lib/AdnSmsNotification.php");
use AdnSms\AdnSmsNotification;

if (isset($_POST["send"])) 
{

	$input=$_POST['input'];
	$q = "select * from `book1` order by `roll` asc LIMIT $input,50 ";
	//echo $q;
	$s=$db->select_query($q);
	
	while($fetch=$s->fetch_array())
	{

     			$msg="Dear guardians, You are cordially invited to attend 'The Guardian Conference & Brilliant Student Reception-2022' on 12 March, Saturday, arranged by Feni Government College in which the honourable MP Nizam Uddin Hazari will be present as a Chief Guest. Plz, don't miss it anyhow. Regards, Principal Feni Govt. College";
				
					 $recipient  = "880".$fetch[1];     
					 $requestType = 'SINGLE_SMS';    
					 $messageType = 'TEXT';       
					 $num=intval($fetch[1]);
					 if($num>9)
					 {
					 	//echo $recipient.'---->'.$fetch[0].'<br>';
					 	$succ='<span style="color:green;">Success</span>';
						$sms = new AdnSmsNotification();
						$sms->sendSms($requestType, $msg, $recipient, $messageType);
					 }

				
			}

						
	}


?>



<!DOCTYPE html>
<html>
<head>
	<title>FGC Message</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="input">
		<input type="submit" name="send" value="Send">
	</form>

</body>
</html>