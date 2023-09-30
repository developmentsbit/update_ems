<?php
    session_start();
	require_once("../db_connect/conect.php");
	$db = new database();
    $select_school="select * from project_info";
    $cheke_school=$db->select_query($select_school);
    if($cheke_school)
    {
        $fetch_school_information=$cheke_school->fetch_array();
    }
    
    $msg="";
    
   
    $stdPhone=$_SESSION['stdPhone'];
    $logstatus=$_SESSION['reg_logstatus'];
    
   if($_SESSION['reg_logstatus']==true)
   {
   
   if(isset($_POST["submit"]))
   {
       $otp=$_POST['std_otp'];
       $select=$db->link->query("SELECT * FROM `reg_otp` WHERE `phone`='$stdPhone' AND `otp`='$otp'");
       if($select->num_rows>0)
       {
            print "<script>location='reg.php'</script>";
       }
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
		<link rel="shortcut icon" href="logo.jpg" />


	
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
					<img src="logo.jpg" style="height: 80px; text-align: right;" class="img-responsive" >
				</label>
	<label class="checkbox-inline">
	<h2 style="text-shadow:  0px 3px 3px #999;">	<?php print $fetch_school_information['institute_name'] ?></h2>

						
	<h4>					
		(Student Information Form)</h4>
		</label>
	</div>
	 

	 
   <form  method="post">

	<div class="container bg-info">
					<div class="col-lg-6">
							<table class="table table-resposive table-bordered col-lg-offset-6" style="margin-top:50px; width:100%; background: #fff;" align="center">
									<tr align="center" class="success">
										<td colspan="3"> <h1 class="text-success">Verify your OTP</h1>

								</tr>
								
								<tr  style="border:1px #FFFFFF solid">
										<td width="37%" align="center">OTP</td>
										<td width="3%" align="center">:</td>
										<td width="48%"><input type="text" name="std_otp" placeholder="Enter Your OTP" class="form-control"> </td>
								</tr>
								
								<tr class="noneBtnForprin" align="center">
										<td  colspan="3">
									        <input type="submit" name="submit" class="btn btn-success" value="Submit"> 
											<p><?php echo $msg;?></p>
										</td>
												</tr>
							</table>
						</div>
				</div>

				<div class="container bg-success " style="text-align: justify;"> 
		
		<h3 style="color: #ff0000;">নির্দেশনা :</h3>	
	

			<p style="color: #000; font-size: 16px;"> ১। এডমিশন ফরমটি  প্রিন্ট করে স্বাক্ষর করে অফিসে জমা দিতে হবে । </p>

</div>
			
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</form>
  </body>
</html>
   
       
 <?php
 }
 else
 {
     print "<script>location='./'</script>";
 }
    
?>