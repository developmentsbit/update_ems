<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admission Form Fee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 </head>
 <body>



<?php 
		session_start();
		date_default_timezone_set('Asia/Dhaka');
  		if(isset($_POST["insertval"]))
  		{
  			unset($_SESSION['formid']);
  			unset($_SESSION['formStatus']);
  			  require_once("../db_connect/config.php");
			  require_once("../db_connect/conect.php");
			  $db = new database();

			  $select="SELECT * FROM `student_form_info` WHERE `TrxId`='".$_POST["TrxId"]."'";
			  $query=$db->link->query($select);
			  if($query->num_rows>0)
			  {
			  		$fetchinfo=$query->fetch_array();
			  		$_SESSION['formid']=$fetchinfo[0];
			  		$_SESSION['formStatus']=1;
			    ?>
			    		<form method="post">
			    			<table class="table table-bordered">
			    				<tr>
			    						<td align="center" style="color: green"><h3>Insert Successfully!!</h3></td>
			    						 <input type="hidden" value="<?php print $fetchinfo[1];?>" name="formID"><h2>
			    						  Your Name: <?php print $fetchinfo[1];?>, 
			    						  Your ID: <?php print $fetchinfo[0];?>,
			    						
			    						 Your Phone: <?php print $fetchinfo[2];?></h2>
			    				</tr>
			    				
			    				<tr>
								<td align="left">
                  নির্দেশনা:<br>
                  ১। আবেদন ফরমের সকল তথ্য সত্য ও নির্ভুল হতে হবে।<br>
                  ২। অসম্পূর্ণ তথ্যের কারণে আবেদন বাতিল হতে পারে।<br>
                  ৩। পূর্ববর্তী সনদ অনুসারে তথ্যাদি পূরণ করতে হবে।<br>
                  ৪। এডমিশন ফরমটি  প্রিন্ট করে স্বাক্ষর করে স্কুল অফিসে জমা দিতে হবে ।  <br>
                  ৪। ফাইনাল সাবমিটের পর কর্তৃপক্ষের ভেরিফিকেশনের জন্য অপেক্ষা করতে হবে।<br>
                  ৬। ভেরিফিকেশনের পরে স্কুল অফিসে এডমিট কার্ড পাওয়া যাবে। <br>
                  ৭। এডমিট কার্ডটি  নির্ধারিত দিন স্কুলে নিয়ে আসতে হবে । <br>
                  <br>

												<center> 
												<a href="RegistrationForm.php?formID=<?php print $fetchinfo[0];?>" class="btn btn-success"> Click Ok </a>
												
												<!--<input name="clickOk" type="submit" name="btn btn-success" value="Click Ok" style="color: #fff; width: 200px; border-radius: 5px; background: green;">-->
												</center>
									</td>
			    				</tr>
			    			</table> 
			    		</form>
			   <?php

			  }
			  else{

			  

  			  $prefix=date("y");
  			  $id=$db->autogenerat('student_form_info','form_ID',$prefix,'6');
			  $sql="INSERT INTO `student_form_info` (`form_ID`,`student_name`,`phone`,`class`,`bKash_number`,`TrxId`,`date`,`time`,`status`) VALUES('$id','".$_POST["name"]."','".$_POST["Phone"]."','".$_POST["Class"]."','".$_POST["bkashno"]."','".$_POST["TrxId"]."','".date('Y-m-d')."','". date("h:i:sa")."','0')";
			  $result=$db->link->query($sql);
			  if($result)
			  {
			  		
			  		$_SESSION['formid']=$id;
			  		$_SESSION['formStatus']=1;
			    ?>
			    <form method="post">
			    			<table class="table table-bordered">
			    				<tr>
			    						<td align="center" style="color: green"><h3>Insert Successfully!!</h3></td>
			    						 <input type="hidden" value="<?php print $id;?>" name="formID">
			    				</tr>
			    				
			    				<tr>
				 <td align="left">
                  নির্দেশনা:<br>
                  ১। আবেদন ফরমের সকল তথ্য সত্য ও নির্ভুল হতে হবে।<br>
                  ২। অসম্পূর্ণ তথ্যের কারণে আবেদন বাতিল হতে পারে।<br>
                  ৩। পূর্ববর্তী সনদ অনুসারে তথ্যাদি পূরণ করতে হবে।<br>
                  ৪। এডমিশন ফরমটি  প্রিন্ট করে স্বাক্ষর করে স্কুল অফিসে জমা দিতে হবে ।  <br>
                  ৪। ফাইনাল সাবমিটের পর কর্তৃপক্ষের ভেরিফিকেশনের জন্য অপেক্ষা করতে হবে।<br>
                  ৬। ভেরিফিকেশনের পরে স্কুল অফিসে এডমিট কার্ড পাওয়া যাবে। <br>
                  ৭। এডমিট কার্ডটি  নির্ধারিত দিন স্কুলে নিয়ে আসতে হবে । <br>
                  <br>

                        <center>
                            <a href="RegistrationForm.php?formID=<?php print $id;?>" class="btn btn-success"> Click Ok </a>
                          
                             </center>
									</td>
			    				</tr>
			    			</table> </form>

			    <?php
			  }
			  else{
			  		unset($_SESSION['formid']);
			  		unset($_SESSION['formStatus']);
			  		

			  		?>

			  			<table class="table table-bordered">
			    				<tr>
			    						<td align="center" style="color: #ff0000;"><h3>Insert Unsuccessfully!!</h3></td>
			    				</tr>
			    				<tr>
								<td align="center">
									


									</td>
			    				</tr>
			    			</table>


			  		<?php
			  }
			}

			
  		}
  		

 ?>

 		</body>
 		</html>
