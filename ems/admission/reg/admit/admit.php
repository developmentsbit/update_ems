
<?php
error_reporting(1);
@session_start();
@date_default_timezone_set('Asia/Dhaka');
require_once("../../db_connect/config.php");
require_once("../../db_connect/conect.php");
require "../../admin/barcode/vendor/autoload.php";
$db = new database();

if(isset($_GET['adminprint']))
{
    $_SESSION["useridid"]=$_GET['adminprint'];
}

$valid="SELECT * FROM `student_form_info` WHERE `form_ID`='".$_SESSION["useridid"]."' and `status`='1'";

//print $valid;
$cheke=$db->select_query($valid);
if($cheke)
{
	$fetchTxtID=$cheke->fetch_array();




 $sql ="SELECT `reg_student_acadamic_information`.*,`reg_student_address_info`.*,`reg_student_guardian_information`.*,`reg_student_personal_info`.*,
`reg_student_previous_result`.*,`reg_student_passward`.*,`add_class`.`class_name`,`add_group`.`group_name` FROM `reg_student_acadamic_information` INNER JOIN `reg_student_address_info`
ON `reg_student_address_info`.`id`=`reg_student_acadamic_information`.`id` INNER JOIN `reg_student_guardian_information`
ON `reg_student_acadamic_information`.`id`=`reg_student_guardian_information`.`id` INNER JOIN `reg_student_personal_info`
ON `reg_student_personal_info`.`id`=`reg_student_acadamic_information`.`id` INNER JOIN `reg_student_previous_result`
ON `reg_student_previous_result`.`id`=`reg_student_acadamic_information`.`id` INNER JOIN`reg_student_passward` ON `reg_student_passward`.`studentId`=`reg_student_acadamic_information`.`id` INNER JOIN `add_class` ON `add_class`.`id`=`reg_student_acadamic_information`.`admission_disir_class`
INNER JOIN `add_group`  ON  `add_group`.`id`=`reg_student_acadamic_information`.`admission_disir_group` WHERE `reg_student_acadamic_information`.`id`='".$_SESSION["useridid"]."'";
	$result =  $db->select_query($sql);
		if($result->num_rows > 0){
			$fetch_result = $result->fetch_array();
		}


$select_school="select * from project_info";
$cheke_school=$db->select_query($select_school);
if($cheke_school)
{
		$fetch_school_information=$cheke_school->fetch_array();
}


$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
$code = $Bar->getBarcode($_SESSION["useridid"], $Bar::TYPE_CODE_128);


?>


<!doctype html>
<html class="no-js" lang="">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Description" content="<?php echo $fetch_school_information['meta_tag'] ?>" />
		 <title><?php print $fetch_school_information['title'] ?></title>
		<link rel="shortcut icon" href="../all_image/<?php echo "shortcurt_iconSDMS2015";?>.png" />

	


</head>
<link rel="stylesheet" href="admit.css" />
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
			@page 
			{
				size:  auto;   /* auto is the initial value */
				margin: 0mm;  /* this affects the margin in the printer settings */
			}
		
			html
			{
				background-color: #FFFFFF; 
				margin: 0px;  /* this affects the margin on the html before sending to printer */
			}
		
			body
			{
				border: solid 0px blue ;
				margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
			}
		}
