
<?php
require_once("db_connect/config.php");
require_once("db_connect/conect.php");
$db = new database();



// $key = "encryption key";
// $text="1920001539";
// $encrypted = bin2hex(openssl_encrypt($text,'AES-128-CBC', $key));
// print $encrypted."<br>" ;


// $decrypted=openssl_decrypt(hex2bin($encrypted),'AES-128-CBC',$key);
//print $decrypted;


	$sql="SELECT `std_info_form`.`phone`,`std_info_form`.`roll`,`student_id` FROM `std_info_form`
INNER  JOIN `running_student_info` ON `running_student_info`.`class_roll`=`std_info_form`.`roll`
WHERE `class_id`='311611180001' ORDER BY `roll` ASC";

 $r=$db->link->query($sql);
 while($f=$r->fetch_array())
 {
 			print $f[0]."........->".$f[1]."<br>";

 	    	$s="UPDATE `student_guardian_information` SET `guardian_contact`='$f[0]' WHERE `id`='$f[2]' ";
 			$rr=$db->link->query($s);




 }


?>
