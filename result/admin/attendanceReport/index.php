<?php	
use AdnSms\AdnSmsNotification;
require_once("db_connect/conect.php");
require_once(__DIR__."/lib/AdnSmsNotification.php");
$db = new database();
$adnsms = new AdnSmsNotification();

$x=0;
$y=10;

if(isset($_POST["sendMessage"]))
{
	$x=$_POST["x"];
	$y=$_POST["y"];
	$x=$x+$y;

	$sql="SELECT `hr_employee`.`id`,`hr_employee`.`emp_emergencyphone1`,`hr_employee`.`emp_gender` FROM `hr_employee` WHERE hr_employee.`id` NOT IN ( SELECT `att_punches`.`employee_id` FROM `att_punches`) ORDER BY `hr_employee`.`id` ASC limit $x,$y";

	$resultit=$db->select_query($sql);
	if($resultit){

		while($fetchData=$resultit->fetch_array())
		{
			//print $fetchData[1]."<br>";
			if($fetchData[2]==0)
			{
				$gender="Son";
			}
			else
			{
				$gender="Daughter";
			}

			$message="Respectable guardian,Your ". $gender. " is absent from the college today. Bimal Kanti Paul, Principal, Feni Govt. College";
			$mobile=$fetchData[1];

			print $mobile."<br>";
		    $messageType = mb_detect_encoding($message) == "ASCII" ? "Text" : "Unicode";
		    $campaignTitle = "Feni Govt. College";

		   $succ = $adnsms->sendBulkSms($message, $mobile, $messageType, $campaignTitle);
		}
    }
}

?>



<form method="POST">

	<input type="text" name="x" value="<?php print $x;?>"> </input>
	<input type="text" name="y" value="<?php print $y;?>"> </input>
	<input type="submit" name="sendMessage" value="Send Message" style="height: 30px; width: 200px; background: GREEN; color: #fff;"> </input>

</form>

