<!-- fgc_attendance_list.php -->


<style type="text/css">
	td{
			border-right:1px #000 solid;
			border-top:1px #000 solid;
	 }

</style>
<?php
		
require_once("db_connect/config.php");
require_once("db_connect/conect.php");
$db = new database();
$x=0;
$y=3;

if(isset($_POST["add"]))
{
	$x=$_POST["x"];
	$y=$_POST["y"];
	$x=$x+$y;
}

function sender($url,$key,$mobile,$senderId,$sms)
{
	$data = json_encode(array('api_key' => $key,'type'=>'unicode', 'contacts' => $mobile,'senderid'=>$senderId, 'msg' => $sms));
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type:application/json", "Accept: application/json", "Authorization: Basic c2JpdDpORXdRNXJRTw=="));
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
    $dd=curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //http_build_query($data). "\n";
	$contents = curl_exec($ch);
	if (curl_errno($ch)) {
	  echo curl_error($ch);
	  echo "\n<br />";
	  $contents = '';
	} else {
	  curl_close($ch);
	}
}


$slelit="SELECT `hr_employee`.`id`,`hr_employee`.`emp_emergencyphone1` FROM `hr_employee` WHERE hr_employee.`id` NOT IN ( SELECT `att_punches`.`employee_id` FROM `att_punches`) ORDER BY `hr_employee`.`id` ASC limit $x,$y";

	$resultit=$db->select_query($slelit);
	if($resultit){


while($fetchlit=$resultit->fetch_array())
	{

print $fetchlit[0]."<br>";

 $key='R60002955aeb2527c26bd5.91135862';
 $mobile  = '88'.$fetchlit[1]; //Receiver's country code+number
 //print $mobile."<br>";
$senderId='8804445629106';// sender id number
$sms="I wish happiness and good health for you and your family on every day of 2020.
Professor Bimal Kanti Paul,
Principal,Feni Govt. College, Feni."; //Double quotes are good for new line characters e.g. \n
//$sms = urlencode($sms); //Very Important Otherwise spaces shall not be parsed correctly
//print $sms;
ini_set('allow_url_fopen',1);
//$url = "http://users.sendsmsbd.com/smsapi?";
//$succ=sender($url,$key,$mobile,$senderId,$sms);

}

}


?>

<form method="POST">

	<input type="text" name="x" value="<?php print $x;?>"> </input>
	<input type="text" name="y" value="<?php print $y;?>"> </input>
	<input type="submit" name="add" value="Send Message"> </input>


</form>

