<?php
		require_once("db_connect/config.php");
	require_once("db_connect/conect.php");

	$db = new database();
	
	$select_sn_cmt="SELECT * FROM `teachers_information`  WHERE `index_no`='1' and  `Type`='Teacher'";
	$result=$db->select_query($select_sn_cmt);
	//$count=mysqli_num_fields($result);
	if($result){
		$fetch_sm=$result->fetch_object();
	}
?><meta charset="utf-8">

<style>

.scrollbar
{
	margin-left:0px;
	float: left;
	height: 500px;
	
	background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 25px;
}

.force-overflow
{
	min-height: 450px;
}
		
#style-4::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#style-4::-webkit-scrollbar
{
	width: 5px;
background-color: #F5F5F5;
}

#style-4::-webkit-scrollbar-thumb
{
	background-color: #000000;
	
}


#NOTICES {
	color: black; background-color: #efefef; text-shadow: none;
	-moz-transition: 
		background-color 700ms linear,
			   color 700ms linear;
	-webkit-transition: 
		background-color 700ms linear,
			   color 700ms linear;
	-o-transition: 
		background-color 1000ms linear,
			   color 700ms linear;
	transition: 
		background-color 1000ms linear,
			   color 700ms linear;
	}
#NOTICES:hover {
	color: white; background-color: black; text-shadow: none;
	}



		</style>
