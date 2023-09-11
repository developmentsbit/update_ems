  <?php
	@error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	
		require_once("../db_connect/config.php");
	    require_once("../db_connect/conect.php");
	    require "barcode/vendor/autoload.php";
		date_default_timezone_set("Asia/Dhaka");
		$db = new database();
	

 		$select_school="select * from project_info";
		$cheke_school=$db->select_query($select_school);
		if($cheke_school)
		{
			$fetch_school_information=$cheke_school->fetch_array();
		}

		$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php print $fetch_school_information['title'] ?></title>
	<link rel="shortcut icon" href="all_image/<?php echo "shortcurt_iconSDMS2015";?>.png" />

	<style>
			@media print{
			.noneBtnForprin{
				display:none;
			}
			#dont{
				display:none;
			}
			.dontprint{
			display:none;
			}
			

			.container{

				width: 800px; 
				height: auto;

				
			}

			.IdCard{
				float: left; clear: right;
	
				 width: 380px;
				 margin-top:30px;
			}
		}
	</style>
    </head>

  <body>





  
            <div class="container">
           
					
					
					<?php
				 	$selecr_data="SELECT `running_student_info`.*,`student_personal_info`.`id`,`student_name`,`student_acadamic_information`.`session2`,
`add_class`.`class_name`,`add_group`.`group_name` FROM `running_student_info` INNER JOIN `student_personal_info`
ON `student_personal_info`.`id`= `running_student_info`.`student_id` INNER JOIN `student_acadamic_information`
ON `student_acadamic_information`.`id`=`running_student_info`.`student_id` INNER JOIN `add_class`
ON `add_class`.`id`=`running_student_info`.`class_id` INNER JOIN `add_group`
ON `add_group`.`id`=`running_student_info`.`group_id` WHERE `running_student_info`.`class_id`='".$_GET["clID"]."'
AND `running_student_info`.`group_id`='".$_GET["gpna"]."'  AND `student_acadamic_information`.`session2`='".$_GET["session"]."' AND `running_student_info`.`class_roll`  BETWEEN '".$_GET["stdRollfrom"]."' AND '".$_GET["stdRollto"]."' ORDER BY `running_student_info`.`class_roll` ASC";
				$result_data = $db->select_query($selecr_data);		
						if($result_data->num_rows > 0)	{
								while($fetch_Data = $result_data->fetch_array()){

								$code = $Bar->getBarcode($fetch_Data["student_id"], $Bar::TYPE_CODE_128);
					?>
							<div class="IdCard" style="float: left; clear: right; padding: 10px;">

								<table  width="100%" style=" border: 1px #000 solid;  padding: 0px; " align="center" >
								<tr>	
										
										<td>
												<div style="float: left; clear: right; width: 15%; text-align: center;  ">  
													<img src="all_image/logoSDMS2015.png" style="max-width: 70px; max-height: 70px; margin: 10px;" /> 
												</div>
							

						<div style="float: left; clear: right; text-align: left; width: 80% ">   
								<ul>
				  
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:24px; list-style: none; margin-top:-12px;"><?php print $fetch_school_information['institute_name']?></li>

							   <li style="list-style: none; margin-top:-12px; ">

							   		<p style="font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['LocationbAngla']?> 
   								</p>

							   	</li>

							   <li style=" margin-top:-15px; list-style: none; font-size:14px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['email']; ?>
							   <br><?php print $fetch_school_information['phone_number']?>  </li>
							 </ul> 

				      </div>

				      <div style="float: right;  width: 10%; text-align: center;  ">  
							
						</div>
				</td>
				
		</tr>
	
</table>
			
			<table  width="100%" style=" border: 1px #000 solid;  border-top: 0px;  padding: 0px; height: 50px; " align="center" >
				<tr>
					<td  width="20%"> </td>
					<td align="center"><b style="background: #000; padding: 10px; color: #fff; border-radius: 10px; font-weight: bold; "> Student ID Card</b> </td>
					<td  width="20%"></td>
				</tr>
			</table>

							  
									<table  width="100%" style=" border: 1px #000 solid;  border-top: 0px;  padding: 0px;  height: 300px; " align="center" >
											
											<tr>
												<td colspan="4" align="center"> <strong>

												<span style="font-size:16px; font-weight:bold; border-bottom:2px #000000 solid; letter-spacing:1">Student ID  -<?php echo $fetch_Data["student_id"];?>
												</span>
												</strong>
												</td>
											</tr>
											
											<tr>
											 
											  
											  
											  
												<td width="15%"  style="padding-left:5px; font-size:18px; border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;">Name</td>

												<td width="3%" style="padding-left:5px;  font-size:18px;  border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;">:</td>

												<td width="54%" style="padding-left:5px;  font-size:18px;border-bottom:1px #FFFFFF solid; "><?php echo $fetch_Data["student_name"];?></td>

												 <td width="28%" rowspan="7" align="center" style="vertical-align:top">

                                                <img src="../other_img/<?php echo $fetch_Data["student_id"];?>.jpg" height="120" width="120" style="margin-top:5px; margin-left:2px; margin-right:2px;"/><b/>

                                                <br>

                                               <p>  <?php echo $code ?></p>

											  </td>


											</tr>

											<tr>
											  <td  style="padding-left:5px;  font-size:18px;  border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;"> Class</td>
												<td style="padding-left:5px;  font-size:18px;  border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;">:</td>
												<td style="padding-left:5px;  font-size:18px; border-bottom:1px #FFFFFF solid;"><?php echo $fetch_Data["class_name"];?></td>
											</tr>

											
											<tr>
											  <td  style="padding-left:5px;  font-size:18px;  border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid; ">Group</td>
												<td style="padding-left:5px;  font-size:18px;  border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;">:</td>
												<td style="padding-left:5px;  font-size:18px;  border-bottom:1px #FFFFFF solid;"><?php echo $fetch_Data["group_name"];?></td>
											</tr>
										
											<tr>
											  <td style="padding-left:5px;  font-size:18px; border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;">Roll</td>
											  <td style="padding-left:5px;  font-size:18px; border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;">:</td>
											  <td style="padding-left:5px;  font-size:18px; border-bottom:1px #FFFFFF solid;"><?php echo $fetch_Data["class_roll"];?></td>
									  </tr>
											<tr>
											  <td  style="padding-left:5px;  font-size:18px; border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;">Year</td>
												<td style="padding-left:5px;  font-size:18px; border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid;">:</td>
												<td style="padding-left:5px;  font-size:18px;"><?php echo date('Y');?></td>
											</tr>
											
											
											<tr>


											<td height="50" colspan="2"  align="left" style=" border-top:1px  #FFFFFF solid; border-right:1px #FFFFFF solid; font-size:16px; font-weight:600; letter-spacing:1;">&nbsp;</td>
											  <td height="30" colspan="3" align="right" style="border-top:1px  #FFFFFF solid; font-size:16px; font-weight:600; letter-spacing:1"><span><br><?php print $fetch_school_information['Authority']?></span> &nbsp;&nbsp;</td>
											</tr>
							  </table>

							  	<table  width="100%" style=" border: 1px #000 solid;  border-top: 0px;  padding: 0px; height: 50px; " align="center" >
				<tr>
					<td  width="20%"> </td>
					<td align="center"><b style=" font-size: 18px; font-weight: bold; "> <?php print $fetch_school_information['webAddress']?> </b> </td>
					<td  width="20%"></td>
				</tr>
			</table>
							  
							  
							</div>
							<?php  } 	

							} ?>
							<!--End for looop-->
						
					</div>

						<input type="submit" value="Print"  class="btn btn-block btn-success noneBtnForprin" style="margin-bottom:10px; border-radius:0px;" onClick="window.print()"/>
		


  </body>
</html>
<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>
