
         <?php
    error_reporting(1);
	@session_start();
	if($_SESSION["logstatus"] === "Active")
	{	
	require_once("../db_connect/config.php");
    require_once("../db_connect/conect.php");
	date_default_timezone_set("Asia/Dhaka");
	$db = new database();
	
	$sqlforTitle="SELECT * FROM `project_info`";
	$chke=$db->select_query($sqlforTitle);
	if($chke){
		$fetch_tiitle=$chke->fetch_array();
	}
	

	if($_GET["date"] != "" && $_GET["stdid"]!="" )
	{
	  $inserSql="REPLACE INTO `distributedtestomoniallist` (`date`,`studentId`) VALUES ('".date('d/m/Y')."','".$_GET["stdid"]."')";
	  $resultsql=$db->update_query($inserSql);													
	}


	$sqlForTest="SELECT `statictestomonialinfo`.*,`distributedtestomoniallist`.* FROM `statictestomonialinfo` INNER JOIN `distributedtestomoniallist` ON `distributedtestomoniallist`.`studentId`=`statictestomonialinfo`.`boardResultID` WHERE `statictestomonialinfo`.`boardResultID`='".$_GET["stdid"]."'";
	$resultForAll=$db->select_query($sqlForTest);
	if($resultForAll){
		$fetchForall=$resultForAll->fetch_array();
	}
//	echo $fetchForall['gender'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Testimonial</title>


<style type="text/css">
*{padding:0px; margin:0px;}
body{font-family: "Times New Roman", Times, serif; font-size:18px;}


</style>
</head>
<body>
	<?php if($fetchForall[1]=='General') { ?>
<div style="height:765px; width:1080px; background-image:url(all_image/hsc.jpg);background-repeat: no-repeat; margin:15px;">
	


  <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="6%" height="70">&nbsp;</td>
      <td width="87%">&nbsp;</td>
      <td width="7%">&nbsp;</td>
    </tr>   
  
    <tr>
      <td height="160">&nbsp;</td>
      <td><table width="99%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="18%" rowspan="5" align="center"><img src="all_image/gov.jpg" style="height:80px;" /></td>
          <td width="65%" align="center" height="10"> </td>
          <td width="20%" rowspan="5" align="center"><img src="all_image/logoSDMS2015.png"  style="height:80px;" /></td>
        </tr>
        <tr>
          <td align="center" height="12"></td>
          </tr>
        <tr>
          <td align="center" height="22"><span style="color:#990000; font-family:Arial, Helvetica, sans-serif; font-size:32px; font-weight:bold; letter-spacing:1px;">
IQBAL MEMORIAL GOVT. COLLEGE
          </span></td>
          </tr>
        <tr>
          <td height="27"  align="center" valign="top"><span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:18px;  letter-spacing:1px;">DAGONBHUIYAN, FENI<br>
ESTD - 1985, EIIN NO - 106553,
 COLLEGE CODE - 6800<br>
www.imgc.edu.bd, E-mail : info@imc.edu.bd</span></td>
          </tr> 
           


        <tr>
          <td rowspan="23" align="center" height="60"> <span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; letter-spacing:1px; background:#482257; color:#FFFFFF; padding:7px 10px 7px 10px; border-radius:15px;">Testimonial </span></td>
          </tr>

        <tr>
          <td height="35" align="left" valign="bottom"  colspan="2"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<b> Sl. No. : <?php
					if(isset($fetchForall)){
						echo $fetchForall["boardResultID"];
					}
					else {
						echo "";
					}
			?> </b></td>
          <td align="right" valign="bottom"><b>Date : <?php
					if(isset($fetchForall)){
						echo $fetchForall["date"];
					}
					else {
						echo "";
					}
			?> </b></td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td height="385">&nbsp;</td>
      <td valign="top">

      	<table width="100%" height="379" border="0" cellpadding="0" cellspacing="0" style="margin-left:35px;">
        <tr>
          <td>&nbsp;</td>
        </tr>
       
        <tr>
          <td> <span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; text-align:justify; word-spacing:6px;"><i> This is to certify that <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["studentName"];
					}
					else {
						echo "";
					}
			?> </strong></i></span></td>
        </tr>
        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18; letter-spacing:1px;word-spacing:6px;"><i> <?php if(isset($fetchForall)){
						if($fetchForall["gender"]=="Male")
							echo "Son";
						else
							echo "Daughter ";
					}
					else {
						echo "";
					} 
					   // echo $fetchForall['gender'];

					?> of <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["fatherName"];
					}
					else {
						echo "";
					}
			?></strong> and <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["motherName"];
					}
					else {
						echo "";
					}
			?></strong></i></span></td>
        </tr>
        <tr>
          <td>

          <span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; word-spacing:5px;"><i> was a student of<strong> XI XII</strong> Class of this College.  <?php
				if( $fetchForall["gender"] == "Male")
				{
					echo "He";
				}
				else {
					echo "She";
				}
		?> passed the H.S.C examination from
 


          </i></span></td>
        </tr>

        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; word-spacing:10px;"><i>
          	<i> 
          	 Board of Intermediate and Secondary Education, Cumilla in <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["year"];
					}
					else {
						echo "";
					}
			?> </strong>bearing Roll-


          </i></span>

      </td>
        </tr>


      
        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; word-spacing:8px;"><i>Dagonbhuiya(604), No.<strong> <?php  
					if(isset($fetchForall)){
						echo $fetchForall["RollNo"];
					}
					else {
						echo "";
					}
			?> </strong> and Registration No. <strong> <?php
					if(isset($fetchForall)){
						echo $fetchForall["RegNo"];
					}
					else {
						echo "";
					}
			?> </strong> of Session <strong> <?php
					if(isset($fetchForall)){
						echo $fetchForall["Session"];
					}
					else {
						echo "";
					}
			?> </strong> </span></td>
        </tr>
        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; word-spacing:7px;"><i> from  <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["GroupName"];
					}
					else {
						echo "";
					}
			?>	 </strong>group and secured GPA <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["GPA"];
					}
					else {
						echo "";
					}
			?> </strong>in the scale of GPA-5.00.</i></span></td>
        </tr>
        <tr>
          <td height="3">&nbsp;</td>
        </tr>
        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px;word-spacing:5px;"><i>So far as I know  <?php
				if( $fetchForall["gender"] == "Male")
				{
					echo "he";
				}
				else {
					echo "she";
				}
		?> bears a good moral character.  <?php
				if( $fetchForall["gender"] == "Male")
				{
					echo "He";
				}
				else {
					echo "She";
				}
		?> did not take part in any activity </i></span>
            </td>
        </tr>      

          <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px;word-spacing:5px;"><i>subversive of the state or discipline. </i></span>
            </td>
        </tr>
		
		
		
        <tr>
          <td></td>
        </tr>
        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px;word-spacing:5px;"><b><i>I wish <?php
			if( $fetchForall["gender"] == "Male")
				{
					echo "him";
				}
				else {
					echo "her";
				}
		?>	every success in life.</i></b></span></td>
        </tr>
       
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="105">&nbsp;</td>
      <td>

      	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:-50px;">
        <tr>
          <td>&nbsp;&nbsp;  .................................................</td>
          <td>&nbsp;</td>
          <td align="center">...............................................</td>
        </tr>
        <tr>
          <td width="25%" align="center"><span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; letter-spacing:1px;">Compared by</span></td>
          <td width="50%">&nbsp;</td>
          <td width="25%" align="center"><span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; letter-spacing:1px;">Principal</span></td>
        </tr>
        <tr>
          <td align="center"></td>
          <td>&nbsp;</td>
          <td align="center"><span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:16px;  ">Iqbal Memorial Govt. College </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<!-- ///////////////////////////////////////////////////BM///////////////////////////////// -->



	<?php 
	} 
	 if($fetchForall[1]=='Vocational') 
		{ ?>
					<div style="height:765px; width:1080px; background-image:url(all_image/bm.jpg);background-repeat: no-repeat; margin:15px;">
		


  <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="6%" height="70">&nbsp;</td>
      <td width="87%">&nbsp;</td>
      <td width="7%">&nbsp;</td>
    </tr>   
  
    <tr>
      <td height="160">&nbsp;</td>
      <td><table width="99%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="18%" rowspan="5" align="center"><img src="all_image/gov.jpg" style="height:80px;" /></td>
          <td width="65%" align="center" height="10"> </td>
          <td width="20%" rowspan="5" align="center"><img src="all_image/logoSDMS2015.png"  style="height:80px;" /></td>
        </tr>
        <tr>
          <td align="center" height="12"></td>
          </tr>
        <tr>
          <td align="center" height="22"><span style="color:#990000; font-family:Arial, Helvetica, sans-serif; font-size:32px; font-weight:bold; letter-spacing:1px;">
IQBAL MEMORIAL GOVT. COLLEGE
          </span></td>
          </tr>
        <tr>
          <td height="27"  align="center" valign="top"><span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:18px;  letter-spacing:1px;">DAGONBHUIYAN, FENI<br>
ESTD - 1985, 
 COLLEGE CODE - 69013<br>
www.imgc.edu.bd, E-mail : info@imc.edu.bd</span></td>
          </tr> 
           


        <tr>
          <td rowspan="23" align="center" height="60"> <span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; letter-spacing:1px; background:#482257; color:#FFFFFF; padding:7px 10px 7px 10px; border-radius:15px;">Testimonial </span></td>
          </tr>

        <tr>
          <td height="35" align="left" valign="bottom"  colspan="2"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<b> Sl. No. : <?php
					if(isset($fetchForall)){
						echo $fetchForall["boardResultID"];
					}
					else {
						echo "";
					}
			?> </b></td>
          <td align="right" valign="bottom"><b>Date : <?php
					if(isset($fetchForall)){
						echo $fetchForall["date"];
					}
					else {
						echo "";
					}
			?> </b></td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td height="385">&nbsp;</td>
      <td valign="top">

      	<table width="100%" height="379" border="0" cellpadding="0" cellspacing="0" style="margin-left:35px;">
        <tr>
          <td>&nbsp;</td>
        </tr>
       
        <tr>
          <td> <span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; text-align:justify; word-spacing:6px;"><i> This is to certify that <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["studentName"];
					}
					else {
						echo "";
					}
			?> </strong></i></span></td>
        </tr>
        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18; letter-spacing:1px;word-spacing:6px;"><i> <?php if(isset($fetchForall)){
						if($fetchForall["gender"]=="Male")
							echo "Son";
						else
							echo "Daughter ";
					}
					else {
						echo "";
					} 

					?> of <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["fatherName"];
					}
					else {
						echo "";
					}
			?></strong> and <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["motherName"];
					}
					else {
						echo "";
					}
			?></strong></i></span></td>
        </tr>
        <tr>
          <td>

          <span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; word-spacing:5px;"><i> was a student of<strong> XI XII</strong> Class of this College.  <?php
				if( $fetchForall["gender"] == "Male")
				{
					echo "He";
				}
				else {
					echo "She";
				}
		?> passed the H.S.C examination to the
 


          </i></span></td>
        </tr>

        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; word-spacing:10px;"><i>
          	<i> 
          	  Bangladesh Technical Education Board, Dhaka in <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["year"];
					}
					else {
						echo "";
					}
			?> </strong>bearing Roll-Dagonbhuiyan, 


          </i></span>

      </td>
        </tr>


      
        <tr>
          <td  height="30"><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px; line-height:35px; "><i>No.<strong> <?php  
					if(isset($fetchForall)){
						echo $fetchForall["RollNo"];
					}
					else {
						echo "";
					}
			?> </strong> and Registration No. <strong> <?php
					if(isset($fetchForall)){
						echo $fetchForall["RegNo"];
					}
					else {
						echo "";
					}
			?> </strong> of Session <strong> <?php
					if(isset($fetchForall)){
						echo $fetchForall["Session"];
					}
					else {
						echo "";
					}
			?> </strong> from  <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["GroupName"];
					}
					else {
						echo "";
					}
			?>	 </strong> group and secured GPA <strong><?php
					if(isset($fetchForall)){
						echo $fetchForall["GPA"];
					}
					else {
						echo "";
					}
			?> </strong>in the scale of GPA-5.00.</i></span></td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td height="3">&nbsp;</td>
        </tr>
        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px;word-spacing:5px;"><i>So far as I know  <?php
				if( $fetchForall["gender"] == "Male")
				{
					echo "he";
				}
				else {
					echo "she";
				}
		?> bears a good moral character.  <?php
				if( $fetchForall["gender"] == "Male")
				{
					echo "He";
				}
				else {
					echo "She";
				}
		?> did not take part in any activity </i></span>
            </td>
        </tr>      

          <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px;word-spacing:5px;"><i>subversive of the state or discipline. </i></span>
            </td>
        </tr>
		
		
		
        <tr>
          <td></td>
        </tr>
        <tr>
          <td><span style="font-family:sans-serif, fantasy, monospace; padding-left:5px; font-size:18px; letter-spacing:1px;word-spacing:5px;"><b><i>I wish <?php
			if( $fetchForall["gender"] == "Male")
				{
					echo "him";
				}
				else {
					echo "her";
				}
		?>	every success in life.</i></b></span></td>
        </tr>
       
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="105">&nbsp;</td>
      <td>

      	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:-50px;">
        <tr>
          <td>&nbsp;&nbsp;  .................................................</td>
          <td>&nbsp;</td>
          <td align="center">...............................................</td>
        </tr>
        <tr>
          <td width="25%" align="center"><span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; letter-spacing:1px;">Compared by</span></td>
          <td width="50%">&nbsp;</td>
          <td width="25%" align="center"><span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; letter-spacing:1px;">Principal</span></td>
        </tr>
        <tr>
          <td align="center"></td>
          <td>&nbsp;</td>
          <td align="center"><span style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:16px;  ">Iqbal Memorial Govt. College </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
		 <?php 
		} 
		?>


</body>
</html>

	<?php } else { print "<script>location='../adminloginpanel/index.php'</script>";}?>