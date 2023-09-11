<?php
error_reporting(1);
@session_start();
@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

$id=$_SESSION["useridid"];

if($_SESSION["userlogin"]==1)
{


$select_school="select * from project_info";
$cheke_school=$db->select_query($select_school);
if($cheke_school)
{

	$fetch_school_information=$cheke_school->fetch_array();
}

  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="Skill Based IT" />
        <link rel="icon" type="image/x-icon" href="../admin/all_image/hompag55eCodeSDMS2015.jpg" />
        <title>Student Protal</title>
 		<link href="../css/bootstrap.min.css" rel="stylesheet">
 	</head>
 	<body>
 		<br> 
 		 	<table class="table table-bordered" align="center" style="max-width: 1200px;">
 		 			<tr>
 		 				<td colspan="7"><h3>Due Report</h3></td>
 		 			</tr>

 		 				<tr>
 		 					<td width="80">  SL</td>
 		 					<td width="200"> Title</td>
 		 					<td width="100"> Month</td>
 		 					<td width="100"> Payable</td>
 		 					<td width="100"> Discount</td>
 		 					<td width="100"> Due</td>
 		 			</tr>

 		 			<?php
 		 			$i=1;
 		 			$totalAmount=0;
 		 			$totalDiscount=0;

 		 			$totalpaid=0;
 		 			$totaldue=0;

 		 				$sql="SELECT `student_account_info`.`fee_id`,`student_account_info`.`AmountExceptional`,`add_fee`.`title`,`add_fee`.`amount`,`month_setup`.`name` FROM `student_account_info` 
INNER JOIN `add_fee` ON `add_fee`.`id`=`student_account_info`.`fee_id`
INNER JOIN `month_setup` ON `month_setup`.`id`=`add_fee`.`fk_month_id`
WHERE `student_account_info`.`studentID`='$id' AND `student_account_info`.`year`='2020' AND `add_fee`.`index` AND `fk_month_id` BETWEEN 01 AND 08";
							$query=$db->link->query($sql);
							while($fetch=$query->fetch_array())
							{

							$due=0;

							$fetchdis[0]=0;$fetchPaid[0]=0;
							

							$paid=0;
							$paid="SELECT SUM(`paid_amount`) AS 'total' FROM `student_paid_table` WHERE `student_id`='$id' AND `fk_fee_id`='$fetch[0]' AND `year`='2020'";
 		 							$queryPaid=$db->link->query($paid);

 		 							if($queryPaid)
 		 								{
 		 									$fetchPaid=$queryPaid->fetch_array();
 		 									
 		 									$paid=$fetchPaid[0];

 		 								}


 		 					if($fetch['amount']>$paid)
 		 					{

 		 						$totalAmount=$totalAmount+$fetch['amount'];
 		 			?>
 		 			<tr>
 		 					<td width="80">  <?php print $i++; ?></td>
 		 					<td width="200"> <?php print $fetch['title']; ?></td>
 		 					<td width="100"> <?php print $fetch['name']; ?></td>
 		 					<td width="100"> <?php print $fetch['amount']; ?></td>
 		 					<td width="100">
 		 						<?php
 		 							$dis="SELECT SUM(`discount`) AS 'total' FROM `add_discount` WHERE `student_id`='$id' AND `feeid`='$fetch[0]' AND `year`='2020'";
 		 							$queryDis=$db->link->query($dis);

 		 							if($queryDis)
 		 								{
 		 										$fetchdis=$queryDis->fetch_array();
 		 										print $fetchdis[0];
 		 										$totalDiscount=$totalDiscount+$fetchdis[0];
 		 								}
 		 								

 		 						?>

 		 					</td>
 		 				
 		 					<td width="100">
 		 						<?php
 		 							$due=$fetch['amount']-($fetchdis[0]+$fetchPaid[0]);
 		 							print $due;
 		 							$totaldue=$totaldue+$due;
 		 						?>

 		 					</td>
 		 			</tr>

 		 			<?php
 		 		}

 		 	}

 		 			?>

 		 			<tr>
 		 							<td colspan="3" align="right"> Total : </td>
 		 							<td><?php print $totalAmount;?>/-</td>
 		 							<td> <?php print $totalDiscount;?>/-  </td>
 		 						
 		 							<td> <?php print $totaldue; ?>/-</td>
 		 			</tr>
 		 	</table>

 	</body>
 	</html>
<?php
}
?>