</style>
<body>
<center>

		<div class="admitbody">
			<div class="admitheader"> 

				<table width="100%" style="  padding: 0px; " align="center" >
		<tr>	
				<td width="10%"></td>
				<td>
						<div style="float: left; clear: right; width: 15%; text-align: center;  ">  
							<img src="../../admin/all_image/logoSDMS2015.png" style="max-width: 150px; max-height: 100px; " /> 
						</div>
							

						<div style="float: left; clear: right; text-align: center; width: 70% ">   
								<ul>
				    
							    <li style="color:#000000; font-family:microsoft-sun-serif;  font-size:30px; list-style: none;"><?php print $fetch_school_information['institute_name']?></li>

							   <li style="list-style: none; ">

							   		<p style="font-size:16px;font-family:Arial, Helvetica, sans-serif"><?php print $fetch_school_information['location']?> 
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
				
				
			
			</div>
			<div class="menutext">
			<table width="100%">
				<tr>
					<td width="30%" align="left"><h3> ID: <?php echo $_SESSION["useridid"]?></h3></td>
					<td align="center">
					<h3 style=" text-align: center;">Admission Test - 2022 <?php //echo date('Y');?></h3></td>

					<td align="right" width="20%"><h3 style="text-align: right;"><?php echo $code ?></h3></td>
				</tr>
			</table>
				
				
				
			</div>
			
		
		<div class="admitmid">
			<div class="leftdiv">
				<h2>Name</h2>
				<h2>Father's Name</h2>
				<h2>Mother's Name</h2>
				<h2>Gender</h2>
				
				<h2>Class</h2>
				
				<h2>Group</h2>
			
				<h2>Roll No</h2>
				
				
			</div>
			
			<div class="middiv" style="width:40px; float:left; clear:right;">
					<h2>:</h2>
					<h2>:</h2>
					<h2>:</h2>
					<h2>:</h2>
				
					<h2>:</h2>
					
					<h2>:</h2>
					
					<h2>:</h2>
					
				
					<p>&nbsp;</p>
			</div>
			
			
			<div class="middiv">
					<h2><?php echo $fetch_result["student_name"]?></h2>
					<h2><?php echo $fetch_result["father_name"]?></h2>
					<h2><?php echo $fetch_result["mother_name"]?></h2>
					<h2><?php echo $fetch_result["gender"]?></h2>
				
					<h2><?php echo $fetch_result["class_name"]?></h2>
					
					<h2><?php echo $fetch_result["group_name"]?></h2>
					
					<h2><?php echo $_SESSION["useridid"]?></h2>
					
					
					
					
					
					<p>&nbsp;</p>
			</div>
			<div class="rightdiv">
			<?php

			$x="../img/".$_SESSION["useridid"].".jpg";


				if(file_exists($x))
				{
						?>


				<img src="../img/<?php echo $_SESSION["useridid"];?>.jpg" height="171" width="150" style="border:none;" />	

						<?php
				}
				else
				{
						if($fetch_result["gender"]=="Female")
						{
								?>
									<img src="../../other_img/femaleImage.jpg" height="171" width="150" style="border:none;" />	

								<?php
						}
						else
						{?>

								<img src="../../other_img/male.png" height="171" width="150" style="border:none;" />	
					<?php

						}
				}
			?>
		


				</div>
				
			
		</div>
		
		
			
		<div style="border-top:1px #999999 solid;border-left:1px #999999 solid;border-right:1px #999999 solid; width:90%; margin-top:5px;">
		<div class="downtitlediv">
	
	<!--		<h5 style="text-align:center; padding-left:15px;">-->
			    
 <!--০৩ জানুয়ারি সকাল ১০টায় ছাত্রদের এবং ০৪ জানুয়ারি সকাল ১০টায় ছাত্রীদের সাক্ষাৎকার নেওয়া হবে। -->
	<!--	</h5>-->
		</div>
		<div class="footerdiv" style=" text-align:left; height:130px;">
      	<p style="text-align:left; font-weight: bold; text-decoration: underline;">
			সাক্ষাৎকারের সময় নিম্নোক্ত কাগজপত্র সাথে আনতে হবে:</p>
	 <span style="text-align: left;">
			১। ভর্তির মূল প্রবেশপত্র<br>
			২। সর্বশেষ পরীক্ষা পাসের সনদ/একাডেমিক ট্রান্সক্রিপ্ট/মার্কসিট এর ফটোকপি<br>
	
			

		</span>
		</div>
		</div>
		
		<div class="atediv"  style="background:#f4f4f4;padding-top:5px;"><b style="text-align: right;  font-size: 16px; ">Developed By : SBIT,  www.sbit.com.bd</b>		</div>
		</div>
	
	
	<input type="submit"  class="noneBtnForprin" value="Print" name="print" onClick="window.print()" style="height:30px; width:120px;margin-top:-20px;" >	
	
	</center>
</body>
</html>

<?php
}
else
{
	print "
১। ভর্তির মূল প্রবেশপত্র<br>
২। সর্বশেষ পরীক্ষা পাসের সনদ/একাডেমিক ট্রান্সক্রিপ্ট/মার্কসিট এর ফটোকপি<br>
";
}
?>