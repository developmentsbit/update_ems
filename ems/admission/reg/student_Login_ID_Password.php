<?php
	require_once("../db_connect/config.php");
	require_once("../db_connect/conect.php");
	$db = new database();
	$selecSql = "SELECT `reg_student_personal_info`.`student_name`,`reg_student_passward`.* FROM `reg_student_passward`
INNER JOIN `reg_student_personal_info` ON `reg_student_personal_info`.`id`=`reg_student_passward`.`studentId`
WHERE `reg_student_passward`.`studentId`='".$_GET["id"]."'";
	$result = $db->select_query($selecSql);
			if($result->num_rows > 0){
					$fetch_result = $result->fetch_array();
			}
			$select_school="select * from project_info";
$cheke_school=$db->select_query($select_school);
if($cheke_school)
{
$fetch_school_information=$cheke_school->fetch_array();
}

		if(isset($_POST["view"])){
			print "<script>location='viewDetails.php?id=$_GET[id]'</script>";
		}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="Description" content="<?php echo $fetch_school_information['meta_tag'] ?>" />
		 <title><?php print $fetch_school_information['title'] ?></title>
		<link rel="shortcut icon" href="../admin/all_image/<?php echo "shortcurt_iconSDMS2015";?>.png" />

<script type="text/javascript" src="../js/vendor/jquery-1.11.3.min.js"></script>
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
	@media print{
			.noneBtnForprin{
				display:none;
			}
			#dont{
				display:none;
			}
			.dontPritntd{
			display:none;
			}
			@page 
			{
				size:  auto;   /* auto is the initial value */
				margin: 0mm;  /* this affects the margin in the printer settings */
			}
		
			
		
			
		}
</style>
  <body>

 
	<div class="container bg-primary ">
				<label class="checkbox-inline">
					<img src="../admin/all_image/logoSDMS2015.png" style="height: 80px; text-align: right;" class="img-responsive" >
				</label>
	<label class="checkbox-inline">
	<h2 style="text-shadow:  0px 3px 3px #999;">	<?php print $fetch_school_information['institute_name'] ?></h2>

						
	<h4>					
		(Online Application)</h4>
		</label>
	</div>
	 

	 
   <form name="" action="" method="post">

	<div class="container bg-info">
					<div class="col-lg-6">
							<table class="table table-resposive table-bordered col-lg-offset-6" style="margin-top:50px; width:100%; background: #fff;" align="center">
									<tr align="center" class="success">
										<td colspan="3"> <h1 class="text-success">Congratulations!!</h1>

										<strong><span style="font-size:18px" class="text-success">Your Online Registration Successfully Completed</span></strong><br/>
<strong><span style="font-size:13px" class="text-danger">Please print the user ID and password. It will be needed for admit card download !!</td>
								</tr>
								
								<tr  style="border:1px #FFFFFF solid">
										<td width="37%" align="center">Name</td>
										<td width="3%" align="center">:</td>
										<td width="48%"><span style="padding-left:10px;"><?php echo $fetch_result["student_name"] ?></span></td>
								</tr>
								<tr>
										<td align="center">ID</td>
										<td align="center">:</td>
										<td><span style="padding-left:10px;"><?php echo $fetch_result["studentId"] ?></span></td>
								</tr>
								<tr>
										<td align="center">Password</td>
										<td align="center">:</td>
										<td><span style="padding-left:10px;"><?php echo $fetch_result["passward"] ?></span></td>
								</tr>
								<tr class="noneBtnForprin" align="right">
										<td  colspan="3">
											&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Print" onClick="window.print()" class="btn btn-large btn-info"/>
											
											<input type="submit" value="View" name="view" class="btn btn-large btn-warning" formtarget="_blank" />
											<a href="login.php?ID=<?php echo $fetch_result['studentId'];?>&PW=<?php echo $fetch_result['passward'] ?>" class="btn btn-large btn-success " target="_blank"> Login</a>
										<!-- 	<a href="payment.php" class="btn btn-large btn-success " target="_blank">Payment</a>
 -->
											
										</td>
												</tr>
							</table>
						</div>
				</div>

				<div class="container bg-success " style="text-align: justify;"> 
		
		<h3 style="color: #ff0000;">নির্দেশনা :</h3>	
		<p style="color: #000; font-size: 16px;"> ১ । ভর্তির আবেদন সম্পূর্ণ করতে মোবাইল ব্যাংকিং (bKash Number : 01728563480 Personal) এর মাধ্যমে ফরম ফি ১৭৫ টাকা পরিশোধ করতে হবে।
		</p>

			<p style="color: #000; font-size: 16px;"> ২। এডমিশন ফরমটি  প্রিন্ট করে স্বাক্ষর করে স্কুল অফিসে জমা দিতে হবে । 
		</p>
		<p style="color: #000; font-size: 16px;">৩ ।  ভেরিফিকেশন সফলভাবে সম্পূর্ণ হলে এডমিট কার্ড  পাওয়া  যাবে।
		</p>

			<p style="color: #000; font-size: 16px;">৪ । নির্ধারিত  দিন মূল এডমিট কার্ড সাথে নিয়ে যেতে হবে। এডমিট কার্ড স্ক্যান করে উপস্থিতি হাজিরা সংগ্রহ করা হবে। </p>


			<p style="color: #000; font-size: 16px;">৫ । নির্ধারিত সময়ে স্টুডেন্ট প্যানেল/ওয়েবসাইট/স্কুলের নোটিশ বোর্ড থেকে ভর্তি পরীক্ষার ফলাফল জানা যাবে। </p>
			<p style="color: #000; font-size: 16px;"> ৬ । ভর্তি পরীক্ষায় উত্তীর্ণ হলে প্রয়োজনীয় ফি জমা দিয়ে নির্ধারিত তারিখের মধ্যে ভর্তি হতে হবে। নচেৎ ভর্তি পরীক্ষার ফলাফল বাতিল হয়ে যাবে।</p>


</div>
			
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</form>
  </body>
</html>