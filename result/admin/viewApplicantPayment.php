<?php
error_reporting(1);
	@session_start();
	
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	

	$select_school="select * from project_info";
$cheke_school=$db->select_query($select_school);
if($cheke_school)
{
		$fetch_school_information=$cheke_school->fetch_array();

}

							    		$sql="SELECT * FROM `bank_information` WHERE `bankingType`='Bkash'";
							    		$query=$db->select_query($sql);
							    		if($query)
							    		{
							    				$fetch_Acc=$query->fetch_array();


							    		}



		if(isset($_POST['Approve']))
		{
			$txtID=count($_POST["txtID"]);
		
		
			for($x = 0;$x<count($_POST["txtID"]) ; $x++){

							if($_POST["txtID"][$x]!="")
							{
								$sql="UPDATE `admission_form_payment_info` SET `status`='1' WHERE `TrxID`='".$_POST["txtID"][$x]."'";
								$db->link->query($sql);

								$id=$db->autogenerat('bank_transaction','id','TXN-','10');


								$info='Name: '.$_POST['stdName'][$x].',  ID: '.$_POST['invoice'][$x];

								$insert="INSERT INTO `bank_transaction`(`id`,`account_name`,`transaction_type`,`vouchar_no`,`amount`,`date`,`admin`,`EntryDate`,`details`) VALUES ('$id','$fetch_Acc[2]','Deposit','".$_POST["txtID"][$x]."','200','".date('d-m-Y')."','SBIT','".date('Y-m-d')."','".$info."')";

								

								$db->link->query($insert);


								
								
								
								

							}
			}

			

		}
?>

	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Show Result Sheet</title>
	<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	 </head>
	 <body>
<form method="POST">
	 <table class="table table-bordered table-hover">
		<tr>	
				<td width="10%"></td>
				<td>
						<div style="float: left; clear: right; width: 15%; text-align: center;  ">  
							<img src="all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
						</div>
							

						<div style="float: left; clear: right; text-align: center; width: 70% ">   
								<ul>
				    
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;"><?php print $fetch_school_information['institute_name']?></li>

							   <li style="list-style: none; ">

							   		<p style="font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['LocationbAngla']?> 
   								</p>

							   	</li>

							    <li style=" list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['webAddress']?><br><?php print $fetch_school_information['phone_number']?>, <?php print $fetch_school_information['email']; ?>  </li>
							 </ul> 

				      </div>

				      <div style="float: right;  width: 15%; text-align: center;  ">  
							
						</div>
				</td>
				<td width="10%"></td>
		</tr>
		</table>

<?php
	$sql_session="SELECT `reg_student_personal_info`.*,`admission_form_payment_info`.`status` FROM `reg_student_personal_info`
INNER JOIN `admission_form_payment_info` ON `admission_form_payment_info`.`FormNumber`=`reg_student_personal_info`.`id`
 WHERE `admission_form_payment_info`.`status`='0' GROUP BY `reg_student_personal_info`.`email`";



				$resultSession  = $db->select_query($sql_session);
					if($resultSession->num_rows > 0){
					?>	<table class="table table-bordered table-hover">
				<?php		while($fetchSEssion = $resultSession->fetch_array()){
				?>
				
							<tr>
								<td align="center" colspan="10"><span class="text-success" style="font-size:18px;"><?php echo $fetchSEssion["email"];?></span>
								</td>
							</tr>
							<?php 
									$sqlForClass = "SELECT `reg_student_acadamic_information`.*,`add_class`.`class_name`
 FROM `reg_student_acadamic_information` INNER JOIN `add_class` ON `add_class`.`id`=`reg_student_acadamic_information`.`admission_disir_class`
 INNER JOIN `reg_student_personal_info` 
ON `reg_student_personal_info`.`id`=`reg_student_acadamic_information`.`id`

 WHERE `reg_student_personal_info`.`email`='$fetchSEssion[email]' GROUP BY `reg_student_acadamic_information`.`admission_disir_class` ORDER BY `reg_student_acadamic_information`.`admission_disir_class` ASC";

 									$resultForClass = $db->select_query($sqlForClass);	
									if($resultForClass->num_rows > 0) {
										while($fetchForClass = $resultForClass->fetch_array()){
							?>
							<tr>
								<td align="center" colspan="10"><span class="text-info" style="font-size:16px;"><?php echo $fetchForClass["class_name"];?></span>
								</td>
							</tr>
							<tr>
								<td align="center">Select</td>
								<td align="center">SL NO.</td>
								<td align="center">Student ID</td>
								<td align="center">Student's Name</td>
								<td align="center">Father's Name</td>
								<td align="center">Mother's Name</td>
								<td align="center">Application Date</td>
								<td align="center">Action</td>
							</tr>
							<?php 
									$sqlfordetails  = "SELECT `reg_student_personal_info`.*,`reg_student_acadamic_information`.*,`reg_student_passward`.*,`add_group`.`group_name`,`admission_form_payment_info`.* FROM `reg_student_personal_info`
									INNER JOIN `admission_form_payment_info` ON `admission_form_payment_info`.`FormNumber`=`reg_student_personal_info`.`id` INNER JOIN `reg_student_acadamic_information` ON `reg_student_acadamic_information`.`id`=`reg_student_personal_info`.`id` INNER JOIN `reg_student_passward` ON `reg_student_passward`.`studentId`=`reg_student_personal_info`.`id` INNER JOIN `add_group` ON `add_group`.`id`=`reg_student_acadamic_information`.`admission_disir_group`
 WHERE  `reg_student_personal_info`.`email`='".$fetchSEssion['email']."'  AND `admission_form_payment_info`.`status`='0' AND
 `reg_student_acadamic_information`.`admission_disir_class`='".$fetchForClass["admission_disir_class"]."' ORDER BY `reg_student_personal_info`.`id` ASC";





 								$resultFordetails = $db->select_query($sqlfordetails);
										if($resultFordetails->num_rows > 0){
										    $sl=0;
											while($fetchfordetails =$resultFordetails->fetch_array()){
											    $sl++;
								
							?>
							<tr>
							<td align="center"><input type="checkbox" name="txtID[]" value="<?php print $fetchfordetails['TrxID']?>"></input> </td>
							    <td align="center"><?php echo $sl;?></td>
							    <td align="center"><?php echo $fetchfordetails["studentId"];?></td>
								<td align="center"><?php echo $fetchfordetails["student_name"];?>

								<input type="hidden" name="stdName[]" value="<?php echo $fetchfordetails["student_name"];?>"></input>
								<input type="hidden" name="invoice[]" value="<?php echo $fetchfordetails["studentId"];?>"></input>

								</td>
							    <td align="center"><?php echo $fetchfordetails["father_name"];?></td>
								<td align="center"><?php echo $fetchfordetails["mother_name"];?></td>
								<td align="center"><?php echo $fetchfordetails["addmission_date"];?></td>
								<td align="center">

								<input type="submit" value="Approve" class="btn btn-large btn-success"/> </td>
							</tr>
							<?php } } } } } ?>

								<tr>
								<td align="center" colspan="10">

									<input type="submit" value="Approve" name="Approve" class="btn btn-large btn-danger"/>

								</td>
							</tr>
					</table>
					</form>
				<?php
	
	}
	
	?>
		 </body>

	</html>
