<?php

@session_start();
@date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

$fetch_Acc[2]=0;
$message="";
$paymentType=mysqli_real_escape_string($db->link,isset($_POST["paymentType"])?$_POST["paymentType"]:"");
$accountNumber=mysqli_real_escape_string($db->link,isset($_POST["accountNumber"])?$_POST["accountNumber"]:"");
$TrxID=mysqli_real_escape_string($db->link,isset($_POST["TrxID"])?$_POST["TrxID"]:"");
$BkashNumber=mysqli_real_escape_string($db->link,isset($_POST["BkashNumber"])?$_POST["BkashNumber"]:"");
$FormNumber=mysqli_real_escape_string($db->link,isset($_POST["FormNumber"])?$_POST["FormNumber"]:"");



if(isset($_POST["addBtn"]))
{
  if(!empty($TrxID) && !empty($BkashNumber && !empty($FormNumber)))
  {
    $sql="INSERT INTO `admission_form_payment_info` (`FormNumber`,`Banking_Type`,`AccNo`,`TrxID`,`BkashNumber`,`Name`,`Date`,`status`) VALUES('$FormNumber','$paymentType','$accountNumber','$TrxID','$BkashNumber','Name','".date('d-m-Y')."','0')";
    $r=$db->link->query($sql);
	if($r)
	{
		  $message="Successfully Added!! ";
		  $message.='<p style="color:#ff0000;"> After Varification you can download the admit card!! </p>';
	}
	else
	{
		$sql="UPDATE `admission_form_payment_info` set `Banking_Type`='$paymentType',`AccNo`='$accountNumber',`BkashNumber`='$BkashNumber',`Name`='Name' where `FormNumber`='$FormNumber'";
    	$r=$db->link->query($sql);
    	$message="Successfully Added!! ";
    	$message.='<p style="color:#ff0000;">You can download the admit card!! </p>';
	}

   
  }
  else
  {
    $nulMessage="<span style='color:red; font-size:15px;'>Sorry !! Fields is Empty</span>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compitable" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Dashboard</title>
    <!--Bootstarp-->
  <link rel="stylesheet" type="text/css" href="textEdit/css/style.css" />
	<link rel="stylesheet" href="textEdit/redactor/redactor.css" />
	<link rel="stylesheet" href="../css/loading/loading.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.x-git.min.js"></script>
	<script src="textEdit/redactor/redactor.min.js"></script>
	<script type="text/javascript" src="../js/loading/pace.min.js"></script>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
<body>
		<table class="table table-hover bg-info" style="max-width: 600px; font-size: 18px;" align="center" >
				<tr>
						<td class="bg-danger"><h1>Payment Info</h1></td>
				</tr>

				<tr>
						<td>
							
					<form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">


							  <div class="form-group">
							    <label for="email">Date</label>
							    <input type="text" name="date" class="form-control" id="pwd" value="<?php print date('d-m-Y') ?>">
							  
							  </div>


							  <div class="form-group">
							    <label for="email">Mobile Banking</label>
							    <select name="paymentType"class="form-control">
							    	<option>Bkash</option>
							    </select>
							  
							  </div>

							  <div class="form-group">
							    <label for="pwd">School Account Number </label>

							    	<?php
							    		$sql="SELECT * FROM `bank_information` WHERE `bankingType`='Bkash'";
							    		$query=$db->select_query($sql);
							    		if($query)
							    		{
							    				$fetch_Acc=$query->fetch_array();


							    		}

							    	?>

							    <input type="text" class="form-control" id="pwd" name="accountNumber" value="<?php print $fetch_Acc[2];?>" readonly>
							  </div> 

 <div class="form-group">
							    <label for="pwd">Admission Form Number</label>
							    <input type="text" name="FormNumber" class="form-control" id="pwd" value="<?php print $_SESSION["useridid"] ?>">
							  </div>

							   <div class="form-group">
							    <label for="pwd">TrxID </label>
							    <input type="text" class="form-control" name="TrxID" id="pwd">
							  </div>

							   <div class="form-group">
							    <label for="pwd">Bkash Number </label>
							    <input type="text" name="BkashNumber" class="form-control" id="pwd">
							  </div>

							 


							  <div class="form-group">
							  
							 
							     <label><input type="submit" value="Submit" name="addBtn" class="btn btn-success"></input> </label>
							     <label></label>
							  </div>

<?php print $message;?>
							</form>

						</td>
				</tr>

		</table>


</body>
</html>