<section class="pad-top-none typo-dark" >
						<div class="container">
							 <div class="row" >
										<div class="col-xs-12 col-lg-8" style="border:1px #000000 solid;">
											<div class="img col-md-12 col-xs-12" style="text-align:center; margin-bottom:10px;"><br/>
												
		<img src="other_img/<?php echo $fetch_sm->email?>.jpg" height="180" width="180" class="img-thumbnail"/>
				
											</div>					
												
		<table width="560" height="534" class="" style="margin-top:15px; background:#ffffff">
				<tr>
					<td width="202" style="font-size:17px; font-weight:500">Name</td>
					<td width="64" style="font-size:17px; font-weight:500">:</td>
					<td width="261" style="font-size:17px; font-weight:500">&nbsp; &nbsp;<?php echo $fetch_sm->teachers_name;?></td>
				</tr>
					</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td > 	Email</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->email;?></td>
				</tr>
					<tr style="font-size:17px; font-weight:500">
					<td >Designation </td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->designation;?></td>
				</tr>
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td >Brith Date</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->date_of_birth;?></td>
				</tr>
				
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td >Gender</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->gender;?></td>
				</tr>
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td >Blood Group </td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->blood_group;?></td>
				</tr>
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td >Religious</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->relegion;?></td>
				</tr>
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td > 	Relationship</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->marital_status;?></td>
				</tr>
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td > Father's Name </td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->fathers_name;?></td>
				</tr>
				
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td > 	 Mother's Name</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->mothers_name;?></td>
				</tr>
				
				
				
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td > 	Mobile No</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->mobile_no;?></td>
				</tr>
				
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td > 	Present Address</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php //echo $fetch_sm->present_address;
								$string1=$fetch_sm->present_address;
		
		$a=array("\r\n", "\n", "\r");
		$replace='<br />';
		$about1=str_replace($a, $replace, $string1);

		print $about1;
					?></td>
				</tr>
				
				</tr>
				
					<tr style="font-size:17px; font-weight:500">
					<td >  	Permanent Address</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php //echo $fetch_sm->marital_status;
					$string1=$fetch_sm->parmanent_address;
		
		$a=array("\r\n", "\n", "\r");
		$replace='<br />';
		$about1=str_replace($a, $replace, $string1);
		print $about1;
					
					?></td>
				</tr>
				
				
					<tr style="font-size:17px; font-weight:500"> 
					<td> 	Frist Joining Date</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php echo $fetch_sm->service_firs_joinig_date;
		
						
					?></td>
				</tr >
				
					<tr style="font-size:17px; font-weight:500"> 
					<td> 	 	Education Qualification</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php 
					 $string1=$fetch_sm->educational_qualification;
		
		$a=array("\r\n", "\n", "\r");
		$replace='<br />';
		$about1=str_replace($a, $replace, $string1);
		print $about1;
		
						
					?></td>
				</tr >
				<tr style="font-size:17px; font-weight:500"> 
					<td> 	 	Extra Qualification</td>
					<td>:</td>
					<td>&nbsp; &nbsp;<?php 
					 $string2=$fetch_sm->additional_qualifications;
		
		$a=array("\r\n", "\n", "\r");
		$replace='<br />';
		$about1=str_replace($a, $replace, $string2);
		print $about1;
		
						
					?></td>
				</tr >
					
				
				
				
			
		</table>		
									
										
									
										</div>
										
										
										
										<div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">					<span style="display:block; height:35px; width:100%; background:#2196f3; padding-top:5px; color:#FFFFFF; padding-left:18px; font-size:18px"><strong> NOTICES</strong></span>
										</div>
										
										
										<div class="col-sm-12  col-md-4 col-lg-4   col-xs-12"  id="style-5">
					<!-- Course Wrapper -->
 
							<div class="scrollbar" id="style-4" style="width:100%;height: 1250px;  margin-top:5px;">
								
								<div class="force-overflow">
											
										<!-- forenews-->
								
								
													
												<?php
												$select_notice="SELECT * FROM notice ORDER BY `Notice_id` DESC LIMIT 20";
												$chek_notice=$db->select_query($select_notice);
												if($chek_notice)
												{
												while($fetch_notice=$chek_notice->fetch_array())
												{
												
												if($fetch_notice["Description"]!=""){
												?>
											
													
										
										<a href="?page=notice&Notid=<?php echo $fetch_notice["Notice_id"] ?>"><div style="height:100px; margin-bottom:5px;" class="table-bordered table-hover" id="NOTICES">
												
												<div class="icon-wrap" style="width:100%; padding-left:20px; padding-top:5px;">
													<i class="fa fa-calendar" aria-hidden="true">&nbsp;<span id="newForText">
														<?php echo $fetch_notice["Date_time"];?>
													</span></i>
												</div><!-- Icon Wraper -->
												
																											
												<div class="icon-wrap" style="width:5%; float:left; clear:right; text-align:center;">
													<i class="fa fa-plus" style="width:100%; color:#2196f3">
														
													</i>
												</div><!-- Icon Wraper -->	
												<div style="width:93%; float:right;  padding-left:3px; font-size:16px">
														<span id="NOTICES"><?php $strnotice= $fetch_notice["Title"];
																	 $sNotice = substr($strnotice, 0,300);
																	$textNotice = substr($sNotice, 0, strrpos($sNotice, ' '));
																	print $textNotice.'....';
														?>
														</span><br/>
														
														
												</div>	
										</div></a>
										<?php } else {
										//$an=preg_replace('#[^a-z,A-Z,অ-ঔ,ক-ঁ,া,ি,ী,ু,ূ,ে,ৈ,ো,ৌ,০-৯,0-9]#','',$fetch_notice["Title"]);
										?>
										<a  href="?page=notice&Notid=<?php echo $fetch_notice["Notice_id"] ?>"><div style="height:100px; margin-bottom:5px;" class="table-bordered table-hover" id="NOTICES">
												
												<div class="icon-wrap" style="width:100%; padding-left:20px; padding-top:5px;">
													<i class="fa fa-calendar" aria-hidden="true">&nbsp;<span id="newForText">
														<?php echo $fetch_notice["Date_time"];?>
													</span></i>
												</div><!-- Icon Wraper -->
												
																											
												<div class="icon-wrap" style="width:5%; float:left; clear:right; text-align:center;">
													<i class="fa fa-plus" style="width:100%; color:#2196f3">
														
													</i>
												</div><!-- Icon Wraper -->	
												<div style="width:93%; float:right;  padding-left:3px; font-size:16px">
														<span id="NOTICES"><?php $strnotice= $fetch_notice["Title"];
																	 $sNotice = substr($strnotice, 0,300);
																	$textNotice = substr($sNotice, 0, strrpos($sNotice, ' '));
																	print $textNotice.'....';
														?>
														</span><br/>
														
														
												</div>	
										</div></a>
										
										<?php  } } } ?>
														
										
									
														
									
										
										<!-------->
										
								</div>	
								</div>
			
											
										
						</div><!-- Column -->
										
							</div>
						</div>
</section>




