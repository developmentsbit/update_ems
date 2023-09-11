<?php
require_once("db_connect/config.php");
require_once("db_connect/conect.php");
date_default_timezone_set('Asia/Dhaka');
$db = new database();


if(isset($_GET["del"]))
			{
				$del = $db->link->query("DELETE FROM  `registration` where `id` = '".$_GET["del"]."'");

					if($del)
					{
				// 		echo "<script>Location : viewRegistrationNo.php</script>";
                        header('Location: viewRegistrationNo.php');
                        
					}
					else 
					{
						echo "Delete Unsuccessful";
					}
			}

?>