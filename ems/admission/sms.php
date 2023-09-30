<?php	
use AdnSms\AdnSmsNotification;
require_once(__DIR__."/lib/AdnSmsNotification.php");
$adnsms = new AdnSmsNotification();
include('conect.php');
$db=new database();
date_default_timezone_set("Asia/Dhaka");

$x=0;
$y=10;
$date=date('Y-m-d');
echo $date;
if(isset($_POST["sendMessage"]))
{
	$x=$_POST["x"];
	$y=$_POST["y"];
	

	$select="SELECT `hr_employee`.`id`,`student_info`.`phone`,`student_info`.`roll` FROM `hr_employee` INNER JOIN `student_info` ON `student_info`.`device_auto_id`=`hr_employee`.`id` WHERE `hr_employee`.`id` NOT IN(SELECT `employee_id` FROM `att_punches` WHERE `punch_time` LIKE '%$date%' GROUP BY `employee_id`) ORDER BY `hr_employee`.`id` ASC LIMIT $x,$y";
	//echo $select;



		$query=$db->link->query($select);
		if($query){

		while($fetchData=$query->fetch_array())
		{
			
					$message="Respectable guardian, Your son/daughter is absent from the college today. Professor Muhammad Muktar Hussain, Principal, Feni Govt. College";
		   			$recipient  = "880".$fetchData[1];     
					$requestType = 'SINGLE_SMS';    
					$messageType = 'TEXT';       
					$num=intval($fetchData[1]);
					if($num>9)
					{
						//echo $fetchData[0].'->'.$fetchData[2].'<br>';
					 	
					 	$succ='<span style="color:green;">Success</span>';
				 		$sms = new AdnSmsNotification();
						$sms->sendSms($requestType, $message, $recipient, $messageType);
						
						$smsSent="INSERT INTO `sent_sms_info`(`date`,`roll`,`phone`,`session`,`sms`) VALUES('$date','$fetchData[2]','$fetchData[1]','2022-2023','$message')";
						
						//echo $smsSent;
		                $db->link->query($smsSent);
					 }
		}
    }

    $x=$x+$y;
}

?>
<form method="POST">

	<input type="text" name="x" value="<?php print $x;?>"> </input>
	<input type="text" name="y" value="<?php print $y;?>"> </input>
	<input type="submit" name="sendMessage" value="Send Message" style="height: 30px; width: 200px; background: GREEN; color: #fff;"> </input>

</form>

