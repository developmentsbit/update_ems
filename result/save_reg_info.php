<?php
	
	error_reporting(0);
	require_once("db_connect/conect.php");
    date_default_timezone_set('Asia/Dhaka');
	$db = new database();
   
	$Name=$_POST["Name"];
	$fathersName=$_POST["fathersName"];
	$mothersName=$_POST["mothersName"];
	$studentMobile=$_POST["studentMobile"];
	$guardianMobile=$_POST["guardianMobile"];
	$roll=$_POST["roll"];
	$regNumber=$_POST["regNumber"];
	$className=explode('and', $_POST["className"]);
	$groupname=explode('and', $_POST["groupname"]);
	$Session=$_POST["Session"];
	$count_subject=count($_POST["subject"]);
	$count_selective=count($_POST["selective"]);
	$optional_subject=$_POST["optional_subject"];
	$Name=$_POST["Name"];
	$daeanddTime=date("d-m-Y h:i:sa");
		
   // echo $_POST["selective"][0];
if(!empty($Name) && !empty($fathersName) && !empty($mothersName) && !empty($roll) && !empty($regNumber) && $count_selective=='3' && $count_selective=='3' && !empty($optional_subject))
{
 $id=$db->autogenerat('online_reg_std_info','id','2021','10');
	$sql=$db->link->query("INSERT INTO `online_reg_std_info` (`id`,`name`,`fathers_name`,`mothers_name`,`std_mobile`,`guardian_mobile`,`roll`,`reg`,`class`,`group`,`session`,`date`)
VALUES('$id','$Name','$fathersName','$mothersName','$studentMobile','$guardianMobile','$roll','$regNumber','$className[1]','$groupname[1]','$Session','$daeanddTime')");
	if($sql)
	{
		echo "Save Successfully!!";
	}

	for($a = 0; $a < count($_POST["subject"]);$a++){
			$explodecompulsarysubject=explode('codnumber', $_POST['subject'][$a]);
             $inser_compusaray_Subject="INSERT INTO `online_subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$groupname[0]."','".$explodecompulsarysubject[0]."')";
              $db->insert_query($inser_compusaray_Subject);
		}
		
		for($n=0; $n <count($_POST["selective"]); $n++ )
          {
                 $explopide_selective=explode("codenumber",$_POST['selective'][$n]);
                 $insert_select_subject="INSERT INTO `online_subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$groupname[0]."','".$explopide_selective[0]."')";
                   $db->insert_query($insert_select_subject);
          }
			
		if(!empty($_POST["optional_subject"]))
          {
                $insert_optional_Subject="INSERT INTO `online_subject_registration_table` (`std_id`,`class_id`,`group_id`,`subject_id`) VALUES ('$id','".$className[0]."','".$groupname[0]."','".$_POST["optional_subject"]."')";
                $db->insert_query($insert_optional_Subject);
          }

}
else
{
	print "Save Unsuccessful!!";
}


?>